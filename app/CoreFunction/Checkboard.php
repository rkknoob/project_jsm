<?php

namespace App\CoreFunction;

use App\Model\Qa\QatopicModel;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

class Checkboard extends Model
{
    public static function check($id,$topic)
    {
        $top = QatopicModel::findOrFail($topic);
        $test = $top->user_id;
        $t = Auth::user()->id;

        if($test === $t){
            return true;
        }else {
            return false;
        }

    }
}
