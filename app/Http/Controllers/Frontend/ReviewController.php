<?php

namespace App\Http\Controllers\Frontend;

use App\CoreFunction\Helper;
use App\Model\CategoryModel;
use App\Model\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use Validator;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        // $review = Review::all()->with('test');
        $datas = [];
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);

        //    $products = Review::all();
        $item = Review::where('status','Y')->orderBy('updated_at','desc')->get();

        foreach ($item as $key => $profilling) {
            $datas[$key]['id'] = $profilling->id;
            $datas[$key]['title'] = $profilling->title;
            $datas[$key]['content'] = $profilling->content;
            $datas[$key]['product'] = $profilling->review_product;
            $datas[$key]['product_id'] = $profilling->product_id;
            $datas[$key]['image'] = $profilling->review_product->cover_img;
            $datas[$key]['score'] = $profilling->score;
            $datas[$key]['hit'] = $profilling->hit;
            $datas[$key]['created_at'] = $profilling->created_at;
        }
        //$datas['product'] = $profilling->trackingBc;

        return view('frontend/Community.review')->with('review',$datas)->with($data);
    }

    public function create(Request $request,$id)
    {
        $item_cate = CategoryModel::all();
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);
        $data['product_id'] = $id;
        return view('frontend/Community.addreview')->with('cate',$item_cate)->with($data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'captcha' => 'required|captcha',
        ]);

        $datas = [];
        if ($validator->passes()) {

            try {

                $topic = Review::create($request->all());
                return response()->json([
                    'code' => '200',
                    'title' => 'Save Data'
                ]);

            } catch (Exception $e) {

                $datas['status'] = 0;
                $return['content'] = 'Fail'.$e->getMessage();
                return response()->json([
                    'code' => '500',
                    'title' => 'Contact Admin'
                ]);
            }

        }else{


            $datas['status'] = 99;
            return response()->json([
                'code' => '99',
                'title' => 'Error Valid'
            ]);
        }

    }

    public function reviewblog(Request $request,$id)
    {

        $datas = [];
        $item_find = Review::find($id);
        $result = Review::where('id', $id)->update([
            "hit" =>  $item_find->hit+1,
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        $item = Review::orderBy('updated_at','desc')->get();
        $item_find = Review::find($id);
        $datas['revi'] = $item_find;

        $datas['product_details'] = $item_find->review_product;
        $datas['reviews'] = [];
        foreach ($item as $key => $profilling) {
            $datas['reviews'][$key]['id'] = $profilling->id;
            $datas['reviews'][$key]['title'] = $profilling->title;
            $datas['reviews'][$key]['content'] = $profilling->content;
            $datas['reviews'][$key]['product'] = $profilling->review_product;
            $datas['reviews'][$key]['product_id'] = $profilling->product_id;
            $datas['reviews'][$key]['image'] = $profilling->review_product->cover_img;
            $datas['reviews'][$key]['score'] = $profilling->score;
            $datas['reviews'][$key]['hit'] = $profilling->hit;
            $datas['reviews'][$key]['created_at'] = $profilling->created_at;
        }
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);
        //$datas['product'] = $profilling->trackingBc;

        return view('frontend/Community.reviewblog')->with($datas)->with($data);



    }

}
