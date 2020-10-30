<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use File;
use Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $brand = Brand::all();
        // return view('layouts.sidebar',['brand' => $brand]);
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
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Brand::find($id);
        return view('brand/setting', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $brand = Brand::find($id);
        $imgNameLog = null;
        if($brand){
            $imgNameLog = $brand->image_login;
        }
        $uploaded_fotoLog = $request->file('file_mask_log');
        $baseUrl = "../public/assets/img/brand/";
        if (isset($request["image_login"])) {
            if (isset($uploaded_fotoLog)) {
                if($imgNameLog != null){
                    unlink($baseUrl.$imgNameLog);
                }
                $extensionLog = $uploaded_fotoLog->getClientOriginalExtension();
                $imgNameLog = 'login-'.md5(time()) . '.' . $extensionLog;
                file_put_contents($baseUrl.$imgNameLog,file_get_contents($uploaded_fotoLog));
            }
        }
        $brand->image_login = $imgNameLog;
        $brand->name_brand = $request->name_brand;

        // Upload foto image register
        $imgNameRegis = null;
        if($brand){
            $imgNameRegis = $brand->image_register;
        }
        $uploaded_fotoRegis = $request->file('file_mask_regis');
        if (isset($request["image_register"])) {
            if (isset($uploaded_fotoRegis)) {
                if($imgNameRegis != null){
                    unlink($baseUrl.$imgNameRegis);
                }
                $extensionRegis = $uploaded_fotoRegis->getClientOriginalExtension();
                $imgNameRegis = 'register-'.md5(time()) . '.' . $extensionRegis;
                file_put_contents($baseUrl.$imgNameRegis,file_get_contents($uploaded_fotoRegis));
            }
        }
        $brand->image_register = $imgNameRegis;
        $brand->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //   
    }
}
