<?php

namespace App\Http\Controllers\Backend\Artist;

use App\CoreFunction\Datatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;

class listdataController extends Controller
{
    public function listdata(Request $request)
    {
        \Log::info($request);

        /*
        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
*/
    }
}
