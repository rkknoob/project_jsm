<?php

use App\Model\AdminModel;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->delete();

        $json = File::get("database/admin.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            AdminModel::create(array(
                'id' => $obj->id,
                'fname' => $obj->fname,
                'lname' => $obj->lname,
                'email' => $obj->email,
                'password' => $obj->password,
                'phone' => $obj->phone,
                'role' => $obj->role,
                'token' => $obj->token,
                'is_active' => $obj->is_active,
                'reset_password_token' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }

}
