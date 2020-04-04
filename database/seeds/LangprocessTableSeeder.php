<?php

use App\Model\LangMenu;
use App\Model\LineStoryDesciptionModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LangprocessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_lang')->delete();



        $json = File::get("database/menu_lang.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            LangMenu::create(array(
                'id' => $obj->id,
                'menu_id' => $obj->menu_id,
                'lang_id' => $obj->lang_id,
                'url' => $obj->url,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }

    }
}
