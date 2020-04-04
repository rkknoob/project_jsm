<?php

use App\Model\AdminHeadMenu;
use App\Model\ProductModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MenugroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_menu_head')->delete();

        $json = File::get("database/menugroup.json");
        $data = json_decode($json);


        foreach ($data as $obj) {
            AdminHeadMenu::create(array(
                'id' => $obj->id,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'is_active' => $obj->is_active,
                'menu_id' => $obj->menu_id,
                'sort_id' => $obj->sort_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
