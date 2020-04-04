<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BrandMagazineModel;

class BrandJsmController extends Controller
{
    public function listFilm()
    {
        $listitem = BrandMagazineModel::where('type',3)->paginate(10);
        $data = [
            'item' => $listitem,
        ];
        return view('backend.Brandjsm.film')->with($data);
    }

    public function editFilm($id)
    {
        
        $listitem = BrandMagazineModel::where(['type'=>3,'id'=>$id])->first();
        $data = [
            'item' => $listitem,
        ];
        return view('backend.Brandjsm.edit_film')->with($data);

    }
}
