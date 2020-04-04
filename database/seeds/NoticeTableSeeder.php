<?php

use App\Model\NoticeModel;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NoticeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notice')->delete();

        $json = File::get("database/notice.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            NoticeModel::create(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'content' => $obj->content,
                'type' => $obj->type,
                'detail' => $obj->detail,
                'hit' => $obj->hit,
                'is_active' => $obj->is_active,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
