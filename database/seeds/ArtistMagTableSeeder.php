<?php

use App\Model\ArtistTipModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class ArtistMagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artist_tip')->delete();

        $json = File::get("database/ArtistTip.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            ArtistTipModel::create(array(
                'id' => $obj->id,
                'title_en' => $obj->title_en,
                'title_th' => $obj->title_th,
                'img_banner' => $obj->img_banner,
                'detail_en' => $obj->detail_en,
                'detail_th' => $obj->detail_th,
                'is_active' => $obj->is_active,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));


        }
    }
}
