<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) { //check the user Auth
            $userAuth = Auth::user();
        }
        $name = "Ovais";
        $phone = "123123232";
        $data = array("fname" => "ovais", "lname" => 'javed');
        return view('home', compact('name', 'phone', 'data'));
    }
}
