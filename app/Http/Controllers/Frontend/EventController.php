<?php

namespace App\Http\Controllers\Frontend;

use App\CoreFunction\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\EventModel;
use Log;
use DB;


class EventController extends Controller
{
    public function index(Request $request)
    {
        $date = date('y-m-d H:i:s');
        $products = EventModel::where('end_date', '>=', $date)->where('is_active',"Y")->orderBy('id', 'desc')->paginate(6);
        $chunk = $products->chunk(4);

        $data = [
            'products' => $products,
            'item' => $products,
        ];
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);
        return view('frontend/Event.event1')->with('products',$chunk)->with($data);
    }

    public function Event2(Request $request)
    {
        $date = date('y-m-d H:i:s');
        $products = EventModel::where('end_date', '<=', $date)->where('is_active',"Y")->orderBy('id', 'desc')->paginate(6);
        $chunk = $products->chunk(4);

        $data = [
            'products' => $products,
            'item' => $products,
        ];
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);
        return view('frontend/Event.event2')->with('products',$chunk)->with($data);
    }

    public function details_01()
    {
        return view('frontend/Event/detailevent1');
    }

    public function details(Request $request,$id)
    {
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);
        $data['event'] = EventModel::findOrFail($id);

        return view('frontend/Event/detailevent')->with($data);
    }


}
