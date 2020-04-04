<?php

use App\Model\AdminSubmenu;
use App\Model\ProductModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MenusubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_submenu')->delete();

        $json = File::get("database/menusub.json");
        $data = json_decode($json);


        foreach ($data as $obj) {
            AdminSubmenu::create(array(
                'id' => $obj->id,
                'sub_id' => $obj->sub_id,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'icon' => $obj->icon,
                'uri' => $obj->uri,
                'sort_id' => $obj->sort_id,
                'show' => $obj->show,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
