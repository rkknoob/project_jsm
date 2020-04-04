<?php

use App\Model\ArtistMag;
use Illuminate\Database\Seeder;
use App\Model\ArtistTipModel;

use Carbon\Carbon;

class ArtistTipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artist_magazine')->delete();

        $json = File::get("database/artist.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            ArtistMag::create(array(
                'id' => $obj->id,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'img_url' => $obj->img_url,
                'img_url_thai' => $obj->img_url_thai,
                'img_size' => $obj->img_size,
                'detail_th' => $obj->detail_th,
                'detail_en' => $obj->detail_en,
                'type' => $obj->type,
                'is_active' => $obj->is_active,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));

        }
    }
}
