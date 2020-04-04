<?php

namespace App\Http\Controllers\API;

use App\Menu;
use App\Model\AdminHeadMenu;
use App\Model\AdminMenu;
use App\Model\AdminModel;
use App\Model\AdminProcessMenu;
use App\Model\AdminSubmenu;
use App\Model\Artist;
use App\Model\ArtistTipModel;
use App\Model\ArtistMag;
use App\Model\Brandjsm;
use App\Model\BrandMagazineModel;
use App\Model\CategoryModel;
use App\Model\Color;
use App\Model\EventModel;
use App\Model\Faq;
use App\Model\Faq_cate;
use App\Model\Langfront;
use App\Model\LangMenu;
use App\Model\LineStoryModel;
use App\Model\NoticeModel;
use App\Model\Product;
use App\Model\ProductDesciptionModel;
use App\Model\ProductDetailModel;
use App\Model\ProductModel;
use App\Model\Qa\QaanswersModel;
use App\Model\Qa\QacateModel;
use App\Model\Qa\QarelatModel;
use App\Model\Qa\QatopicModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product_Details;
use App\Model\OptionModel;
use App\CoreFunction\Datatable;
use Yajra\DataTables\DataTables;
use App\Model\Review;
use App\Model\FindStoreModel;
use App\Model\FindStore_cate;



class TestdataController extends Controller
{
    public function index(Request $request)
    {
/*
        $msg = "";
        $headers = $request->header();
        \Log::info($headers);
        if(array_key_exists('atoken', $headers)){
            $data = "yellowidea";
            $encryptSha = hash('sha256', $data);
            if($headers['atoken'][0] == 'yellowidea'){
                // $msg = "ข้อมูลการ Authen ถูกต้อง";
            }else{
                $msg = "ข้อมูลการ Authen ไม่ถูกต้อง";
                return response()->json([
                    'code_return' => 88,
                    'msg' => $msg,
                ]);
            }
        }else{
            $msg = "ไม่พบข้อมูล Authen";
            return response()->json([
                'code_return' => 99,
                'msg' => $msg,
            ]);
        }

*/
/*
        $department = Datatable::listdata($request);

        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
*/

/*
        $head = AdminHeadMenu::where('is_active', 'Y')->get();
        foreach ($head as $key => $menuheads) {
            $data[$key]['id'] = $menuheads->id;
            $data[$key]['name_en'] = $menuheads->name_en;
            $data[$key]['name_th'] = $menuheads->name_th;

            $data[$key]['main_process'] = [];
            $productCategories = $menuheads->main_process;
            foreach ($productCategories as $index => $proces) {
                $process_main = $proces->main_me;
                foreach ($process_main as $main) {
                    $data[$key]['main_process'][$index]['id'] = $main->id;
                    $data[$key]['main_process'][$index]['name_en'] = $main->name_en;
                    $data[$key]['main_process'][$index]['name_th'] = $main->name_th;
                    $data[$key]['main_process'][$index]['collapse'] = $main->collapse;
                    $data[$key]['main_process'][$index]['icon'] = $main->icon;
                    $data[$key]['main_process'][$index]['uri'] = $main->uri;
                    $data[$key]['main_process'][$index]['submenu'] = AdminSubmenu::where('sub_id',$main->id)->orderBy('sort_id', 'asc')->get();
                }
            }
        }
*/

$listitem = FindStoreModel::get();
$category = Brandjsm::get();


// foreach ($category as $key => $profilling) {
//     $data['type'][$key]['name'] = $profilling->name_en;
//     $data['type'][$key]['sorting'] = $profilling->sorting;
//     $data['type'][$key]['item'] = $profilling->Findst->chunk(4);

// }
        return response()->json($category);
    }

    public function store(Request $request)
    {
        /*
                $msg = "";
                $headers = $request->header();
                \Log::info($headers);
                if(array_key_exists('atoken', $headers)){
                    $data = "yellowidea";
                    $encryptSha = hash('sha256', $data);
                    if($headers['atoken'][0] == 'yellowidea'){
                        // $msg = "ข้อมูลการ Authen ถูกต้อง";
                    }else{
                        $msg = "ข้อมูลการ Authen ไม่ถูกต้อง";
                        return response()->json([
                            'code_return' => 88,
                            'msg' => $msg,
                        ]);
                    }
                }else{
                    $msg = "ไม่พบข้อมูล Authen";
                    return response()->json([
                        'code_return' => 99,
                        'msg' => $msg,
                    ]);
                }
                $productdetail = ProductDetailModel::all();
        */
        $department = Datatable::listdata($request);

        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
        // return response()->json($productdetail);
    }
}
