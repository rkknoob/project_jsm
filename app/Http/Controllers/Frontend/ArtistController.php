<?php

namespace App\Http\Controllers\Frontend;

use App\CoreFunction\Helper;
use App\Model\ArtistMag;
use App\Model\BrandMagazineModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    public function index(Request $request)
    {
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenu($uri);
        $data['numberMagazine'] = ArtistMag::where('type', 'T')->where('is_active', 'Y')->first();

        return view('frontend/Artistjsm.artist')->with($data);
    }
    public function magazine(Request $request)
    {


        //$listMagazine = BrandMagazineModel::paginate(8);
        $listMagazine = ArtistMag::where('type', 'M')->where('is_active', 'Y')->orderBy('id','desc')->paginate(16);

        $chunk = $listMagazine->chunk(4);
        $data['Paginate'] = $listMagazine;
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);

        return view('frontend/Artistjsm.magazines')->with('magazzine',$chunk)->with($data);

    }
    public function media(Request $request,$id)
    {
        $uri = $request->path();
        $data['subject'] = Helper::subjectmenucheck($uri);
        $data['numberMagazine'] = ArtistMag::findOrFail($id);

        return view('frontend/Artistjsm.media')->with($data);

    }


    public  function  artisttip ()
    {
        return view('frontend/ArtisTip.artisttip01');
    }

    public  function  artisttip02 ()
    {

        return view('frontend/ArtisTip.artisttip02');
    }

    public  function  detailartis ()
    {

        return view('frontend/ArtisTip.DetailArtistip');
    }

    public function artistmag ()
    {


    }
}
