<?php

namespace App\Http\Controllers\Frontend;

use App\CoreFunction\Helper;
use App\Menu;
use App\CoreFunction\Product;
use App\Model\CategoryModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ProductModel;
use App\Model\OptionModel;
use App\Model\ProductDetailModel;
use Log;
use DB;
use Auth;



class ProductController extends Controller
{

    public function index()
    {

        return view('frontend.product');
    }
    public function bastseller()
    {
        return view('frontend.bestseller');
    }
    public function base()
    {
        return view('frontend.base');
    }
    public function lip()
    {
        return view('frontend.lip');
    }
    public function skincare()
    {
        return view('frontend.product');
    }
    public function tool()
    {
        return view('frontend.product');
    }
    public function show($id,Request $request)
    {

        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);

        $mytime = Carbon::now();
        $ldate = date('Y-m-d');

        $data['Category'] = CategoryModel::all();
        $banner = CategoryModel::where('id',$id)->value('img');
        $data['img_banner'] = $banner;

        if($id == '0' || $id == '150'){

            if($id == '150'){
                $products = ProductDetailModel::where('is_active','Y')
                ->whereDate('start_time','<=',$ldate)
                ->whereDate('end_time','>=',$ldate)
                ->where('is_bestseller','Y')
                ->orderBy('price', 'asc')->paginate(12);
            $chunk = $products->chunk(4);
            $data['Product_type'] = $products;
            $data['id'] = $id;
            $data['forma'] = 0;
            $data['Total'] = ProductDetailModel::all()->count();

            return view('frontend.product')->with('products',$chunk)->with($data);

            }
            $products = ProductDetailModel::where('is_active','Y')
                ->whereDate('start_time','<=',$ldate)
                ->whereDate('end_time','>=',$ldate)
                ->orderBy('price', 'asc')->paginate(12);
            $chunk = $products->chunk(4);
            $data['Product_type'] = $products;
            $data['id'] = $id;
            $data['forma'] = 0;
            $data['Total'] = ProductDetailModel::all()->count();

            return view('frontend.product')->with('products',$chunk)->with($data);
        }else{
            $products = ProductDetailModel::where('is_active','Y')->where('category_id','=',$id)
                ->whereDate('start_time','<=',$ldate)
                ->whereDate('end_time','>=',$ldate)
                ->orderBy('price', 'asc')->paginate(12);
            $chunk = $products->chunk(4);
            $data['Product_type'] = $products;
            $data['id'] = $id;
            $data['forma'] = 0;
            $data['Total'] = ProductDetailModel::where('category_id','=',$id)->count();

            return view('frontend.product')->with('products',$chunk)->with($data);

        }
        //return view('frontend.product')->with('products',$chunk)->with($data);

    }

    public function getall($te,$id)
    {

        $mytime = Carbon::now();
        $ldate = date('Y-m-d');
        $data['Category'] = CategoryModel::all();
        $banner = CategoryModel::where('id',$te)->value('img');
        $data['img_banner'] = $banner;

        if($te == '0' || $te == '150') {


            if ($id == 1) {
                $products = ProductDetailModel::where('is_active','Y')
                    ->whereDate('start_time','<=',$ldate)
                    ->whereDate('end_time','>=',$ldate)
                    ->orderBy('price', 'asc')->paginate(12);
                $chunk = $products->chunk(4);
                $data['Product_type'] = $products;
                $data['id'] = $te;
                $data['forma'] = $id;
                $data['Total'] = ProductDetailModel::all()->count();

                return view('frontend.product')->with('products', $chunk)->with($data);
            } elseif ($id == 2) {
                $products = ProductDetailModel::where('is_active','Y')
                    ->whereDate('start_time','<=',$ldate)
                    ->whereDate('end_time','>=',$ldate)
                    ->orderBy('price', 'desc')->paginate(12);
                $chunk = $products->chunk(4);
                $data['Product_type'] = $products;
                $data['id'] = $te;
                $data['forma'] = $id;
                $data['Total'] = ProductDetailModel::all()->count();

                return view('frontend.product')->with('products', $chunk)->with($data);
            } elseif ($id == 3) {
                $products = ProductDetailModel::where('is_active','Y')
                    ->whereDate('start_time','<=',$ldate)
                    ->whereDate('end_time','>=',$ldate)
                    ->orderBy('price', 'desc')->orderBy('name_en')->paginate(12);
                $chunk = $products->chunk(4);
                $data['Product_type'] = $products;
                $data['id'] = $te;
                $data['forma'] = $id;
                $data['Total'] = ProductDetailModel::all()->count();

                return view('frontend.product')->with('products', $chunk)->with($data);

            } else {

                $products = ProductDetailModel::where('is_active','Y')
                    ->whereDate('start_time','<=',$ldate)
                    ->whereDate('end_time','>=',$ldate)
                    ->paginate(12);
                $chunk = $products->chunk(4);
                $data['Product_type'] = $products;
                $data['id'] = $te;
                $data['forma'] = 0;
                $data['Total'] = ProductDetailModel::where('category_id','=',$te)->count();

                return view('frontend.product')->with('products',$chunk)->with($data);


            }

        }else{

            if ($id == 1) {

                $products = ProductDetailModel::where('is_active','Y')->where('category_id',$te)
                    ->whereDate('start_time','<=',$ldate)
                    ->whereDate('end_time','>=',$ldate)
                    ->orderBy('price', 'asc')->paginate(12);
                $chunk = $products->chunk(4);
                $data['Product_type'] = $products;
                $data['id'] = $te;
                $data['forma'] = $id;
                $data['Total'] = ProductDetailModel::all()->count();

                return view('frontend.product')->with('products',$chunk)->with($data);
            } elseif ($id == 2) {
                $products = ProductDetailModel::where('category_id',$te)->where('is_active','Y')
                    ->whereDate('start_time','<=',$ldate)
                    ->whereDate('end_time','>=',$ldate)
                    ->orderBy('price', 'desc')->paginate(12);
                $chunk = $products->chunk(4);
                $data['Product_type'] = $products;
                $data['id'] = $te;
                $data['forma'] = $id;
                $data['Total'] = ProductDetailModel::all()->count();

                return view('frontend.product')->with('products',$chunk)->with($data);

            } elseif ($id == 3) {
                $products = ProductDetailModel::where('category_id',$te)->where('is_active','Y')
                    ->whereDate('start_time','<=',$ldate)
                    ->whereDate('end_time','>=',$ldate)
                    ->orderBy('name_en', 'desc')->paginate(12);
                $chunk = $products->chunk(4);
                $data['Product_type'] = $products;
                $data['id'] = $te;
                $data['forma'] = $id;
                $data['Total'] = ProductDetailModel::all()->count();

                return view('frontend.product')->with('products',$chunk)->with($data);

            } else {

                $products = ProductDetailModel::where('category_id',$te)->where('is_active','Y')
                    ->whereDate('start_time','<=',$ldate)
                    ->whereDate('end_time','>=',$ldate)
                    ->orderBy('created_at', 'desc')->paginate(12);
                $chunk = $products->chunk(4);
                $data['Product_type'] = $products;
                $data['id'] = $te;
                $data['forma'] = $id;
                $data['Total'] = ProductDetailModel::all()->count();

                return view('frontend.product')->with('products',$chunk)->with($data);


            }


        }



    }

    public function getdata($id)
    {

        $mytime = Carbon::now();
        $ldate = date('Y-m-d');
        $t = Auth::user();
        if($t == null){
            $user_id = Auth::user();
        }else {
            $user_id = Auth::user()->id;
            $name = Auth::user()->name;
        }
        $datas = [];
        $section = ProductDetailModel::where('id', $id)->where('is_active','Y')
            ->whereDate('start_time','<=',$ldate)
            ->whereDate('end_time','>=',$ldate)
            ->firstOrFail();
        $sectionImages = $section->ProductDescrition;
        $sectionColor = $section->Products;
        $sectionTop = $section->Producttopci->where('user_id',$user_id);
        $sectionCate = $section->Cate;
        $sectionreview = $section->productreview;
        $datas['id'] = $section->id;
        $datas['product_name'] = $section->name_en;
        $datas['img_product'] = $section->cover_img;
        $datas['img_product_zoom'] = $section->cover_zoom;
        $datas['product_price'] = $section->price;
        $datas['display_type'] = $section->display_type;
        $datas['detail'] = $section->detail_th;
        $datas['product_details'] = [];
        $datas['product'] = [];
        $datas['review'] = [];
        $type = null;
        $datas['category_name'] = $section->name;
        $datas['category_pic'] = $section->img;
        $datas['lang'] = session()->get('locale');


        if($sectionColor){
            foreach ($sectionColor as $key => $sectionColors) {
                $datas['product'][$key]['id'] = $sectionColors->id;
                $datas['product'][$key]['sku'] = $sectionColors->sku;
                $datas['product'][$key]['name_en'] = $sectionColors->name_en;
                $datas['product'][$key]['name_th'] = $sectionColors->name_th;
                $datas['product'][$key]['img_color'] = $sectionColors->img_color;
            }
        }

        if($sectionTop){
            foreach ($sectionTop as $key => $sectionTops) {
                $datas['topic'][$key]['id'] = $sectionTops->id;
                $datas['topic'][$key]['title'] = $sectionTops->title;
                $datas['topic'][$key]['created_at'] = $sectionTops->created_at;
                $datas['topic'][$key]['name'] = $name;
                $datas['topic'][$key]['user_id'] = $sectionTops->user_id;
            }
        }
        if($sectionCate)
        {

            $datas['category_name'] = $sectionCate->name;
            $datas['category_pic'] = $sectionCate->img;

        }


        if($sectionImages)
        {
            foreach ($sectionImages as $key => $sectionImage) {
                $datas['product_details'][$key]['seq'] = $sectionImage->seq;
                $datas['product_details'][$key]['img_en'] = $sectionImage->img_en;
                $datas['product_details'][$key]['img_th'] = $sectionImage->img_th;
                $datas['product_details'][$key]['detail_en'] = $sectionImage->detail_en;
                $datas['product_details'][$key]['detail_th'] = $sectionImage->detail_th;
            }
        }

        if($sectionreview)
        {

            foreach ($sectionreview as $key => $sectionreviews) {
                $datas['review'][$key]['id'] = $sectionreviews->id;
                $datas['review'][$key]['title'] = $sectionreviews->title;
                $datas['review'][$key]['product_id'] = $sectionreviews->product_id;
                $datas['review'][$key]['score'] = $sectionreviews->score;
                $datas['review'][$key]['created_at'] = $sectionreviews->created_at;
                $datas['review'][$key]['user_id'] = $sectionreviews->user_id;
                $user_name = User::findorfail($sectionreviews->user_id);
                $datas['review'][$key]['username'] = $user_name->name;

            }

           // $name_user = DB::table('users')->where('id',$sectionreview->user_id)->first();

        }

        return view('frontend/Product.view',$datas);
    }

    public function productlist()
    {
        $product = ProductModel::all();
        return response()->json([
            'datas' => $product,
        ]);
    }

    public function getdatalist($id)
    {

        $product = ProductDetailModel::where('category_id',$id)->take(12)->get();
        return response()->json([
            'datas' => $product,
        ]);
    }


    public function choose(Request $request)
    {


        $id = $request->get('selValue');


        $datas = [];
        $section = ProductModel::findOrFail($id);

        $sectionCate = $section->test;

        $datas['id'] = $section->id;
        $datas['price'] = $sectionCate->price;
        $datas['product_name'] = $section->name_en;
        $datas['stock'] = $section->stock;




        return response()->json([
            'data' => $datas,
        ]);

    }
    public function color(Request $request)
    {


        $data = ProductModel::find($request->id);
        \Log::info($data);







        return response()->json([
            'data' => $data,
        ]);

    }
}
