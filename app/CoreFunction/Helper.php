<?php

namespace App\CoreFunction;

use App\Model\AdminHeadMenu;
use App\Model\AdminMenu;
use App\Model\AdminProcessMenu;
use App\Model\AdminSubmenu;
use App\Model\Langfront;
use Illuminate\Database\Eloquent\Model;
use App;
use App\Menu;
use App\Model\LangMenu;




class Helper extends Model
{
    public static  function menumain () {

        $head = AdminHeadMenu::where('is_active', 'Y')->orderby('sort_id', 'asc')->get();
        foreach ($head as $key => $menuheads) {
            $data[$key]['id'] = $menuheads->id;
            $data[$key]['name_en'] = $menuheads->name_en;
            $data[$key]['name_th'] = $menuheads->name_th;
            $data[$key]['main_process'] = [];
            $productCategories = $menuheads->main_process;

            foreach ($productCategories as $index => $proces) {

                $process_main = $proces->main_me->where('show', 'Y');

                foreach ($process_main as $main) {
                    $data[$key]['main_process'][$index]['id'] = $main->id;
                    $data[$key]['main_process'][$index]['name_en'] = $main->name_en;
                    $data[$key]['main_process'][$index]['name_th'] = $main->name_th;
                    $data[$key]['main_process'][$index]['collapse'] = $main->collapse;
                    $data[$key]['main_process'][$index]['icon'] = $main->icon;
                    $data[$key]['main_process'][$index]['uri'] = $main->uri;
                    $data[$key]['main_process'][$index]['sort_id'] = $main->sort_id;
                    $data[$key]['main_process'][$index]['submenu'] = AdminSubmenu::where('sub_id',$main->id)->where('show','Y')->orderBy('sort_id', 'asc')->get();
                }
            }
        }

        /////เทสส

        return $data;
    }

    public static  function language () {

        $locale = session()->get('locale');
        $lean = 'en';
        if($locale == null){
        App::setLocale($lean);
        session()->put('locale', $lean);
        }

        return $locale;
    }

    public static  function menufront () {
        $collection = App\Menu::where('sort','1')->get();
        foreach ($collection as $key => $collections) {
            $datas[$key]['id'] = $collections->id;
            $datas[$key]['name_en'] = $collections->name_en;
            $datas[$key]['name_th'] = $collections->name_th;
            $datas[$key]['parent_id'] = $collections->parent_id;
            $datas[$key]['uri'] = $collections->uri;
            $datas[$key]['sub_menu'] = [];
            $test = App\Menu::where('parent_id', $collections->parent_id)->where('sort','!=','1')->orderby('sort','asc')->get();
            foreach ($test as $index => $tests) {
                $datas[$key]['sub_menu'][$index]['id'] = $tests->id;
                $datas[$key]['sub_menu'][$index]['parent_id'] = $tests->parent_id;
                $datas[$key]['sub_menu'][$index]['name_en'] = $tests->name_en;
                $datas[$key]['sub_menu'][$index]['name_th'] = $tests->name_th;
                $datas[$key]['sub_menu'][$index]['uri'] = $tests->uri;

            }
        }
        //แบบนี้ผิด คิดไม่ออก

        return $datas;
    }

    public static  function subjectmenu ($uri) {
        $item = LangMenu::where('url',$uri)->first();
        $menus = Langfront::find($item->lang_id);
        return $menus;
    }


    public static  function subjectmenucheck ($uri) {

        $urlexplode = (explode("/",$uri));
        $firstexl = $urlexplode[0];

        $item = LangMenu::where('url',$firstexl)->first();
        $menus = Langfront::find($item->lang_id);

        return $menus;
    }



}
