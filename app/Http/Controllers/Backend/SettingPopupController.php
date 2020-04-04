<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PopupModel;
use App\CoreFunction\Product;
use App\Models\ProductImage;
use App\CoreFunction\Datatable;
use Yajra\DataTables\DataTables;
use Log;
use DB;


class SettingPopupController extends Controller
{
    //
    public function index()
    {
        //$result = PopupModel::all();
        //\Log::info($result);
        return view('backend.Popup.index');
    }

    public function getDatatable(Request $request)
    {
        $department = Datatable::listdatapopup($request);

        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
    }

    public function edit($id)
    {
        $listitem = PopupModel::where('id',$id)->first();
        $image_display = url('img/banner.jpg');
        $data = [
            'item' => $listitem,
            'image_display' => $image_display,
        ];
        return view('backend.Popup.edit')->with($data);
    }

    public function uploadImage(Request $request)
    {
        return response()->json([
            'data' => '$data'
        ], 200);
    }

    public function upload(Request $request)
    {
        \Log::info($request->all());
        //$data = $request->file('file')->store('images/products');

        if ($files = $request->file('file_upload')) {
            $destinationPath = 'public/popup/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        return response()->json([
            'data' => $profileImage
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $detailsKeyword = PopupModel::where('id',$request->id)->update([
            "img_en" => $request->img,
            "is_active" =>  $request->is_active,
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

    public function destroy($id)
    {
        $result = PopupModel::where('id', $id)->update([
            "img_en" => "",
            "is_active" => "Y",
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        return response()->json([
            'type' => 'success',
            'title' => 'ลบสำเร็จ'
        ]);
    }
}
