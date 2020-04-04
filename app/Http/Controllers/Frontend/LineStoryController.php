<?php

namespace App\Http\Controllers\Frontend;

use App\CoreFunction\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\LineStoryModel;
use App\Model\LineStoryDesciptionModel;


class LineStoryController extends Controller
{
    public function index(Request $request)
    {
        $listLine = LineStoryModel::WHERE('is_active','Y')->orderBy('id', 'desc')->paginate(6);
        $data = [
            'item' => $listLine,
        ];
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);

        return view('frontend/Linestory.LineStory')->with($data);

    }

    public function show($id){
        $listLine = LineStoryDesciptionModel::where(['linestory_id' => $id])->get();
        $data = [
            'item' => $listLine,
        ];
        return view('frontend/Linestory.detaillinestory')->with($data);;

    }

}
