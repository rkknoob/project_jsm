<?php

use App\Model\Product;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Model\ProductModel;

class ProductTableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();

        $json = File::get("database/product.json");
        $data = json_decode($json);


        foreach ($data as $obj) {
            ProductModel::create(array(
                'id' => $obj->id,
                'sku' => $obj->sku,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'img_color' => $obj->img_color,
                'img_product' => $obj->img_product,
                'product_details_id' => $obj->product_details_id,
                'stock' => '10',
                'is_active' => 'Y',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
