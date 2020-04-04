<?php

use App\Model\Color;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Model\OptionModel;

class ColorTableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option')->delete();



        $json = File::get("database/color.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            OptionModel::create(array(
                'id' => $obj->id,
                'id_product' => $obj->id_product,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'img_color' => $obj->img_color,
                'img_product' => $obj->img_product,
                'is_active' => 'Y',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }



    }
}
