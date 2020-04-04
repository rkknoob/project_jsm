<?php

use App\Model\AdminMenu;
use App\Model\ProductModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MenumainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_menu')->delete();

        $json = File::get("database/menumain.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            AdminMenu::create(array(
                'id' => $obj->id,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'icon' => $obj->icon,
                'uri' => $obj->uri,
                'sort_id' => $obj->sort_id,
                'show' => $obj->show,
                'collapse' => $obj->collapse,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
