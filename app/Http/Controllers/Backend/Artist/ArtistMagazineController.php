<?php

namespace App\Http\Controllers\Backend\Artist;

use App\CoreFunction\Datatable;
use App\Model\ArtistMag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Log;

class ArtistMagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend/Artist.magazine');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('ok');
        return view('backend.Artist.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Log::info($request->filemagazine);

        $magazinedata = ArtistMag::create($request->all());

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mag = ArtistMag::findOrFail($id);
        $image_display = url('img/image.jpg');
        $data = [
            'data_magazine' => $mag,
            'image_display' => $image_display,
            'status' => 'edit',
        ];
        return view('backend.Artist.form')->with($data);
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
        \Log::info($request->all());

        $datamag = ArtistMag::find($id);
        $datamag->update($request->all());
        return response()->json([
            'type' => 'success',
            'title' => 'แก้ไขข้อมูลสำเร็จ'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Log::info("delete");
        $result = ArtistMag::where('id', $id)->update([
            "is_active" => "N",
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        return response()->json([
            'type' => 'success',
            'title' => 'ลบสำเร็จ'
        ]);
    }

    public function getDatatable(Request $request)
    {

        $department = Datatable::listmagazine($request);

        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);

    }

    public function adddata()
    {
        $image_display = url('img/image.jpg');
        $data = [
            'image_display' => $image_display,
            'status' => 'add',
        ];

        return view('backend/Artist.form')->with($data);
    }


    public function upload()
    {
        return view('backend.Artist.form');
    }

}
