<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;


class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


        $imageUrl = storage_path('app/public');

        if($request['file_upload']){
            $data = $request->file('file_upload')->store('images/product');
        }
        if($request['img_zoom']){
            $data = $request->file('img_zoom')->store('images/product');
        }
        if($request['img_color']){
            $data = $request->file('img_color')->store('images/color');
        }
        if($request['img_product']){
            $data = $request->file('img_product')->store('images/colorproduct');
        }
        if($request['fileBannerImg']){
            $data = $request->file('fileBannerImg')->store('images/category');
        }
        if($request['img_arttip']){
            $data = $request->file('img_arttip')->store('images/Artisttip');
        }




        // $data = $request->file('fileBannerImg')->store('images/category');
        //$data = $request->file('file_upload')->store('images/category');

        return response()->json([
            'data' => $data
        ], 200);
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
    public function update(Request $request, $id)
    {
        //
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

    public function upload(Request $request)
    {

        //  $data = $request->file('file')->store('images/products');

        if ($files = $request->file('file_upload')) {
            $destinationPath = '/public/product/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('img_zoom')) {
            $destinationPath = '/public/product/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        return response()->json([
            'data' => $profileImage
        ], 200);
    }
}
