<?php

namespace App\Http\Controllers\Backend\Qa;

use App\CoreFunction\Datatable;
use App\Menu;
use App\Model\Qa\QaanswersModel;
use App\Model\Qa\QarelatModel;
use App\Model\Qa\QatopicModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Auth;

class SettingQaboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend/Qa.indexboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Productdescition = QaanswersModel::create([
            "details" => $request->details,
            "qa_id" => $request->qa_id,
        ]);
        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code_return' => 1,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $datas = [];
        $datas['topic'] = QatopicModel::find($id);
        $datas['user'] = User::find($datas['topic']->user_id);
        $datas['admin'] = Auth::guard('admin')->user()->email;

        $datas['answer'] = [];
        $relat = QarelatModel::where('topic_id', $datas['topic']->id)->firstOrFail();
        $datas['id'] = $relat->id;
        $answers = $relat->replys;
        $count = 0;
        if($answers && $answers->count() > 0){
            foreach ($answers as $key => $answerss) {
                $datas['answer'][$count]['id'] = $answerss->id;
                $datas['answer'][$count]['details'] = $answerss->details;
                $datas['answer'][$count]['created_at'] = $answerss->created_at->format('d-m-Y');
                $count++;
            }
        }

        return view('backend/Qa.viewboard')->with($datas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getDatatable(Request $request)
    {

        $topic = Datatable::qaboard($request);
        \Log::info($topic);
        return DataTables::of($topic)
            ->setRowClass(function ($topic) {
                return $topic->status ? '' : 'alert-danger';
            })
            ->make(true);

    }
    public function showblog(Request $request)
    {

        $datas = [];
        $datas['topic'] = QatopicModel::find($request->id);
        $datas['user'] = User::find($datas['topic']->user_id);
        $relat = QarelatModel::findorfail($request->id);
        $test = Auth::guard('admin')->user()->email;
        $answers = $relat->replys;
        $count = 0;
        if($answers && $answers->count() > 0){
            foreach ($answers as $key => $answerss) {
                $datas['answer'][$count]['id'] = $answerss->id;
                $datas['answer'][$count]['details'] = $answerss->details;
                $datas['answer'][$count]['created_at'] = $answerss->created_at->format('d/m/Y H:i');
                $datas['answer'][$count]['user_anser'] = $test;

                $count++;
            }
        }
        return response()->json($datas);
    }

}
