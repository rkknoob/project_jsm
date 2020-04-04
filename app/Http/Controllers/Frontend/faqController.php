<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Faq;
use App\Model\Faq_cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CoreFunction\Helper;

class faqController extends Controller
{
    public function index(Request $request)
    {
        \Log::info($request->path());
        $datas['cate_faq'] = Faq_cate::where('is_active','Y')->get();
        $datas['id'] = 0;
        $datas['faq'] = Faq::where('is_active','Y')->get();
        $uri = $request->path();

        $datas['subject'] = Helper::subjectmenu($uri);

        foreach ($datas['faq'] as $key => $subscriber) {
            $subscriberFolder = $subscriber->folder;
        }

        return view('frontend/Community.faq')->with($datas);
    }

    public function show(Request $request,$id)
    {
        $datas['cate_faq'] = Faq_cate::where('is_active','Y')->get();
        $datas['id'] = $id;
        $datas['faq'] = Faq::where('type', $id)->where('is_active','Y')->get();

        $urllast = $request->path();

        $uri = substr($urllast,0,-2);  // uri มาเกิน เลยตัด str

        $datas['subject'] = Helper::subjectmenu($uri);

        return view('frontend/Community.faq')->with($datas);
    }



}
