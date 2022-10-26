<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupons;
use Illuminate\Http\Request;

class CouponsController extends Controller
{

    function index(){
        $data['all_coupons'] = Coupons::all();
        return view('admin.coupons',$data);
    }

    function store(Request $request){
        Coupons::create($request->except('_token'));
        return back();
    }
    function update(Request $request){
        Coupons::where('id',$request->id)->update(['status'=>$request->status]);
    }
}
