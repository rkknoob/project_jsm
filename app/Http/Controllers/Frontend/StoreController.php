<?php

namespace App\Http\Controllers\Frontend;

use App\CoreFunction\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FindStoreModel;
use App\Model\FindStore_cate;

class StoreController extends Controller
{
    public function index (Request $request)
    {
        $listitem = FindStoreModel::where('is_active','Y')->get();
        $category = FindStore_cate::where('is_active','Y')->orderby('sorting','ASC')->get();



        foreach ($category as $key => $profilling) {
            $test = $profilling->Findst;
            $data['type'][$key]['name'] = $profilling->name_en;
            $data['type'][$key]['sorting'] = $profilling->sorting;
            $data['type'][$key]['item'] = $test->toArray();;

    }


        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);

        return view('frontend/findstore.store')->with($data);

    }
    public function detailstore (Request $request)
    {

        $listitem = FindStoreModel::findorfail($request->id);
        \Log::info($listitem);

        $data = [
            'item' => $listitem,
        ];
        return view('frontend/findstore.DetailStore')->with($data);
    }
}
