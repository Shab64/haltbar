<?php

namespace App\Http\Controllers;

use App\Models\CMS_About;
use App\Models\NameNumbers;
use App\Models\plan;
use App\Models\Subscription;
use App\Traits\StripeTrait;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Traits\PaypalTrait;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class CheckoutController extends Controller{
    use StripeTrait;
    use PaypalTrait;
    function checkout($decData, $planID){
        $userData = json_decode(base64_decode($decData), true);
        $planData = json_decode(json_encode(plan::find($planID)), true);
        return view('user.checkout', compact('userData', 'planData'));
    }

    function payment(Request $request)
    {
        //create new user
        // var_dump($request->input('first_name')); die;
        // $user = new User();
        // $user->
        // var_dump($request->input("sports"),$request->input("positions"),$request->input("subscribeSports"));
        // die;

        $data = $request->input();

        //Creating Customer
        $customer = $this->createCustomer($request->stripeToken);
        if (isset($customer['success'])) {
            //Creating Price
            $price = $this->createPrice($request->stripeProductID, intval($request->price), $request->interval);
            if (isset($price['success'])) {
                //Creating Subscription
                $subscription = $this->createSubscription($customer['success']['id'], $price['success']['id']);
                if (isset($subscription['success'])) {
                    //if subscription successful add user to database,send Email, and add data to
                    //subscription include subscription id and redirect to dashboard

                    $enc_sports = json_encode($request->sports);
                    $enc_positions = json_encode($request->positions);

                    //set up the further_details
                    $further_details['high_school'] = $request->high_school;
                    $further_details['home_town'] = $request->home_town;
                    if (isset($request->graduation_year)) {
                        $further_details['graduation_year'] = $request->graduation_year;
                    }
                    if (isset($request->ct_team)) {
                        $further_details['ct_team'] = $request->ct_team;
                    }
                    if (isset($request->cc_email)) {
                        $further_details['cc_email'] = $request->cc_email;
                    }
                    if (isset($request->pg_email)) {
                        $further_details['pg_email'] = $request->pg_email;
                    }
                    if (isset($request->height)) {
                        $further_details['height'] = $request->height;
                    }
                    if (isset($request->gpa)) {
                        $further_details['gpa'] = $request->gpa;
                    }
                    $enc_fdetails = json_encode($further_details);
                    //--end further_details

                    $randomPassword = $this->randomPassword();
                    $hashPassword = Hash::make($randomPassword);
                    $user = new User();
                    $user->first_name = $data['first_name'];
                    $user->last_name = $data['last_name'];
                    $user->email = $data['email'];
                    $user->password = $hashPassword;
                    $user->phone = $data['phone'];
                    $user->gender = $data['gender'];
                    $user->sports = $data['sports'];
                    $user->positions = $data['positions'];
                    $user->further_details = $enc_fdetails;
                    $user->save();

                    event(new Registered($user));

                    // Auth::login($user);

                    //insert Subcription
                    $subscribedSports = json_encode($request->input('subscribeSports'));
                    $insertSub = new Subscription();
                    $insertSub->user_id = $user->id;
                    $insertSub->plan_id = $request->input('planID');
                    $insertSub->stripe_subscription_id = $subscription['success']['id'];
                    $insertSub->stripe_customer_id = $customer['success']['id'];
                    $insertSub->subscribedSports = $subscribedSports;
                    $insertSub->payment_method = 'Stripe';
                    $insertSub->save();

                    //send Email to user
                    $subject = "Account Creation For Recruit U Athelete";
                    $message = '<table align="center"  border="0" cellspacing="0" cellpadding="0" class="em_main_table" style="width:70vw; height: 500px; " >
                    <tr style="color:#000000; height: 300px; text-align: center; width: 80%; margin: 0 auto; " >
                      <th style="padding: 20px 220px; ">

                          <div style="border: 1px solid #0000001c;  padding: 30px; text-align: center">
                              <div style="display: flex; margin-top: 20px;">
                                  <div style="width: 260px; margin: 0 auto;">
                                      <img src="' . asset('assets/Logo__2_Recruit_U_App_Image_-removebg-preview.png') . '" style="border-radius: 6px; width: 180px; height: 120px;  margin-bottom: 20px ;padding:10px;" alt=""/>
                                  </div>
                              </div>
                              <div style="font-weight: normal; line-height: 30px;  ">
                                  <p style="width: 100%; font-size: 12px; color: #08234f ; margin-top : 10px; padding: 3px; padding-top: 10px; font-family: cursive; " >
                                    ThankYou! For Signup and take Interest in Recruit U Athelete, Your Account has been Created Successfully. Now you can Login with registered Email and the Password below.
                                  </p>
                                  <b style="font-family: cursive;"> password: ' . $randomPassword . '</b>
                              </div>
                          </div>
                      </th>
                     </tr>
                  </table>';
                    $this->sendMail($data['email'], $subject, $message);


                    return redirect(RouteServiceProvider::HOME);
                } else {
                    var_dump($price['error']);
                    die;
                }
            } else {
                var_dump($price['error']);
                die;
            }
        } else {
            var_dump($customer['error']);
            die;
        }
    }

    function paypalPayment(Request $request)
    {
        $data = $request;

        //SETTING KEYS
        // $this->setKeys(env('PAYPAL_CLIENT_ID'),env('PAYPAL_SECRET_KEY'));
        //set up the further_details
        $further_details['high_school'] = $request->high_school;
        $further_details['home_town'] = $request->home_town;
        if (isset($request->graduation_year)) {
            $further_details['graduation_year'] = $request->graduation_year;
        }
        if (isset($request->ct_team)) {
            $further_details['ct_team'] = $request->ct_team;
        }
        if (isset($request->cc_email)) {
            $further_details['cc_email'] = $request->cc_email;
        }
        if (isset($request->pg_email)) {
            $further_details['pg_email'] = $request->pg_email;
        }
        if (isset($request->height)) {
            $further_details['height'] = $request->height;
        }
        if (isset($request->gpa)) {
            $further_details['gpa'] = $request->gpa;
        }
        $enc_fdetails = json_encode($further_details);
        //--end further_details

        $randomPassword = $this->randomPassword();
        $hashPassword = Hash::make($randomPassword);
        $user = new User();
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = $hashPassword;
        $user->phone = $data['phone'];
        $user->gender = $data['gender'];
        $user->sports = $data['sports'];
        $user->positions = $data['positions'];
        $user->further_details = $enc_fdetails;
        $user->save();

        event(new Registered($user));

        // Auth::login($user);

        //insert Subcription
        $subscribedSports = json_encode($request->input('subscribeSports'));
        $insertSub = new Subscription();
        $insertSub->user_id = $user->id;
        $insertSub->plan_id = $request->input('planID');
        $insertSub->subscribedSports = $subscribedSports;
        $insertSub->paypal_subscription_id = $request->paypal_subscription_id;
        $insertSub->payment_method = 'Paypal';
        $insertSub->save();

        //send Email to user
        $subject = "Account Creation For Recruit U Athelete";
        $message = '<table align="center"  border="0" cellspacing="0" cellpadding="0" class="em_main_table" style="width:70vw; height: 500px; " >
 <tr style="color:#000000; height: 300px; text-align: center; width: 80%; margin: 0 auto; " >
   <th style="padding: 20px 220px; ">

       <div style="border: 1px solid #0000001c;  padding: 30px; text-align: center">
           <div style="display: flex; margin-top: 20px;">
               <div style="width: 260px; margin: 0 auto;">
                   <img src="' . asset('assets/Logo__2_Recruit_U_App_Image_-removebg-preview.png') . '" style="border-radius: 6px; width: 180px; height: 120px;  margin-bottom: 20px ;padding:10px;" alt=""/>
               </div>
           </div>
           <div style="font-weight: normal; line-height: 30px;  ">
               <p style="width: 100%; font-size: 12px; color: #08234f ; margin-top : 10px; padding: 3px; padding-top: 10px; font-family: cursive; " >
                 ThankYou! For Signup and take Interest in Recruit U Athelete, Your Account has been Created Successfully. Now you can Login with registered Email and the Password below.
               </p>
               <b style="font-family: cursive;"> password: ' . $randomPassword . '</b>
           </div>
       </div>
   </th>
  </tr>
</table>';
        $this->sendMail($data['email'], $subject, $message);


        return redirect(RouteServiceProvider::HOME);
    }

    //Random Password Generator
    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    //sendMail
    function sendMail($to, $subject, $message)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.devlabx.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                  //Enable SMTP authentication
            $mail->Username   = 'shahab@jetnetix.com';                     //SMTP username
            $mail->Password   = 'engineering644';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('shahab@jetnetix.com', 'Recruit U Athelete');
            $mail->addReplyTo('hello@recruituiathelete.com', 'Recruit U Athelete');
            $mail->addAddress($to);  //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $message;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
            // return redirect($redirect);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
