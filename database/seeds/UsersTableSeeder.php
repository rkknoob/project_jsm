<?php

use App\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $json = File::get("database/users.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            User::create(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'email' => $obj->email,
                'password' => $obj->password,
                'remember_token' => null,
                'fname' => $obj->fname,
                'lname' => $obj->lname,
                'reset_password_token' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ));
        }
    }
}
