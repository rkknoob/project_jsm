<?php

use App\Model\BrandMagazineModel;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Brand_magazineTableDataSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brand_magazine')->delete();


//////////////////////////////////////s
        $json = File::get("database/brandjsm.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            BrandMagazineModel::create(array(
                'id' => $obj->id,
                'img_banner' => $obj->img_banner,
                'topic_name' => $obj->topic_name,
                'is_active' => 'Y',
                'type' => $obj->type,
                'link_video' => $obj->link_video,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}

