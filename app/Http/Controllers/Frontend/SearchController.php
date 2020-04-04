<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;

class SearchController extends Controller
{
    //

    public function index(Request $request)
    {

        $data['Product_type'] = Product::where('product_category_id',10)->get();
        $data['id'] = 10;
        $data['Total'] = Product::where('product_category_id','=',10)->count();;

        

        return view('frontend.search',$data); 
      
    }
}
