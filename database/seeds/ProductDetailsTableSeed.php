<?php

use App\Model\Color;
use App\Model\Product_Details;
use App\Model\ProductDetailModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductDetailsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('product_details')->delete();

        $json = File::get("database/productdetail.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            ProductDetailModel::create(array(
                'id' => $obj->id,
                'name_en' => $obj->name_en,
                'name_th' => $obj->name_th,
                'price' => $obj->price,
                'size' => $obj->size,
                'category_id' => $obj->category_id,
                'cover_img' => $obj->cover_img,
                'detail_th' => $obj->detail_th,
                'detail_en' => $obj->detail_en,
                'cover_zoom' => $obj->cover_zoom,
                'display_type' => $obj->display_type,
                'is_active' => $obj->is_active,
                'is_bestseller' => $obj->is_bestseller,
                'start_time' => $obj->start_time,
                'end_time' => $obj->end_time,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
