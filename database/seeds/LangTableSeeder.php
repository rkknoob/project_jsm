<?php

use App\Model\Langfront;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frontlang')->delete();

        $json = File::get("database/frontlang.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Langfront::create(array(
                'id' => $obj->id,
                'subject_en' => $obj->subject_en,
                'subject_th' => $obj->subject_th,
                'summary_en' => $obj->summary_en,
                'summary_th' => $obj->summary_th,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }

    }
}
