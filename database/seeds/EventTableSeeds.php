<?php

use Illuminate\Database\Seeder;
use App\Model\EventModel;
use Carbon\Carbon;

class EventTableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event')->delete();



        $json = File::get("database/event.json");
        $data = json_decode($json);
        foreach ($data as $obj) {



            EventModel::create(array(
                'id' => $obj->id,
                'event_type' => $obj->event_type,
                'banner1' => $obj->banner1,
                'banner2' => $obj->banner2,
                'topic_en' => $obj->topic_en,
                'topic_th' => $obj->topic_th,
                'detail_en' => $obj->detail_en,
                'detail_th' => $obj->detail_th,
                'is_active' => $obj->is_active,	
                'start_date' => $obj->start_date,
                'end_date' => $obj->end_date,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }



    }
}
