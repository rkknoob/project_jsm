<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Mail;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend/resetpassword');
    }

    public function newreset(Request $request)
    {
        $uri = $request->path();
        $urlexplode = (explode("/", $uri));
        $user = User::where('reset_password_token', $urlexplode[1])->first();
        $data = [
            'user' => $user,
        ];
        return view('frontend/newpassword')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        ///1 เช็ค อีเมลว่ามีไหม//
        $user = User::where('email', $request->email)->first();


        if (isset($user) && $user->email != '' && $user->email != null) {

            $bytes = openssl_random_pseudo_bytes(16 * 2);
            $new_token = substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, 16);
            $new_token .= '_' . base64_encode(date('Y-m-d H:i:s'));
            \Log::info($bytes);
            \Log::info($new_token);

            $update = array(
                'reset_password_token' => $new_token,
            );
            User::where('id', $user->id)->update($update);

            $data = array(
                'email' => $user->email,
                'name' => $user->fname . ' ' . $user->lname,
                'gen_token' => $new_token,
            );

            \Log::info($data['email']);
            \Mail::send('frontend.Email.form_reset_password', $data, function ($message) use ($data) {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        \DB::beginTransaction();
        try {
            $item = User::where('id', $request->id)->first();
            $password = bcrypt($request->password);
            $item = User::where('id', $request->id)->update([
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
