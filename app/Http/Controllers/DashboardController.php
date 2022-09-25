<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //
    private $user;
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    function index()
    {
        $user = $this->user;
        $biographies = json_decode(json_encode(Content::where('content_type', 'biography')->where('user_id', $user->id)->orderBy("id", "Desc")->get()), true);
        $highlights = json_decode(json_encode(Content::where('content_type', 'highlight')->where('user_id', $user->id)->orderBy("id", "Desc")->get()), true);
        // var_dump($biographies,$highlights); die;
        return view('dashboard', compact('user', 'biographies', 'highlights'));
    }

    function coachdatabase($sport)
    {
        $user = $this->user;
        return view('user.coachdatabase', compact('user'));
    }

    function editprofile()
    {
        $user = $this->user;
        return view('user.edit_profile', compact('user'));
    }

    function update(Request $request)
    {
        //set up the further_details
        $user = User::find($this->user->id);
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

        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->further_details = $enc_fdetails;
        $user->phone = $request['phone'];
        $user->gender = $request['gender'];

        $dp = $request->file('dp');
        if (isset($dp)) {
            $file_name = $_FILES['dp']['name'];
            $image = $dp->storeAs('/', $file_name, 'uploads'); //this disk name uploads added by me in config/files uplaods[]
            $user->dp = $image;
        }
        $user->save();

        Auth::logout();
        event(new Registered($user));
        Auth::login($user);
        $this->user = Auth::user();
        $request->session()->flash('success', 'Changes Saved Successfully!');
        return redirect(route('edit_profile'));
    }


    function insert(Request $request, $type)
    {
        // $dp = $request->file('video');
        // var_dump($dp);
        // die;
        $content = new Content();
        $content->user_id = $this->user->id;
        $content->content_type = $type;
        if ($type === "biography") {
            $content->content = $request->editor1;
        } else if ($type === "highlight") {
            $video = $request->file('video');
            if (isset($video)) {
                $file_name = $_FILES['video']['name'];
                $video = $video->storeAs('/', $file_name, 'uploads'); //this disk name uploads added by me in config/files uplaods[]
                $content->content = $video;
            }
            $content->title = $request->title;
            $content->description = $request->description;
        }
        $content->save();
        return redirect(route('dashboard'));
    }

    function insertLinks(Request $request)
    {

        if (isset($request->facebook_link)) {
            $links['facebook'] = $request->facebook_link;
        }
        if (isset($request->twitter_link)) {
            $links['twitter'] = $request->twitter_link;
        }
        if (isset($request->whatsapp_link)) {
            $links['whatsapp'] = $request->whatsapp_link;
        }

        $user = User::find($this->user->id);
        if (isset($links)) {
            $user->links = json_encode($links);
            $user->save();
            $this->user->links = json_encode($links);
        }
        return redirect(route('dashboard'));
    }

    function thankyou()
    {
        return view('user.thanks');
    }

    function changePassword(Request $request)
    {
        $user = User::find($this->user->id);
        $correctPass = Hash::check($request->old_pass, $user->password);
        if ($correctPass) {
            $hashedPassword = Hash::make($request->new_pass);
            $user->password = $hashedPassword;
            $user->save();
            $this->user->password = $hashedPassword;
            $request->session()->flash('success', 'Password Changed Successfully!');
        } else {
            $request->session()->flash('fail', 'Password Not Change, Wrong Old Password!');
        }
        return (redirect(route('edit_profile')));
    }
}
