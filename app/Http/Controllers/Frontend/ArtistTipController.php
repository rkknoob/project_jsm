<?php

namespace App\Http\Controllers\Frontend;

use App\CoreFunction\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ArtistTipModel;

class ArtistTipController extends Controller
{
    //
    public function listartisttip(Request $request)
    {
        $list = ArtistTipModel::where('is_active' ,'Y')->orderBy('id','desc')->paginate(16);
        $chunk = $list->chunk(4);
        $data = [
            'item' => $list,
            'chunks' => $chunk,
        ];
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);
        return view('frontend/Artisttip.artist')->with($data)->with('list',$chunk);
    }

    public function showid(Request $request,$id)
    {
        $list = ArtistTipModel::WHERE(['id' => $id])->first();
        $data = [
            'item' => $list,
        ];
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);
        return view('frontend/Artisttip.detailartist')->with($data);

    }
}
