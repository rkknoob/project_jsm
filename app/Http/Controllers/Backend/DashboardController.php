<?php

namespace App\Http\Controllers\Backend;

use App\Model\AdminHeadMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\AdminMenu;

class DashboardController extends Controller
{
    //




    public function index()
    {



        return view('backend.Dashboard.index');
    }
}

?>
