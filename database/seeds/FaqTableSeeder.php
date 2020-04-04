<?php

use App\Model\Faq;
use App\Model\FindStoreModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq')->delete();


        $json = File::get("database/faq.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Faq::create(array(
                'id' => $obj->id,
                'subject' => $obj->subject,
                'question' => $obj->question,
                'type' => $obj->type,
                'is_active' => $obj->is_active,
                'answer' => $obj->answer,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
