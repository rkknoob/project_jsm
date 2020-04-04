<?php

namespace App\Http\Controllers\Backend;

use App\CoreFunction\Datatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Model\CategoryModel;
use App\Model\ProductModel;
use App\Model\ProductDetailModel;
use App\Model\BannerModel;
use App\CoreFunction\Product;
use DB;
use Log;


class SettingBannerController extends Controller
{
    public function index()
    {
        $result = BannerModel::orderBy('seq', 'ASC')->get();
        $max = BannerModel::max('seq');
        $min = BannerModel::min('seq');
        $data = [
            'item' => $result,
            'max' => $max,
            'min' => $min,
        ];
        return view('backend/Banner.index')->with($data);
    }

    public function show()
    {
        $listCategory = CategoryModel::all();
        $image_display = url('public/imgbanner.png');
        $data = [
            'itemCategory' => $listCategory,
            'image_display' => $image_display,
        ];
        return view('backend/Banner.add')->with($data);
    }

    public function destroy($id)
    {
        \Log::info($id);
        $result = BannerModel::where('id', $id)->update([
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
        $department = Datatable::listbanner($request);
        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
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
        return response()->json([
            'datas' => $data
        ], 200);

    }

    public function uploadImage(Request $request)
    {
        //$data = $request->file('file_upload')->store('images/products');
        return response()->json([
            'data' => '$data'
        ], 200);
    }

    public function upload(Request $request)
    {
        //$data = $request->file('file')->store('images/products');
        $random = str_random(5);
        if ($files = $request->file('img_color')) {
            $destinationPath = 'public/banner/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }
        if ($files = $request->file('img_product')) {
            $destinationPath = 'public/banner/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        return response()->json([
            'data' => $profileImage
        ], 200);
    }

    public function store(Request $request)
    {

        $seq = BannerModel::max('seq');

        $Checkimp = Product::checkimplode($request->file);
        $detailsKeyword = BannerModel::create([
            "id_category" => $request->id_category,
            "id_product" => $request->id_product,
            "seq" => $seq+1,
            "name_en" => $request->name_en,
            "img_en" => $request->img_en,
            "img_th" => $request->img_th,
            "is_active" => $request->is_active,
        ]);
        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

    public function edit($id)
    {
        $listitem = BannerModel::where('id', $id)->first();
        $listCategory = CategoryModel::all();
        $listProduct = ProductDetailModel::where('category_id',$listitem->id_category)->get();
        $image_display = url('public/imgbanner.png');
        $data = [
            'item' => $listitem,
            'itemCategory' => $listCategory,
            'itemProduct' => $listProduct,
            'image_display' => $image_display,
        ];

        return view('backend.Banner.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        \Log::info($request->all());
        $detailsKeyword = BannerModel::where('id',$request->id)->update([
            "id_category" => $request->id_category,
            "id_product" => $request->id_product,
            "name_en" => $request->name_en,
            "img_en" => $request->img_en,
            "img_th" => $request->img_th,
            "is_active" => $request->is_active,
            "updated_at" => date('y-m-d H:i:s'),

        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
    }

    public function up(Request $request)
    {
        $sequence_a = BannerModel::where('seq',   $request->seq)->first();
        $sequence_b = BannerModel::where('seq', --$request->seq)->first();

        $result1 = BannerModel::where('id',$sequence_a->id)->update([
            "seq" => --$sequence_a->seq,
            "updated_at" => date('y-m-d H:i:s'),
        ]);
        $result2 = BannerModel::where('id',$sequence_b->id)->update([
            "seq" => ++$sequence_b->seq,
            "updated_at" => date('y-m-d H:i:s'),
        ]);
        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
    }


    public function down(Request $request)
    {

        $sequence_a = BannerModel::where('seq', $request->seq)->first();
        $sequence_b = BannerModel::where('seq', ++$request->seq)->first();

        $result1 = BannerModel::where('id',$sequence_a->id)->update([
            "seq" => ++$sequence_a->seq,
            "updated_at" => date('y-m-d H:i:s'),
        ]);
        $result2 = BannerModel::where('id',$sequence_b->id)->update([
            "seq" => --$sequence_b->seq,
            "updated_at" => date('y-m-d H:i:s'),
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
    }




}
