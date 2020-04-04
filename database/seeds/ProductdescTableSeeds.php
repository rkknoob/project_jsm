<?php

use App\Model\ProductDesciptionModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductdescTableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_description')->delete();

        $json = File::get("database/productdes.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            ProductDesciptionModel::create(array(
                'id' => $obj->id,
                'seq' => $obj->seq,
                'product_id' => $obj->product_id,
                'detail_type' => null,
                'img_en' => $obj->img_en,
                'img_th' => $obj->img_th,
                'is_active' => $obj->is_active,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }

    }
}
