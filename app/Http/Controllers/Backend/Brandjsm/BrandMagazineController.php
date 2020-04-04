<?php

namespace App\Http\Controllers\Backend\Brandjsm;

use Illuminate\Http\Request;
use App\CoreFunction\Datatable;
use App\Model\Brandjsm;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Log;

class BrandMagazineController extends Controller
{
    //

    public function index()
    {

        return view('backend.Brandjsm.magazine');
    }

    public function getDatatable(Request $request)
    {
        $department = Datatable::brandmagazine($request);
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
        return view('backend.Brandjsm.formmag')->with($data);
    }

    public function show($id)
    {
        $databrand = Brandjsm::findOrFail($id);
        $image_display = url('img/image.jpg');
        $data = [
            'data_brand' => $databrand,
            'image_display' => $image_display,
            'status' => 'edit',
        ];
        return view('backend.Brandjsm.formmag')->with($data);

    }

    public function store(Request $request)
    {
        try {
            $databrand = Brandjsm::create([
                "name_en" => $request->name_en,
                "name_th" => $request->name_th,
                "img_en" => $request->img_en,
                "img_th" => $request->img_th,
                "type" => $request->type,
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



}
