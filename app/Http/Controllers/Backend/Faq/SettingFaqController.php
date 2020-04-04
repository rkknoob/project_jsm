<?php

namespace App\Http\Controllers\Backend\Faq;

use App\CoreFunction\Datatable;
use App\Model\Faq;
use App\Model\Faq_cate;
use App\Model\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class SettingFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Faq::all();



        return view('backend.Faq.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $datas['faq_ate'] = Faq_cate::where('is_active','Y')->get();
    $datas['status'] = 'add';


        return view('backend.Faq.form')->with($datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item_review = Faq::create($request->all());
        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas['faq'] = Faq::findorfail($id);
        $datas['faq_ate'] = Faq_cate::all();
        $datas['status'] = 'edit';

        return view('backend.Faq.form')->with($datas);
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

        $data = Faq::find($id);
        $data->update($request->all());
        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // $item_faq = Faq::find($id);
        // $item_faq->delete();
        $result = Faq::where('id', $id)->update([
            "is_active" => "N",
            'updated_at' => date('y-m-d H:i:s'),
        ]);
    

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
        ]);
    }

    public function getDatatable(Request $request)
    {

        $item = Datatable::Faqs($request);
        \Log::info($item);
        return DataTables::of($item)
            ->make(true);

    }
}
