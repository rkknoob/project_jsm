<?php

namespace App\Http\Controllers\Frontend;

use App\CoreFunction\Helper;
use App\Menu;
use App\Model\Brandjsm;
use App\Model\BrandMagazineModel;
use App\Model\Langfront;
use App\Model\LangMenu;
use Illuminate\Http\Request;
use App\Model\BrandMagazine;
use App\Http\Controllers\Controller;
use Embed\Embed;
use LaravelVideoEmbed;

class BrandController extends Controller
{
    public function index(Request $request)
    {

        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);
        $data['brand'] = Brandjsm::where('type', 'C')->where('is_active', 'Y')->first();

        return view('frontend/Brandjsm.brand')->with($data);
    }

    public function magazines(Request $request)
    {

        $listMagazine = Brandjsm::where('type', 'M')->where('is_active','Y')->orderBy('id','desc')->paginate(8);
        $chunk = $listMagazine->chunk(4);
        $data['Paginate'] = $listMagazine;
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);
        return view('frontend/Brandjsm.magazines')->with('magazzine',$chunk)->with($data);
    }

    public function film(Request $request)
    {
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);
        $listfilm = Brandjsm::where('type', 'F')->where('is_active','Y')->orderBy('id','desc')->paginate(8);

        $chunk = $listfilm->chunk(4);
        $data['Paginate'] = $listfilm;
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);
        return view('frontend/Brandjsm.film')->with('film',$chunk)->with($data);

    }
    public function film_media(Request $request,$id)
    {
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);
        $data['numberMagazine'] = Brandjsm::findOrFail($id);
        $url = $data['numberMagazine']->link_video;
        $whitelist = ['YouTube', 'Vimeo'];


        $params = ['autoplay' => 1, 'loop' => 1, 'width' => '1000', 'height' => "480",
        ];

        $attributes = [
            'type' => null,
            'class' => 'iframe-class',
            'width' => '1000',
            'height' => "480",
            'data-html5-parameter' => true
        ];

        $data['link'] = LaravelVideoEmbed::parse($url, $whitelist, $params, $attributes);


        return view('frontend/Brandjsm.video')->with($data);

    }


    public function media(Request $request,$id)
    {
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);
        $data['numberMagazine'] = Brandjsm::findOrFail($id);

        return view('frontend/Brandjsm.brandmedia')->with($data);

    }
}
