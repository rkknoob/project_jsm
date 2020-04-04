<?php

use App\Model\CategoryModel;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoryTableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->delete();
        $json = File::get("database/category.json");
        $data = json_decode($json);
        foreach ($data as $obj) {

            CategoryModel::create(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'img' => $obj->img,
                'is_active' => $obj->is_active,
                'folder_name' => $obj->folder_name,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }

    }
}
