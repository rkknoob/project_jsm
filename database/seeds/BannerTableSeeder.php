<?php

use Illuminate\Database\Seeder;
use App\Model\BannerModel;

use Carbon\Carbon;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('banner')->delete();

        $json = File::get("database/banner.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            BannerModel::create(array(
                'id' => $obj->id,
                'type' => $obj->type,
                'id_category' => $obj->id_category,
                'id_product' => $obj->id_product,
                'seq' => $obj->seq,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'img_en' => $obj->img_en,
                'img_th' => $obj->img_th,
                'is_active' => $obj->is_active,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));

            
        }
    }
}
