<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\plan;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Traits\PaypalTrait;
use App\Traits\StripeTrait;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    use StripeTrait;
    use PaypalTrait;
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'high_school' => ['required', 'string', 'max:255'],
            'home_town' => ['required', 'string', 'max:255'],
        ]);


        $plans = json_decode(json_encode(plan::where('status', 'active')->get()), true);
        if (!empty($plans)) {
            foreach ($plans as $plan) {
                //CREATE THE PLAN 
                if (!isset($plan['stripe_product_id'])) {
                    $product = $this->createProduct($plan['name']); // Coming from Trait
                    if (isset($product['success'])) {
                        $updatePlan = plan::find($plan['id']);
                        $updatePlan->stripe_product_id = $product['success']['id'];
                        $updatePlan->save();
                    } else if (isset($product['error'])) {
                        var_dump($product['error']);
                        die;
                    }
                }

                //CREATE THE PAYPAL PRODUCT AND PLAN
                if (!isset($plan['paypal_product_id']) || !isset($plan['paypal_plan_id'])) {
                    $this->setKeys(env('PAYPAL_ACCESS_TOKEN'), env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET_KEY'));
                    $product = $this->createPaypalProduct($plan['name']);
                    $updateIDs = plan::find($plan['id']);
                    if ($product['status'] == 201) {
                        $paypalProductID = $product['result']['id'];
                        $updateIDs->paypal_product_id = $paypalProductID;
                        $plan = $this->createPaypalPlan($paypalProductID, $plan['name'], $plan['duration'], $plan['price']);
                        if ($plan['status'] == 201) {
                            $paypalPlanID = $plan['result']['id'];
                            $updateIDs->paypal_plan_id = $paypalPlanID;
                            $updateIDs->save();
                        } else {
                            var_dump($plan['status'], $plan['body']);
                        }
                    } else {
                        var_dump($product['status'], $product['body']);
                    }
                }
            }
        }


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


        $userData = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'sports' => $enc_sports,
            'positions' => $enc_positions,
            'gender' => $request->gender,
            'further_details' => $enc_fdetails,
        );

        $data = base64_encode(json_encode($userData));

        return view("user.plan", compact('data', 'plans'));

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }

    //Random Password Generator
    // function randomPassword()
    // {
    //     $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    //     $pass = array(); //remember to declare $pass as an array
    //     $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    //     for ($i = 0; $i < 8; $i++) {
    //         $n = rand(0, $alphaLength);
    //         $pass[] = $alphabet[$n];
    //     }
    //     return implode($pass); //turn the array into a string
    // }
}
