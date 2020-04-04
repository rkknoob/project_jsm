<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CoreFunction\Product;
use App\Models\ProductImage;
use App\Model\ArtistTipModel;
use App\CoreFunction\Datatable;
use Yajra\DataTables\DataTables;
use Log;
use DB;

class ArtistTipController extends Controller
{
    //
    public function index()
    {
        return view('backend.ArtistTip.index');
    }

    public function getDatatable(Request $request)
    {
        $department = Datatable::listdataarttip($request);

        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
    }

    public function destroy($id)
    {
        $result = ArtistTipModel::where('id', $id)->update([
            "is_active" => "N",
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        return response()->json([
            'type' => 'success',
            'title' => 'ลบสำเร็จ'
        ]);
    }

    public function show()
    {
        $image_display = url('img/image.jpg');
        $data = [
            'image_display' => $image_display,
        ];
        return view('backend.ArtistTip.add')->with($data);
    }

    public function store(Request $request)
    {

        \Log::info($request->all());
        //$Checkimp = Product::checkimplode($request->file);

        $detailsKeyword = ArtistTipModel::create([
            "title_en" => $request->title_en,
            "title_th" => $request->title_th,
            "img_banner" => $request->img_banner,
            "is_active" => $request->is_active,
            "detail_en" => $request->detail_en,
            "detail_th" => $request->detail_th,
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

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

        //$data = $request->file('file')->store('images/products');

        if ($files = $request->file('file_upload')) {
            $destinationPath = 'public/Artisttip/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        return response()->json([
            'data' => $profileImage
        ], 200);
    }

    public function edit($id)
    {

        $listitem = ArtistTipModel::where('id', $id)->first();
        $image_display = url('img/image.jpg');
        $data = [
            'item' => $listitem,
            'image_display' => null,
        ];

        return view('backend.ArtistTip.edit')->with($data);
    }

    public function update(Request $request)
    {


        $detailsKeyword = ArtistTipModel::where('id',$request->id)->update([
            "title_en" => $request->title_en,
            "title_th" => $request->title_th,
            "img_banner" => $request->img_banner,
            "is_active" => $request->is_active,
            "detail_en" => $request->detail_en,
            "detail_th" => $request->detail_th,
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

}

?>
