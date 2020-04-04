<?php

namespace App\CoreFunction;

use App\Model\ArtistMag;
use Illuminate\Database\Eloquent\Model;
use DB;
use Log;


class Datatable extends Model
{
    public static function listdata($request = null)
    {

        $products = DB::table('product_details')
            ->select('product_details.id','product_details.name_en','product_details.name_th','product_details.cover_img','product_details.price','product_details.is_active','category.name')
            ->join('category', 'category.id', '=', 'product_details.category_id');

       // $products = $products->where('product.price', '>','1')->get();
        if (!empty($request->categorie_id)) {
            $products = $products->where('category.id', $request->categorie_id);
        }
        $products = $products->get();
        return $products;
    }

    public static function listdatasku($request = null)
    {

        $products = DB::table('product')
            ->select('product.id','product.sku','product.name_en','product.img_color','product.img_product','product.is_active','product.product_details_id','category.name')
            ->join('product_details', 'product_details.id', '=', 'product.product_details_id')
            ->join('category', 'category.id', '=', 'product_details.category_id');


        if (!empty($request->categorie_id)) {
            $products = $products->where('category.id', $request->categorie_id);
        }
        if (!empty($request->product_id)) {
            $products = $products->where('product.product_details_id', $request->product_id);
        }
        $products = $products->get();
        \Log::info($products);
        return $products;
    }

    public static function listdataarttip($request = null)
    {
        $artist = DB::table('artist_tip')->get();
        return $artist;
    }

    public static function listmagazine($request = null)
    {
        $artist = DB::table('artist_magazine')->where('type','M')->get();
        return $artist;
    }

    public static function introduct($request = null)
    {
        $artist = DB::table('artist_magazine')->where('type','T')->get();
        return $artist;
    }

    public static function brandcontent($request = null)
    {
        $brandjsm = DB::table('brandjsm')->where('type','F')->get();
        return $brandjsm;
    }

    public static function brandmagazine($request = null)
    {
        $jsm = DB::table('brandjsm')->where('type','M')->get();
        return $jsm;
    }

    public static function concept($request = null)
    {
        $brandjsm = DB::table('brandjsm')->where('type','C')->get();
        return $brandjsm;
    }


    public static function linestory($request = null)
    {
        $linestory = DB::table('linestory')->get();
        return $linestory;
    }

    public static function listdatacategory($request = null)
    {
        $category = DB::table('category')->get();
        return $category;
    }

    public static function listdataevent($request = null)
    {
        $event = DB::table('event')->get();
        return $event;
    }

    public static function listbanner($request = null)
    {
        $banner = DB::table('banner')->get();
        \Log::info($banner);
        return $banner;
    }

    public static function listvideo($request = null)
    {
        $video = DB::table('video')->where('is_active','Y')->get();
        return $video;
    }

    public static function liststore($request = null)
    {
        $finestore = DB::table('finestore')->get();
        return $finestore;
    }

    public static function listplops($request = null)
    {
        $finestore = DB::table('store_category')->get();
        return $finestore;
    }

    public static function listdatapopup($request = null)
    {
        $popup = DB::table('popup')->get();
        return $popup;
    }

    public static function notice($request = null)
    {
        $notice = DB::table('notice')->get();
        return $notice;
    }

    public static function qaboard($request = null)
    {
       // $topi = DB::table('topic_qa')->get();

        $topi = DB::table('topic_qa')
            ->select('topic_qa.id','topic_qa.title','topic_qa.hit','topic_qa.status','users.name','cate_qa.name as cate_name')
            ->leftjoin('users', 'users.id', '=', 'topic_qa.user_id')
            ->leftjoin('cate_qa', 'cate_qa.id', '=', 'topic_qa.type')
            ->get();
        return $topi;
    }


    public static function blogreview($request = null)
    {
        // $topi = DB::table('topic_qa')->get();

        $item_review = DB::table('review')
            ->select('review.id','review.title','review.hit','review.status','review.score','review.content','product_details.name_en','product_details.name_th','users.email','product_details.cover_img')
            ->leftjoin('users', 'users.id', '=', 'review.user_id')
            ->leftjoin('product_details', 'product_details.id', '=', 'review.product_id')
            ->get();
        return $item_review;
    }

    public static function groupmenu($request = null)
    {
        // $topi = DB::table('topic_qa')->get();

        $groupmenu = DB::table('admin_menu_head')
            ->select('admin_menu_head.id','admin_menu_head.name_en','admin_menu_head.name_th','admin_menu_head.is_active','admin_menu_head.sort_id')
            ->get();

        \Log::info($groupmenu);
        return $groupmenu;
    }

    public static function mainmenu($request = null)
    {
        // $topi = DB::table('topic_qa')->get();

        $groupmenu = DB::table('admin_menu')
            ->select('admin_menu.id','admin_menu.name_en','admin_menu.name_th','admin_menu.show','admin_menu.icon','admin_menu.sort_id','admin_menu_head.name_en as group_name')
            ->leftjoin('admin_menu_process', 'admin_menu.id', '=', 'admin_menu_process.menu_id')
            ->leftjoin('admin_menu_head', 'admin_menu_process.head_id', '=', 'admin_menu_head.id')
            ->get();
        return $groupmenu;
    }

    public static function submenu($request = null)
    {


        $groupmenu = DB::table('admin_submenu')
            ->select('admin_submenu.id','admin_submenu.name_en','admin_submenu.name_th','admin_submenu.show','admin_submenu.icon','admin_menu.name_en as main_menu','admin_submenu.sort_id as sort_id')
            ->leftjoin('admin_menu', 'admin_submenu.sub_id', '=', 'admin_menu.id')
            ->get();
        return $groupmenu;
    }

    public static function menuhome($request = null)
    {


        $groupmenu = DB::table('menu')
            ->select('menu.id','menu.name_en','menu.name_th','menu.parent_id','menu.sort')
            ->get();
        return $groupmenu;
    }

    public static function lang($request = null)
    {


        $item = DB::table('frontlang')
            ->select('frontlang.id','frontlang.subject_en','frontlang.subject_th','frontlang.summary_en','frontlang.summary_th')
            ->get();
        return $item;
    }

    public static function settinguser($request = null)
    {
        $item = DB::table('admin')
            ->select('admin.id','admin.fname','admin.lname','admin.email','admin.is_active')
            ->get();
        return $item;
    }

    public static function Faqs($request = null)
    {
        $item = DB::table('faq')
            ->select('faq.id','faq.subject','faq.question','faq.type','faq.is_active','faq_category.name_en as name_en','faq_category.name_th as name_th')
            ->leftjoin('faq_category', 'faq.type', '=', 'faq_category.id')
            ->where('faq_category.is_active', 'Y')
            ->get();

        return $item;
    }

    public static function Faqscate($request = null)
    {
        $item = DB::table('faq_category')
            ->select('faq_category.id','faq_category.name_en','faq_category.name_th','faq_category.is_active')

            ->get();
        return $item;
    }





}
