<?php

namespace App\Http\Controllers;

use App\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting=Setting::find(1);
        return view('admin.settings.index')->with('setting',$setting);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $setting=Setting::find(1);
        $request->validate([
            'company_name'=>'required',
            'address'=>'required',
        ]);

        if ($request->hasFile('company_logo')) {
            $company_logo= $request->company_logo;
            $temporaryName=time().$company_logo->getClientOriginalName();
            $company_logo->move("upload/company-logo",$temporaryName);
            $setting->company_logo_main=$temporaryName;
        }

        $setting->company_name=$request->company_name;
        $setting->address=$request->address;

        $setting->title=$request->title;

        if ($request->hasFile('company_logo_favicon')){
            $company_logo_favicon = $request->company_logo_favicon;
            $temporaryFavicon = time(). $company_logo_favicon->getClientOriginalName();
            $company_logo_favicon->move("upload/company-logo", $temporaryFavicon);
            $setting->company_logo_favicon= $temporaryFavicon;
        }

         if ($request->hasFile('page_banner')){
            $company_page_banner = $request->page_banner;
            $temporary_page_banner = time(). $company_page_banner->getClientOriginalName();
             $company_page_banner->move("upload/company-logo", $temporary_page_banner);
             $setting->page_banner= $temporary_page_banner;
        }
        $setting->footer_about=$request->footer_about;
        $setting->customer_support_number=$request->customer_support_number;
        $setting->customer_support_email=$request->customer_support_email;
        $setting->location=$request->location;
        $setting->working_hour=$request->working_hour;

        $setting->facebook=$request->facebook;
        $setting->twitter=$request->twitter;
        $setting->linkedIn=$request->linkedIn;
        $setting->youtube=$request->youtube;
        $setting->instragram=$request->instragram;


        $setting->save();

        Session::flash('success', 'Successfully Update');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
