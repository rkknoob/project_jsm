<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CategoryModel;
use App\CoreFunction\Product;
use App\Models\ProductImage;
use App\CoreFunction\Datatable;
use Yajra\DataTables\DataTables;
use Log;
use DB;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        return view('backend.Category.index');
    }

    public function getDatatable(Request $request)
    {
        $department = Datatable::listdatacategory($request);
        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
    }

    public function edit($id)
    {
        $listitem = CategoryModel::where('id',$id)->first();
        $image_display = url('img/banner.jpg');
        $data = [
            'item' => $listitem,
            'image_display' => $image_display,
        ];
        return view('backend.Category.edit')->with($data);
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
            $destinationPath = 'public/category/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        return response()->json([
            'data' => $profileImage
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $detailsKeyword = CategoryModel::where('id',$request->id)->update([
            "img" => $request->img,
            "is_active" => 'Y',
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

    public function destroy($id)
    {
        $result = CategoryModel::where('id', $id)->update([
            "img" => "",
            "is_active" => "Y",
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        return response()->json([
            'type' => 'success',
            'title' => 'ลบสำเร็จ'
        ]);
    }

}

?>
