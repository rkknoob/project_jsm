<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CoreFunction\Product;
use App\Models\ProductImage;
use App\Model\LineStoryModel;
use App\Model\LineStoryDesciptionModel;
use App\CoreFunction\Datatable;
use Yajra\DataTables\DataTables;
use Log;
use DB;

use Validator;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;


class LineStoryController extends Controller
{
    //
    public function index()
    {

        return view('backend.LineStory.index');
    }

    public function getDatatable(Request $request)
    {
        $department = Datatable::linestory($request);

        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
    }

    public function destroy($id)
    {
        $result = LineStoryModel::where('id', $id)->update([
            "is_active" => "N",
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        $result = LineStoryDesciptionModel::where('linestory_id', $id)->update([
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
        $image_display = url('img/linestory.png');
        $data = [
            'image_display' => $image_display,
        ];
        return view('backend.LineStory.add')->with($data);
    }

    public function store(Request $request)
    {

        $Checkimp = Product::checkimplode($request->file);
        $detailsKeyword = LineStoryModel::create([
            "name_en" => $request->name_en,
            "banner_en" => $request->banner_en,
            "is_active" => $request->is_active,
        ]);

        foreach ($Checkimp as $key => $shareLocationData) {

            $Productdescition = LineStoryDesciptionModel::create([
                "linestory_id" => $detailsKeyword->id,
                "seq" => ++$key,
                "img_en" => $shareLocationData,
                "is_active" => 'Y',
            ]);
        }
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
        \Log::info($request->all());
        $random = str_random(5);
        if ($files = $request->file('file_upload')) {
            $destinationPath = 'public/linestory/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        return response()->json([
            'data' => $profileImage
        ], 200);
    }

    public function getImageByProduct($id)
    {
        $data = LineStoryDesciptionModel::where('linestory_id', $id)->get();
        \Log::info($data);

        return response()->json($data);
    }

    public function edit($id)
    {
        $product = LineStoryModel::find($id);
        $data = LineStoryDesciptionModel::where('linestory_id', $product->id)->pluck('img_en');
        $checking = Product::implode($data);
        \Log::info($checking);
        $productdes = LineStoryDesciptionModel::where('linestory_id', $product->id)->get();
        $data = [
            'product' => $product,
            'multifile' => $checking,
        ];

        return view('backend.LineStory.edit')->with($data);
    }

    public function update(Request $request)
    {


        
            $detailsKeyword = LineStoryModel::where('id',$request->id)->update([
                "name_en" => $request->name_en,
                "banner_en" => $request->banner_en,
                "is_active" => $request->is_active,
    
            ]);
            $productdes = LineStoryDesciptionModel::where('linestory_id', $request->id)->delete();
            \Log::info($request->file);

            if($request->file != null){ ///ผิด
                $Checkimp = Product::checkimplode($request->file);
                $i=1;
                foreach ($Checkimp as $image) {
                    if($image!=""){
                        $data = new LineStoryDesciptionModel();
                        $data->linestory_id = $request->id;
                        $data->img_en = $image;
                        $data->seq = $i;
                        $data->is_active = 'Y';
                        $data->save();
                        $i++;
                    }
                 
                }
            }          

        
                // foreach ($productdes as $key => $productdes) {
                //     $productdes->where('id',$request->deletefile_id)->update([
                //         "is_active" => "N",
                //         'updated_at' => date('y-m-d H:i:s'),
                //     ]);
                // } 
            
 

            return response()->json([
                'msg_return' => 'บันทึกสำเร็จ',
                'code_return' => 1,
            ]);
        

     

     

    }

}
