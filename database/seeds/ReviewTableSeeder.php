<?php
use App\Model\Review;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('review')->delete();
        $json = File::get("database/review.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Review::create(array(
                'id' => $obj->id,
                'title' => $obj->title,
                'product_id' => $obj->product_id,
                'user_id' => $obj->user_id,
                'score' => $obj->score,
                'content' => $obj->content,
                'status' => $obj->status,
                'hit' => $obj->hit,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
