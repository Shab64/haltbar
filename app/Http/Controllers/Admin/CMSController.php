<?php

namespace App\Http\Controllers\Admin;

use App\Models\CMS_About;
use App\Models\CMS_Artwork;
use App\Models\CMS_Cookies;
use App\Models\CMS_Delivery;
use App\Models\CMS_OrderProcess;
use App\Models\CMS_PersonalData;
use App\Models\CMS_PricingExplained;
use App\Models\CMS_PrintMethod;
use App\Models\CMS_privacy;
use App\Models\CMS_Return;
use App\Models\CMS_TermsCondition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CMSController extends Controller
{
    //CMS About
    public function getAbout(Request $request)
    {
        $about = CMS_About::get()->first();
        return view('admin.about', compact('about'));
    }

    //CMS About Store
    public function storeAbout(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        CMS_About::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return 200;
    }

    //CMS About Update
    public function updateAbout(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $about = CMS_About::findorFail($request->id);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();

        return 200;
    }

    //CMS Privacy
    public function getPrivacy(Request $request)
    {
        $privacy = CMS_privacy::get()->first();
        return view('admin.privacy', compact('privacy'));
    }

    //CMS Privacy Store
    public function storePrivacy(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        CMS_privacy::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return 200;
    }

    //CMS Privacy Update
    public function updatePrivacy(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $privacy = CMS_privacy::findorFail($request->id);
        $privacy->title = $request['title'];
        $privacy->description = $request['description'];
        $privacy->save();

        return 200;
    }

    //CMS Cookies
    public function getCookies(Request $request)
    {
        $cookies = CMS_Cookies::get()->first();
        return view('admin.cookies', compact('cookies'));
    }

    //CMS Cookies Store
    public function storeCookies(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        CMS_Cookies::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return 200;
    }

    //CMS Cookies Update
    public function updateCookies(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $about = CMS_Cookies::findorFail($request->id);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();

        return 200;
    }

    //CMS Delivery
    public function getDelivery(Request $request)
    {
        $delivery = CMS_Delivery::get()->first();
        return view('admin.delivery', compact('delivery'));
    }

    //CMS Delivery Store
    public function storeDelivery(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        CMS_Delivery::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return 200;
    }

    //CMS Delivery Update
    public function updateDelivery(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $about = CMS_Delivery::findorFail($request->id);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();

        return 200;
    }

    //CMS Return
    public function getReturn(Request $request)
    {
        $getReturn = CMS_Return::get()->first();
        return view('admin.return', compact('getReturn'));
    }

    //CMS Return Store
    public function storeReturn(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        CMS_Return::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return 200;
    }

    //CMS Return Update
    public function updateReturn(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $about = CMS_Return::findorFail($request->id);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();

        return 200;
    }

    //CMS Order Process
    public function getOrderProcess(Request $request)
    {
        $orderProcess = CMS_OrderProcess::get()->first();
        return view('admin.orderprocess', compact('orderProcess'));
    }

    //CMS Order Process Store
    public function storeOrderProcess(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        CMS_OrderProcess::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return 200;
    }

    //CMS Order Process Update
    public function updateOrderProcess(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $about = CMS_OrderProcess::findorFail($request->id);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();

        return 200;
    }

    //CMS Personsal Data
    public function getPersonsalData(Request $request)
    {
        $personalData = CMS_PersonalData::get()->first();
        return view('admin.personal', compact('personalData'));
    }

    //CMS Personsal Data Store
    public function storePersonsalData(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        CMS_PersonalData::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return 200;
    }

    //CMS Personsal Data Update
    public function updatePersonsalData(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $about = CMS_PersonalData::findorFail($request->id);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();

        return 200;
    }

    //CMS Artwork
    public function getArtwork(Request $request)
    {
        $artwork = CMS_Artwork::get()->first();
        return view('admin.artwork', compact('artwork'));
    }

    //CMS Artwork Store
    public function storeArtwork(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        CMS_Artwork::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return 200;
    }

    //CMS Artwork Update
    public function updateArtwork(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $about = CMS_Artwork::findorFail($request->id);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();

        return 200;
    }

    //CMS Pricing Explained
    public function getPricingExplained(Request $request)
    {
        $pricingExplained = CMS_PricingExplained::get()->first();
        return view('admin.pricingexplain', compact('pricingExplained'));
    }

    //CMS Pricing Explained Store
    public function storePricingExplained(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        CMS_PricingExplained::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return 200;
    }

    //CMS Pricing Explained Update
    public function updatePricingExplained(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $about = CMS_PricingExplained::findorFail($request->id);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();

        return 200;
    }

    //CMS Print Method
    public function getPrintMethod(Request $request)
    {
        $printMethod = CMS_PrintMethod::get()->first();
        return view('admin.printmethod', compact('printMethod'));
    }

    //CMS Print Method Store
    public function storePrintMethod(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        CMS_PrintMethod::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return 200;
    }

    //CMS Print Method Update
    public function updatePrintMethod(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $about = CMS_PrintMethod::findorFail($request->id);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();

        return 200;
    }

    //CMS Terms Condition Method
    public function getTermsCondition(Request $request)
    {
        $terms = CMS_TermsCondition::get()->first();
        return view('admin.terms', compact('terms'));
    }

    //CMS Terms Condition Store
    public function storeTermsCondition(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        CMS_TermsCondition::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return 200;
    }

    //CMS Terms Condition Update
    public function updateTermsCondition(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $about = CMS_TermsCondition::findorFail($request->id);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->save();

        return 200;
    }

    //CMS OUTPUT
    public function about()
    {
        $about = CMS_About::get()->first();
        return view('user.about', compact('about'));
    }

    public function artwork()
    {
        $artwork = CMS_Artwork::get()->first();
        return view('user.artwork', compact('artwork'));
    }

    public function cookies()
    {
        $cookies = CMS_Cookies::get()->first();
        return view('user.cookies', compact('cookies'));
    }

    public function delivery()
    {
        $delivery = CMS_Delivery::get()->first();
        return view('user.delivery', compact('delivery'));
    }

    public function orderprocess()
    {
        $orderProcess = CMS_OrderProcess::get()->first();
        return view('user.orderprocess', compact('orderProcess'));
    }

    public function personaldata()
    {
        $personalData = CMS_PersonalData::get()->first();
        return view('user.personaldata', compact('personalData'));
    }

    public function pricingexplain()
    {
        $pricingExplained = CMS_PricingExplained::get()->first();
        return view('user.pricingexplain', compact('pricingExplained'));
    }

    public function printmethod()
    {
        $printMethod = CMS_PrintMethod::get()->first();
        return view('user.printmethod', compact('printMethod'));
    }

    public function privacy()
    {
        $privacy = CMS_privacy::get()->first();
        return view('user.privacy', compact('privacy'));
    }

    public function return()
    {
        $getReturn = CMS_Return::get()->first();
        return view('user.return', compact('getReturn'));
    }

    public function termandcondition()
    {
        $terms = CMS_TermsCondition::get()->first();
        return view('user.termandcondition', compact('terms'));
    }
}
