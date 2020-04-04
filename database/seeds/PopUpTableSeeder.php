<?php

use Illuminate\Database\Seeder;
use App\Model\PopupModel;
use Carbon\Carbon;

class PopUpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('popup')->delete();
        $json = File::get("database/popup.json");
        $data = json_decode($json);
        foreach ($data as $obj) {

            PopupModel::create(array(
                'id' => $obj->id,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'img_en' => $obj->img_en,
                'img_th' => $obj->img_th,
                'link' => $obj->link,
                'is_active' => $obj->is_active,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
