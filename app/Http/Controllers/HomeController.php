<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProductDetailModel;
use App;
use App\Model\CategoryModel;
use App\Model\EventModel;
use App\Model\BannerModel;
use App\Model\PopupModel;
use App\Model\VideoModel;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index()
    {

        /*SELECT * FROM tb_event where (start_date BETWEEN start_date and NOW()) AND (end_date BETWEEN NOW() and end_date)
*/
        $mytime = Carbon::now();

        $ldate = date('Y-m-d');

        $event = DB::select( DB::raw("SELECT * FROM tb_event where is_active Like 'Y' And (start_date BETWEEN start_date and '$ldate') AND (end_date BETWEEN '$ldate' and end_date)  ORDER BY (start_date) DESC limit 4"));
        
        \Log::info($event);
        $item = ProductDetailModel::where('is_active','Y')->count();
        if($item < 12){
            $data['Product'] = ProductDetailModel::where('is_active','Y')
                ->whereDate('start_time','<=',$ldate)
                ->whereDate('end_time','>=',$ldate)->get();
        }else{
            $data['Product'] = ProductDetailModel::where('is_active','Y')
                ->whereDate('start_time','<=',$ldate)
                ->whereDate('end_time','>=',$ldate)
                ->get()
                ->random(12);

        }

     //   $data['Product']  = ProductDetailModel::with('Descrition')->get()->random(12);
        $cate['Category'] = CategoryModel::all();
        $date = date('y-m-d H:i:s');
      //  $event = EventModel::where('end_date', '>=', $date)->limit(4)->orderBy('id', 'desc')->get();
        $banner = BannerModel::where('is_active','Y')->orderBy('seq', 'ASC')->get();
        $popup = PopupModel::first();

   
        $video = VideoModel::where('is_active','Y')->first();

        $datas = [
            'event' => $event,
            'banner' => $banner,
            'popup' => $popup,
            'video' => $video,
        ];
        return view('frontend.index', $data,$cate)->with($datas);
    }

    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
