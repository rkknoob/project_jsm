<?php

use Illuminate\Database\Seeder;
use App\Model\FindStoreModel;
use Carbon\Carbon;

class FindStoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('finestore')->delete();



        $json = File::get("database/FindStore.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            FindStoreModel::create(array(
                'id' => $obj->id,
                'type' => $obj->type,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'detail_en' => $obj->detail_en,
                'detail_th' => $obj->detail_th,
                'img1' => $obj->img1,
                'img2' => $obj->img2,
                'address' => $obj->address,
                'tel' => $obj->tel,
                'map'=> $obj->map,
                'is_active' => 'Y',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }

    }
}
