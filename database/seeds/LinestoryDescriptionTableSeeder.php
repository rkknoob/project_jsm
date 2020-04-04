<?php

use Illuminate\Database\Seeder;

use App\Model\LineStoryDesciptionModel;
use Carbon\Carbon;

class LinestoryDescriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('linestory_description')->delete();



        $json = File::get("database/LineStoryDetail.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            LineStoryDesciptionModel::create(array(
                'id' => $obj->id,
                'seq' => $obj->seq,
                'linestory_id' => $obj->linestory_id,
                'detail_type' => $obj->detail_type,
                'img_en' => $obj->img_en,
                'img_th' => $obj->img_th,
                'is_active' => 'Y',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }

    }
}
