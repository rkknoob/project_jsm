<?php

namespace App\Http\Controllers\Frontend;

use App\CoreFunction\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NoticeModel;

class NoticeController extends Controller
{
    public function index(Request $request)
    {


        $listNotice = NoticeModel::orderBy('id', 'DESC')->where('is_active','Y')->paginate(10);
        $data = [
            'item' => $listNotice,
        ];
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);
        return view('frontend/Community.notice')->with($data);

    }

    public function show(Request $request,$id)
    {
        $listNotice = NoticeModel::where(['id' => $id])->first();
        $num = $listNotice->hit+1;
        $result = NoticeModel::where('id', $id)->update([
            "hit" =>  $num,
            'updated_at' => date('y-m-d H:i:s'),
        ]);
        $listNoticeAll = NoticeModel::orderBy('id', 'DESC')->where('is_active','Y')->paginate(5);
        $listItem = NoticeModel::where(['id' => $id])->first();
        $data = [
            'item' => $listItem,
            'itemAll' => $listNoticeAll,
            'id' => $id,

        ];
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);
        return view('frontend/Community.noticedetail')->with($data);
    }

}
