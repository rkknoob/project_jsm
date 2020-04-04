<?php

use Illuminate\Database\Seeder;
use App\Model\LineStoryModel;
use Carbon\Carbon;

class LinestoryTableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('linestory')->delete();



        $json = File::get("database/LineStory.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            LineStoryModel::create(array(
                'id' => $obj->id,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'banner_en' => $obj->banner_en,
                'banner_th' => $obj->banner_th,
                'detail_en' => $obj->detail_en,
                'detail_th' => $obj->detail_th,
                'is_active' => 'Y',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }

    }
}
