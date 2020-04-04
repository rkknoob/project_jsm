<?php

namespace App\CoreFunction;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Model\ProductDesciptionModel;


class Product extends Model
{
    public function storeCategorie($request)
    {

    }

    public static function checkimplode($request)
    {

        $checkdata = (explode(",",$request));

        return $checkdata;
    }

    public static function implode($data)
    {
        $check = $data->implode(',');

        return $check;
    }

    public static function cleardes($request)
    {
        $checkdata = (explode(",",$request->file));
/*
        foreach ($checkdata as $p) {
           ProductDesciptionModel::where('img_en',$p)->delete();
            \File::delete(public_path('public/product/'.$p));
        }
*/
        return 1;
        //\Log::info($id);
    }

    public static function storeImage($id)
    {
        ////ยังไม่ได้ใช้
        $checkdata = (explode(",",$id));    ////data file from request
        try {
            foreach ($checkdata as $image) {
                $data = new ProductDesciptionModel();
                $data->product_id = $id;
                $data->img_en = $image;
                $data->is_active = 'Y';
                $data->save();
            }
            return response()->json([
                'msg_return' => 'ok',
                'code_return' => 1,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'msg_return' => 'Contact Admin',
                'code_return' => 99,
            ]);
        }

    }


}
