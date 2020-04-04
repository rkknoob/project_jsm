<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AdminModel;

class ResetPasswordController extends Controller
{
    //
    public function index()
    {
        return view('backend/Auth/resetpassword');
    }

    public function store(Request $request)
    {
        \Log::info("cms");
        ///1 เช็ค อีเมลว่ามีไหม//
        $user = AdminModel::where('email', $request->email)->first();

        if (isset($user) && $user->email != '' && $user->email != null) {

            $bytes = openssl_random_pseudo_bytes(16 * 2);
            $new_token = substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, 16);
            $new_token .= '_' . base64_encode(date('Y-m-d H:i:s'));
            \Log::info($bytes);
            \Log::info($new_token);

            $update = array(
                'reset_password_token' => $new_token,
            );
            AdminModel::where('id', $user->id)->update($update);

            $data = array(
                'email' => $user->email,
                'name' => $user->fname . ' ' . $user->lname,
                'gen_token' => $new_token,
            );

            \Log::info($data['email']);
            \Mail::send('backend.Email.form_reset_password', $data, function ($message) use ($data) {
                $message->from(env('MAIL_USERNAME'), 'Project JSM');
                $message->to($data['email'], '')->subject('คำขอรีเซ็ตรหัสผ่าน');
            });

            $return['code'] = 200;
            $return['content'] = 'สำเร็จ กรุณาตรวจสอบที่อีเมลของท่านภายใน 24 ชั่วโมง';

        } else {
            $return['code'] = 501;
            $return['content'] = 'ไม่สำเร็จ กรุณาตรวจสอบอีเมลของท่านอีกครั้ง';
        }

        $return['title'] = 'ลืมรหัสผ่าน';
        return $return;
    }

    public function newreset(Request $request)
    {
        $uri = $request->path();
        $urlexplode = (explode("/", $uri));
        $user = AdminModel::where('reset_password_token', $urlexplode[2])->first();
    
        $data = [
            'user' => $user,
        ];
        return view('backend/Auth/newpassword')->with($data);

    }

    public function update(Request $request, $id)
    {

        \Log::info("Update");
        \DB::beginTransaction();
        try {
            $item = AdminModel::where('id', $request->id)->first();
            $password = bcrypt($request->password);
            $item = AdminModel::where('id', $request->id)->update([
                "password" => $password,
                'updated_at' => date('y-m-d H:i:s'),
            ]);
            \DB::commit();

            return response()->json([
                'msg_return' => 'บันทึกสำเร็จ',
                'code_return' => 200,
            ]);

        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json([
                'msg_return' => 'บันทึกไม่สำเร็จ',
                'code_return' => 500,
            ]);

        }

    }

}