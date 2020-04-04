<?php

namespace App\Http\Controllers\Backend\Review;

use App\CoreFunction\Datatable;
use App\Model\ProductDetailModel;
use App\Model\Review;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ReviewSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend/Review.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [];
        $datas['user'] = User::all();
        $datas['isstatus'] = 'add';
        $datas['product'] = ProductDetailModel::all();

        return view('backend/Review.form')->with($datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Log::info($request->all());
        ////เช็ค Logic ///
        /// 1.จะแอดต้องเช็คก่อนว่า user นั้นมี product นั้นรึยังถ้ายัง ค่อย insert
        ///

        $item = Review::where('product_id',$request->product_id)->where('user_id',$request->user_id)->get()->count();

        if($item == 0){
            try {
                $item_review = Review::create($request->all());
                return response()->json([
                    'msg_return' => 'บันทึกสำเร็จ',
                    'code' => 200,
                ]);

            } catch (Exception $e) {
                return response()->json([
                    'msg_return' => 'บันทึกสำเร็จ',
                    'code' => 500,
                ]);
            }
        }else  {
            return response()->json([
                'msg_return' => 'error',
                'code' => 99,
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = [];
        $datas['user'] = User::all();
        $datas['isstatus'] = 'edit';
        $datas['product'] = ProductDetailModel::all();
        $datas['review'] = Review::findorfail($id);

        return view('backend/Review.form')->with($datas);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Log::info($request->all());

       // $item = Review::where('product_id',$request->product_id)->where('user_id',$request->user_id)->get()->count();

        $item = Review::find($id);
        $duplicate = User::where('id', $item->user_id)->first();


        try {
            /*
               $item_review = Review::find($id);
               $item_review->update([
                   'score' => $request->score,
                   'title' => $request->title,
                   'hit' => $request->hit,
                   'status' => $request->status,
               ]);
               */

            if($item->user_id==$request->user_id){
                $item->update([
                    'score' => $request->score,
                    'title' => $request->title,
                    'hit' => $request->hit,
                    'content' => $request->contentt,
                    'status' => $request->status,
                ]);
                return response()->json([
                    'msg_return' => 'บันทึกสำเร็จ',
                    'code' => 200,
                ]);
            }else{

                $rev = Review::where('product_id',$request->product_id)->where('user_id',$request->user_id)->count();
                if($rev == 0){
                    /////update

                    $item->update([
                        'user_id' => $request->user_id,
                        'product_id' => $request->product_id,
                        'title' => $request->title,
                        'content' => $request->contentt,
                        'score' => $request->score,
                        'status' => $request->status,
                        'hit' => $request->hit,
                    ]);

                    return response()->json([
                        'msg_return' => 'บันทึกสำเร็จ',
                        'code' => 200,
                    ]);
                }
                return response()->json([
                    'msg_return' => 'บันทึกสำเร็จ',
                    'code' => 201,
                ]);
            }

        } catch (Exception $e) {
            return response()->json([
                'msg_return' => 'บันทึกสำเร็จ',
                'code' => 500,
            ]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item_review = Review::find($id);
        $item_review->delete();

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
        ]);
    }

    public function getDatatable(Request $request)
    {
        $topic = Datatable::blogreview($request);
        \Log::info($topic);
        return DataTables::of($topic)
            ->setRowClass(function ($topic) {
                return $topic->status ? '' : 'alert-danger';
            })
            ->make(true);
    }
}
