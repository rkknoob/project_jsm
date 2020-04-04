<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\CoreFunction\Product;
use App\Model\CategoryModel;
use App\Model\ProductDetailModel;
use App\Model\ProductModel;
use Log;
use App\CoreFunction\Datatable;
use Yajra\DataTables\DataTables;
use DB;
class SkuController extends Controller
{
    //
    public function index()
    {
        $listCategory = CategoryModel::all();
        $listProduct = ProductDetailModel::all();
        $data = [
            'itemCategory' => $listCategory,
            'itemProduct' => $listProduct,
            'idProduct' => null,
        ];

        return view('backend.Product.indexsku')->with($data);
    }

    public function getDatatable(Request $request)
    {
        $department = Datatable::listdatasku($request);

        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);

    }


    public function show(){
        $listCategory = CategoryModel::all();
        $image_display = url('img/image.jpg');
        $data = [
            'itemCategory' => $listCategory,
            'image_display' => $image_display,
        ];

        return view('backend.Product.add_sku')->with($data);
    }

    public function fetch(Request $request)
    {
        $data = ProductDetailModel::where('category_id',$request->select)->get();

        return response()->json([
            'datas' => $data
        ], 200);

    }

    public function fetchTable(Request $request)
    {
        $data = ProductModel::where('product_details_id',$request->select)->get();

        \Log::info($data);
        return response()->json([
            'datas' => $data
        ], 200);

    }


    public function store(Request $request)
    {

        $Checkimp = Product::checkimplode($request->file);
        $itemProduct = ProductModel::where('sku',$request->sku)->first();

        if(isset($itemProduct)){
            return response()->json([
                'msg_return' => 'ข้อมูล SKU ซ้ำ',
                'code_return' => 0,
            ]);

        }
        else{

            $detailsKeyword = ProductModel::create([
                "name_en" => $request->name_en,
                "sku" => $request->sku,
                "product_details_id" => $request->product_id,
                "img_color" => $request->img_color,
                "img_product" => $request->img_product,
                "is_active" => $request->is_active,

            ]);

            return response()->json([
                'msg_return' => 'บันทึกสำเร็จ',
                'code_return' => 1,
            ]);

        }
    }

    public function destroy($id)
    {
        $result = ProductModel::where('id', $id)->update([
            "is_active" => "N",
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        \Log::info($id);
        return response()->json([
            'type' => 'success',
            'title' => 'ลบสำเร็จ'
        ]);

    }

    public function edit($id)
    {

        $listCategory = CategoryModel::all();
        $listDetail = ProductDetailModel::all();

        $listProduct = ProductModel::where('id', $id)->first();
        $listitem = ProductDetailModel::where('id',$listProduct->product_details_id)->select('id','name_en','category_id')->first();

        $image_display = url('img/image.jpg');
        //dd( $listDetail);
        $data = [
            'item' => $listitem,
            'itemDetail' => $listDetail,
            'itemCategory' => $listCategory,
            'itemProduct' => $listProduct,
            'image_display' => $image_display,
        ];

        return view('backend.Product.edit_sku')->with($data);
    }

    public function update(Request $request)
    {

        $itemProduct = ProductModel::where('sku',$request->sku)->first();
        
        if(isset($itemProduct)){
            return response()->json([
                'msg_return' => 'ข้อมูล SKU ซ้ำ',
                'code_return' => 0,
            ]);

        }
        else{

        $detailsKeyword = ProductModel::where('id',$request->id)->update([
            "name_en" => $request->name_en,
            "sku" => $request->sku,
            "product_details_id" => $request->product_id,
            "img_color" => $request->img_color,
            "img_product" => $request->img_product,
            "is_active" => $request->is_active,

        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

        }

    }
}
