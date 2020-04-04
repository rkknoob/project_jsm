<?php

use App\Model\Qa\QaanswersModel;
use App\Model\Qa\QarelatModel;
use App\Model\Qa\QatopicModel;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QatopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers_qa')->delete();
        DB::table('qarelat')->delete();
        DB::table('topic_qa')->delete();


        $jsonre = File::get("database/qarel.json");
        $datare = json_decode($jsonre);

        $jsontop = File::get("database/qatop.json");
        $datatop = json_decode($jsontop);

        $jsonans = File::get("database/qaans.json");
        $dataans = json_decode($jsonans);


        foreach ($datare as $obj) {
            QarelatModel::create(array(
                'id' => $obj->id,
                'user_admin' => $obj->user_admin,
                'topic_id' => $obj->topic_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }


        foreach ($datatop as $objtop) {
            QatopicModel::create(array(
                'id' => $objtop->id,
                'title' => $objtop->title,
                'type' => $objtop->type,
                'content' => $objtop->content,
                'code' => $objtop->code,
                'hit' => $objtop->hit,
                'status' => $objtop->status,
                'user_id' => $objtop->user_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }


        foreach ($dataans as $objans) {
            QaanswersModel::create(array(
                'id' => $objans->id,
                'qa_id' => $objans->qa_id,
                'details' => $objans->details,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }


    }
}
