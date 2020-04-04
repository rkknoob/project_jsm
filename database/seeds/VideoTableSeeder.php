<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Model\VideoModel;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('video')->delete();

        $json = File::get("database/video.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            VideoModel::create(array(
                'id' => $obj->id,
                'type' => $obj->type,
                'name_en' => $obj->name_en,
                'link_video' => $obj->link_video,
                'is_active' => $obj->is_active,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));

            
        }
    }
}
