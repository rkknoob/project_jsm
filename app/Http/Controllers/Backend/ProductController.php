<?php

namespace App\Http\Controllers\Backend;

use App\CoreFunction\Product;
use App\Model\ProductDesciptionModel;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ProductModel;
use App\Model\ProductDetailModel;
use App\Model\CategoryModel;
use App\Model\OptionModel;
use Validator;
use App\CoreFunction\Datatable;
use Carbon\Carbon;
use DB;
use Log;
use Yajra\DataTables\DataTables;
use function Couchbase\defaultDecoder;


class ProductController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $product = ProductDetailModel::with('Cate')->get();
        $listCategory = CategoryModel::all();
        $data = [
            'item' => $product,
            'itemCategory' => $listCategory,
            'idCategory' => null,
        ];
        return view('backend.Product.index')->with($data);
    }

    public function show()
    {
        $listCategory = CategoryModel::all();
        $image_display = url('img/image.jpg');
        $data = [
            'itemCategory' => $listCategory,
            'image_display' => $image_display,
            'status' => 'add',
        ];

        return view('backend.Product.add_product')->with($data);
    }


    public function store(Request $request)
    {
        // $department = Product::storeCategorie($request);
        \Log::info($request->all());

        $startdate = date("Y-m-d", strtotime($request->start_date));
        $enddate = date("Y-m-d", strtotime($request->end_date));

        $Checkimp = Product::checkimplode($request->file);
        $detailsKeyword = ProductDetailModel::create([
            "name_en" => $request->name_en,
            "name_th" => $request->name_en,
            "price" => $request->price,
            "size" => $request->size,
            "cover_img" => $request->image,
            "cover_zoom" => $request->imagezoom,
            "is_active" => $request->is_active,
            "category_id" => $request->category,
            "detail_th" => $request->summernoteth,
            "detail_en" => $request->summernoten,
            "display_type" => $request->display_type,
            'start_time' =>  $startdate,
            'end_time' =>  $enddate,
            'is_bestseller' => $request->is_bestseller,
          
        ]);

     
        foreach ($Checkimp as $key => $shareLocationData) {
            if($shareLocationData!=""){
                $Productdescition = ProductDesciptionModel::create([
                    "product_id" => $detailsKeyword->id,
                    "seq" => $key++,
                    "img_en" => $shareLocationData,
                    "is_active" => 'Y',
                   
                ]);

            }
        
            
        }

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
    }


    public function update(Request $request,$id)
    {
        \Log::info($request->all());

        $startdate = date("Y-m-d", strtotime($request->start_date));
        $enddate = date("Y-m-d", strtotime($request->end_date));
        try {
            $checkdes = Product::cleardes($request);
            //////เช็ค สิ่งที่ต้องลบ ก่อน /////
            $product = ProductDetailModel::find($id);
            $product->name_en = $request->name_en;
            $product->price = $request->price;
            $product->size = $request->size;
            $product->is_active = $request->is_active;
            $product->detail_th = $request->detail_th;
            $product->detail_en = $request->detail_en;
            $product->cover_zoom = $request->imagezoom;
            $product->cover_img = $request->image;
            $product->display_type = $request->display_type;
            $product->category_id = $request->category;
            $product->start_time = $startdate;
            $product->end_time = $enddate;
            $product->is_bestseller = $request->is_bestseller;
            $product->save();

            ///save Producr Des

            $delpic = ProductDesciptionModel::where('product_id',$id)->delete();   //ลบ  รูป
            if($request->file != null){ ///ผิด
                $Checkimp = Product::checkimplode($request->file);
                $i=1;
                foreach ($Checkimp as $image) {
                    $data = new ProductDesciptionModel();
                    $data->product_id = $id;
                    $data->img_en = $image;
                    $data->seq = $i;
                    $data->is_active = 'Y';
                    $data->save();
                    $i++;
                }
            }

            if($request->is_active=="Y"){
                $productdet = ProductDetailModel::find($id);
                $productsku = $productdet->sku;

                if($productsku){
                    foreach ($productsku as $key => $productsku) {
                        ProductModel::where('product_details_id', $id)->update([
                            "is_active" => "Y",
                            'updated_at' => date('y-m-d H:i:s'),
                        ]);
                    }
                }
            }


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
        $productdet = ProductDetailModel::find($id);
        $productsku = $productdet->sku;
        $productdes = $productdet->ProductDescrition;

        ///////Logic Detele
        if($productsku){
            foreach ($productsku as $key => $productsku) {

                //$productsku->delete();
                ProductModel::where('product_details_id', $id)->update([
                    "is_active" => "N",
                    'updated_at' => date('y-m-d H:i:s'),
                ]);
            }
        }
        // if($productdes){
        //     foreach ($productdes as $key => $productdess) {
        //         $productdess->delete();
        //     }
        // }

        // $productdet->delete();
        $result = ProductDetailModel::where('id', $id)->update([
            "is_active" => "N",
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        return response()->json([
            'type' => 'success',
            'title' => 'ลบสำเร็จ'
        ]);
    }

    public function active(Request $request)
    {
        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
    }

    public function getDatatable(Request $request)
    {
        $department = Datatable::listdata($request);

        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
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

        if ($files = $request->file('findth')) {
            $destinationPath = 'public/findstore/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }


        if ($files = $request->file('finden')) {
            $destinationPath = 'public/findstore/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('eventth')) {
            $destinationPath = 'public/event/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }


        if ($files = $request->file('eventen')) {
            $destinationPath = 'public/event/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('summernoteth')) {
            $destinationPath = 'public/brandjsm/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('summernoten')) {
            $destinationPath = 'public/brandjsm/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }

        
        if ($files = $request->file('summernotefilm')) {
            $destinationPath = 'public/brandjsm/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('summernotentip')) {
            $destinationPath = 'public/artisttip/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }
        if ($files = $request->file('summernotethtip')) {
            $destinationPath = 'public/artisttip/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('summernotenstore')) {
            $destinationPath = 'public/findstore/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }
        if ($files = $request->file('summernotethstore')) {
            $destinationPath = 'public/findstore/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('summernotthproduct')) {
            $destinationPath = 'public/product/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }
        if ($files = $request->file('summernotenproduct')) {
            $destinationPath = 'public/product/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }



        if ($files = $request->file('summernote')) {
            $destinationPath = 'public/brandjsm/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }


        if ($files = $request->file('file_upload')) {
            $destinationPath = 'public/product/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();
\Log::info($profileImage);
            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('img_zoom')) {
            $destinationPath = 'public/product/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('img_color')) {
            $destinationPath = 'public/color/'; // upload path
            \Log::info($destinationPath);
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('img_product')) {

            $destinationPath = 'public/colorproduct/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('filemagazine')) {
            $destinationPath = 'public/magazine/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('filemagazine_th')) {
            $destinationPath = 'public/magazine/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('fileconcept')) {
            $destinationPath = 'public/brandjsm/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('fileconcept_th')) {
            $destinationPath = 'public/brandjsm/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('file_brandjsm_th')) {
            $destinationPath = 'public/brandjsm/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        if ($files = $request->file('file_brandjsm_en')) {
            $destinationPath = 'public/brandjsm/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        return response()->json([
            'data' => $profileImage
        ], 200);
    }

    public function edit($id)
    {

        $product = ProductDetailModel::find($id);
        $start = date("m/d/Y", strtotime($product->start_time));
        $end = date("m/d/Y", strtotime($product->end_time));
        $date = $start." - ".$end;
        $details = ProductDesciptionModel::where('product_id', $id)->pluck('img_en');

        $checking = Product::implode($details);

        $productdes = $product->ProductDescrition;
        foreach ($productdes as $key => $productde) {
            $datas[$key]['id'] = $productde->id;
            $datas[$key]['seq'] = $productde->seq;
            $datas[$key]['img_en'] = $productde->img_en;
            $datas[$key]['img_th'] = $productde->img_th;
        }

        $image_display = url('img/image.jpg');
        $listCategory = CategoryModel::all();
        $data = [
            'itemCategory' => $listCategory,
            'product' => $product,
            'image_display' => $image_display,
            'multifile' => $checking,
            'status' => 'edit',
            'date' => $date,
        ];

        return view('backend.Product.add_product')->with($data);
    }

    public function getImageByProduct($id)
    {
        $data = ProductDesciptionModel::where('product_id', $id)->get();
        return response()->json($data);
    }
}

?>
