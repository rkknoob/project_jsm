<?php

namespace App\Http\Controllers\Backend\Brandjsm;

use App\CoreFunction\Datatable;
use App\Model\Brandjsm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Log;

class SettingBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.Brandjsm.film');
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

        try {
            $databrand = Brandjsm::create([
                "name_en" => $request->name_en,
                "name_th" => $request->name_th,
                "img_en" => $request->imageen,
                "img_th" => $request->imageth,
                "type" => $request->type,
                "detail_th" => $request->summernoteth,
                "detail_en" => $request->summernoten,
                "detail_film" => $request->summernotefilm,
                "is_active" => $request->is_active,
            ]);
            return response()->json([
                'msg_return' => 'ok',
                'code_return' => 1,
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'msg_return' => 'Contact Admin',
                'code_return' => 99,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $databrand = Brandjsm::findOrFail($id);
        $image_display = url('img/image.jpg');
        $data = [
            'data_brand' => $databrand,
            'image_display' => $image_display,
            'status' => 'edit',
        ];
        return view('backend.Brandjsm.form')->with($data);

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

        try {
            $data = Brandjsm::find($id);
            $data->update($request->all());

            return response()->json([
                'msg_return' => 'ok',
                'code_return' => 1,
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'msg_return' => 'Contact Admin',
                'code_return' => 99,
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //$databrand = Brandjsm::find($id);
        //$databrand->delete();
        $result = Brandjsm::where('id', $id)->update([
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

        $department = Datatable::brandcontent($request);
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
        return view('backend.Brandjsm.form')->with($data);
    }

    public function finddata($id)
    {
        $collection = Brandjsm::findOrFail($id);

        return response()->json($collection);
    }

}
