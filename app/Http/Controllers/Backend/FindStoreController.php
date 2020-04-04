<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CoreFunction\Product;
use App\Models\ProductImage;
use App\Model\FindStoreModel;
use App\Model\FindStore_cate;
use App\CoreFunction\Datatable;
use Yajra\DataTables\DataTables;
use Log;
use DB;

use Validator;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;

class FindStoreController extends Controller
{
    //   
    public function index()
    {
        return view('backend.FindStore.index_store');
    }

    public function getDatatable(Request $request)
    {
        $department = Datatable::liststore($request);

        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
    }
    
    public function create()
    {
        $item = FindStore_cate::all(); 
        $image_display = url('public/image.jpg');
        $data = [
            'item' => $item,
            'image_display' => $image_display,
        ];


        return view('backend.FindStore.formstore')->with($data);
    }

    
    public function store(Request $request)
    {
        \Log::info($request->all());
        $item_review = FindStoreModel::create($request->all());
        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
        ]);
    }

    public function edit($id)
    {
        $item = FindStoreModel::where('id', $id)->first(); 
        $category = FindStore_cate::all(); 
        $image_display = url('public/image.jpg');
        $data = [
            'item' => $item,
            'category' => $category,
            'image_display' => $image_display,
        ];

        return view('backend.FindStore.edit_store')->with($data);
    }

    public function uploadImage(Request $request)
    {
        //   $data = $request->file('file_upload')->store('images/products');
        return response()->json([
            'data' => '$data'
        ], 200);
    }

    public function upload(Request $request)
    {
        \Log::info($request->all());
        $random = str_random(5);
        if ($files = $request->file('file_upload')) {
            $destinationPath = 'public/findstore/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        return response()->json([
            'data' => $profileImage
        ], 200);
    }

    public function update(Request $request, $id)
    {

        \Log::info($request->all());
        $item_faq = FindStoreModel::find($request->id);
        \Log::info($item_faq);
        $item_faq->update($request->all());

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

    public function destroy($id)
    {
        $result = FindStoreModel::where('id', $id)->update([
            "is_active" => "N",
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        return response()->json([
            'type' => 'success',
            'title' => 'ลบสำเร็จ'
        ]);
    }


}
