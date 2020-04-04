<?php

namespace App\Http\Controllers\Frontend;

use App\CoreFunction\Helper;
use App\Model\CategoryModel;
use App\Model\ProductDetailModel;
use App\Model\Qa\QaanswersModel;
use App\Model\Qa\QacateModel;
use App\Model\Qa\QarelatModel;
use App\Model\Qa\QatopicModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Log;
use Auth;
use App\CoreFunction\Checkboard;
use Validator;

class QAController extends Controller
{

    public function __construct()
    {


    }


    public function index(Request $request,$type =null)
    {

        //   $datas = [];

        // $topic = QatopicModel::orderBy('created_at','desc')->with('usertopics')->with('usertopics')->get();

        $pro = DB::table('topic_qa')
            ->join('users', 'users.id', '=', 'topic_qa.user_id')
            ->join('cate_qa', 'cate_qa.id', '=', 'topic_qa.type')
            ->select('topic_qa.id', 'topic_qa.title', 'topic_qa.content','topic_qa.hit','topic_qa.user_id','users.email','cate_qa.name','topic_qa.created_at')
            ->orderby('id','desc')
            ->where('topic_qa.status','Y')
            ->paginate(10);

        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);
        $data['paginate'] = $pro;
        $data['cate_type'] = 0;
        $cate = QacateModel::all();

        return view('frontend/Community.qa')->with('topics',$pro)->with($data)->with('cates',$cate);
    }
    public function detailqa(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->guest('/login');
        }
        $datas = [];
        $datas['cate_product'] = CategoryModel::all();
        $datas['cate_qa'] = QacateModel::all();
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);

        return view('frontend/Community.boardqa')->with($datas)->with($data);
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function store(Request $request)
    {


        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'content' => 'required',
            'product_id' => 'required',
            'captcha' => 'required|captcha'
        ]);

        $topic = QatopicModel::create($request->all());

        if(isset($topic->id)){
            $relat = QarelatModel::create([
                "topic_id" => $topic->id,
            ]);

        }else {

            dd('ผิดพลาด');
        }


        return redirect('/qa');
    }

    public function show(Request $request,$id)
    {

        \Log::info("show");
        // chechk  permission list

        $pro = DB::table('topic_qa')
            ->join('users', 'users.id', '=', 'topic_qa.user_id')
            ->join('cate_qa', 'cate_qa.id', '=', 'topic_qa.type')
            ->select('topic_qa.id', 'topic_qa.title', 'topic_qa.content','topic_qa.hit','topic_qa.user_id','users.email','cate_qa.name','topic_qa.created_at')
            ->paginate(10);

        $data['paginate'] = $pro;
        $data['cate_type'] = $id;
        $cate = QacateModel::all();
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);

        return view('frontend/Community.qa')->with('topics',$pro)->with($data)->with('cates',$cate);

    }


    public function board(Request $request,$id,$topic)
    {

        if (!Auth::check()) {
            return redirect()->guest('/login');
        }
        $checkdata = Checkboard::check($id,$topic);
        if($checkdata == false){
            return abort(404);
        }
        $test = QatopicModel::findorfail($topic);
        $result = QatopicModel::where('id', $topic)->update([
            "hit" =>  $test->hit+1,
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        $pro = DB::table('topic_qa')
            ->join('users', 'users.id', '=', 'topic_qa.user_id')
            ->join('cate_qa', 'cate_qa.id', '=', 'topic_qa.type')
            ->select('topic_qa.id', 'topic_qa.title', 'topic_qa.content','topic_qa.hit','topic_qa.user_id','users.email','cate_qa.name','topic_qa.created_at')
            ->where('topic_qa.status','Y')
            ->paginate(10);

        ///query data //
        $datas = [];


        $topic_find = QatopicModel::findorfail($topic);


        $usercreatetopic = $topic_find->usertopics;
        $datas = $topic_find->toArray();
        $datas['answer'] = [];
        // $anwser = QarelatModel::findorfail($topic);

        //   $relat = QarelatModel::findorfail($topic_find->id);
        $relat = QarelatModel::where('topic_id', $topic_find->id)->firstOrFail();

        $count = 0;
        $answers = $relat->replys;
        if($answers && $answers->count() > 0){
            foreach ($answers as $key => $answerss) {
                $datas['answer'][$count]['id'] = $answerss->id;
                $datas['answer'][$count]['details'] = $answerss->details;
                $datas['answer'][$count]['created_at'] = $answerss->created_at;
                $count++;
            }
        }

        $data['paginate'] = $pro;
        $data['cate_type'] = 0;
        $cate = QacateModel::all();
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);
        return view('frontend/Community.qaview')->with('topics',$pro)->with($data)->with('cates',$cate)->with('answer',$datas);

    }

    public function fetch(Request $request)
    {
        $data = ProductDetailModel::where('category_id',$request->select)->get();

        return response()->json([
            'datas' => $data
        ], 200);

    }

    public function destroy($id)
    {
        $deltopci = QatopicModel::find($id);
        $qarel =  QarelatModel::where('topic_id',$deltopci->id)->first();

        $qaans = QaanswersModel::where('qa_id',$qarel->id)->get();

        try {

            if($qaans->count() > 0){
                DB::table('answers_qa')->where('qa_id',$id)->delete();
            }
            if($qarel){
                $qarel->delete();
            }
            $deltopci->delete();

            return response()->json([
                'msg_return' => 'ลบสำเร็จ',
                'code_return' => 1,
            ]);


        } catch (\Exception $e) {

            return response()->json([
                'msg_return' => 'ติดต่อAdmin',
                'code_return' => 99,
            ]);
        }
        //  $product = Product::find($id);
        //  $productCategories = ProductCategory::where('ecommerce_product_id',$product->id);
        //  $qaans = QaanswersModel::where('qa_id',$qarel);

    }

    public function edit(Request $request,$id)
    {
        $datas = [];
        $datas['topic'] = QatopicModel::find($id);
        $find_item = $datas['topic']->product_id;
        $product = ProductDetailModel::find($find_item);
        $datas['cate_id'] = CategoryModel::find($product->category_id)->id;

        $datas['cate_product'] = CategoryModel::all();
        $datas['cate_qa'] = QacateModel::all();
        $datas['topic_product'] = $product->id;
        $datas['product'] = ProductDetailModel::where('category_id',$datas['cate_id'])->get();
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);

        return view('frontend/Community.editboardqa')->with($datas)->with($data);
    }

    public function update(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required',
            'content' => 'required',
            'product_id' => 'required',
            'captcha' => 'required|captcha'

        ]);
        return redirect('/qa');

    }



}
