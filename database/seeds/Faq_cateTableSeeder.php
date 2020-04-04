<?php

use App\Model\Faq_cate;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Faq_cateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq_category')->delete();


        $json = File::get("database/faq_cate.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Faq_cate::create(array(
                'id' => $obj->id,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'is_active' => $obj->is_active,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
