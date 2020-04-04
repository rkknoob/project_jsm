<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CoreFunction\Product;
use App\Models\ProductImage;
use App\Model\NoticeModel;
use App\CoreFunction\Datatable;
use Yajra\DataTables\DataTables;
use Log;
use DB;

use Validator;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;

class NoticeController extends Controller
{
    //
    public function index()
    {
        return view('backend.Notice.index');
    }

    public function getDatatable(Request $request)
    {
        $department = Datatable::notice($request);

        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
    }
    
    public function destroy($id)
    {
        $result = NoticeModel::where('id', $id)->update([
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
        $image_display = url('img/Linestory.png');
        $data = [
            'image_display' => $image_display,
        ];
        return view('backend.Notice.add')->with($data);
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
        // \Log::info($request->all());
        $random = str_random(5);
        if ($files = $request->file('file_upload')) {
            $destinationPath = 'public/notice/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        return response()->json([
            'data' => $profileImage
        ], 200);
    }

    public function store(Request $request)
    {
        // \Log::info($request->all());
        $Checkimp = Product::checkimplode($request->file);
        $detailsKeyword = NoticeModel::create([
            "name" => $request->name,
            "content" => $request->content,
            "type" => $request->type,
            "detail" => $request->file,
            "hit" => "0",
            "is_active" => $request->is_active,
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

    public function edit($id)
    {
        $listitem = NoticeModel::find($id);
        $item = NoticeModel::all();
        \Log::info($item);

        $checking = $listitem->detail;
        $data = [
            'item' => $listitem,
            'multifile' => $checking,
        ];

        return view('backend.Notice.edit')->with($data);
    }

    public function getImageByProduct($id)
    {
        $data = NoticeModel::where('id',$id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        \Log::info($request->all());
        $detailsKeyword = NoticeModel::where('id',$request->id)->update([
            "name" => $request->name,
            "content" => $request->content,
            "type" => $request->type,
            "detail" => $request->file,
            "is_active" => $request->is_active,

        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }


}
