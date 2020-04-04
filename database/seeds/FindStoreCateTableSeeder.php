<?php

use App\Model\FindStore_cate;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FindStoreCateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('store_category')->delete();


        $json = File::get("database/store_category.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            FindStore_cate::create(array(
                'id' => $obj->id,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'is_active' => $obj->is_active,
                'sorting' => $obj->sorting,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
