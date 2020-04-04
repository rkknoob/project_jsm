<?php

use App\Model\Brandjsm;
use App\Model\BrandJsmModel;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BrandJsmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brandjsm')->delete();

        $json = File::get("database/brandmaz.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Brandjsm::create(array(
                'id' => $obj->id,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'img_en' => $obj->img_en,
                'img_th' => $obj->img_th,
                'type' => $obj->type,
                'detail_th' => $obj->detail_th,
                'detail_en' => $obj->detail_en,
                'is_active' => $obj->is_active,
                'detail_film' => $obj->detail_film,
                'link_video' => $obj->link_video,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }

    }
}
