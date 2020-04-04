<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CoreFunction\Product;
use App\Model\EventModel;
use App\CoreFunction\Datatable;
use Yajra\DataTables\DataTables;
use DB;
use Log;

class EventController extends Controller
{
    //
    public function index()
    {
        return view('backend.Event.index');
    }

    public function getDatatable(Request $request)
    {
        $department = Datatable::listdataevent($request);

        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
    }

    public function show()
    {
        $image_display = url('img/image.jpg');
        $data = [
            'image_display' => $image_display,
        ];
        return view('backend.Event.add')->with($data);
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

        $random = str_random(5);

        if ($files = $request->file('img_color')) {
            $destinationPath = 'public/event/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('img_product')) {
            $destinationPath = 'public/event/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        return response()->json([
            'data' => $profileImage
        ], 200);
    }

    public function store(Request $request)
    {

        $startdate = date("Y-m-d", strtotime($request->start_date));
        $enddate = date("Y-m-d", strtotime($request->end_date));

        $Checkimp = Product::checkimplode($request->file);
        $detailsKeyword = EventModel::create([
            "topic_en" => $request->topic_en,
            "topic_th" => $request->topic_th,
            "banner1" => $request->banner1,
            "banner2" => $request->banner2,
            "is_active" => $request->is_active,
            "detail_th" => $request->detail_th,
            "detail_en" => $request->detail_en,
            'start_date' =>  $startdate,
            'end_date' =>  $enddate,
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    
    }
    public function edit($id)
    {
        $product = EventModel::where('id',$id)->first(); 
        $item= EventModel::all();; 

        \Log::info($item);
        $start = date("m/d/Y", strtotime($product->start_date));
        $end = date("m/d/Y", strtotime($product->end_date));
        $date = $start." - ".$end;
        $data = [
            'product' => $product,
            'date' => $date ,
        ];

        return view('backend.Event.edit')->with($data);
    }

    public function update(Request $request)
    {
        
        $startdate = date("Y-m-d", strtotime($request->start_date));
        $enddate = date("Y-m-d", strtotime($request->end_date));

        \Log::info($request->all());
        $detailsKeyword = EventModel::where('id',$request->id)->update([
            "topic_en" => $request->topic_en,
            "topic_th" => $request->topic_th,
            "banner1" => $request->banner1,
            "banner2" => $request->banner2,
            "is_active" => $request->is_active,
            "detail_th" => $request->detail_th,
            "detail_en" => $request->detail_en,
            'start_date' =>  $startdate,
            'end_date' =>  $enddate,
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);

    }

    public function destroy($id)
    {
        $result = EventModel::where('id', $id)->update([
            "is_active" => "N",
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        return response()->json([
            'type' => 'success',
            'title' => 'ลบสำเร็จ'
        ]);
    }


    
}
