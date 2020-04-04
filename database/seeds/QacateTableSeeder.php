<?php

use App\Model\Qa\QacateModel;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QacateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cate_qa')->delete();

        $json = File::get("database/qacate.json");
        $data = json_decode($json);


        foreach ($data as $obj) {
            QacateModel::create(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
