<?php

use App\Menu;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->delete();

        $json = File::get("database/menu.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Menu::create(array(
                'id' => $obj->id,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'parent_id' => $obj->parent_id,
                'uri' => $obj->uri,
                'sort' => $obj->sort,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
