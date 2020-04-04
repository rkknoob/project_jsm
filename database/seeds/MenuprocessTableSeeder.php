<?php

use App\Model\AdminProcessMenu;
use App\Model\ProductModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MenuprocessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_menu_process')->delete();
        $json = File::get("database/menuprocess.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            AdminProcessMenu::create(array(
                'id' => $obj->id,
                'menu_id' => $obj->menu_id,
                'head_id' => $obj->head_id,
                'submenu_id' => $obj->submenu_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
