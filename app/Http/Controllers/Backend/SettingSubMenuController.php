<?php

namespace App\Http\Controllers\Backend;

use App\CoreFunction\Datatable;
use App\Model\AdminMenu;
use App\Model\AdminSubmenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class SettingSubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend/Admin/Settingmenu.menu_sub');
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
        //
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
        $datas['main_menu'] = AdminMenu::all();
        $datas['sub_menu'] = AdminSubmenu::find($id);
        $datas['status'] = 'edit';
        return view('backend/Admin/Settingmenu.form_submain')->with($datas);
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

        \Log::info($request->all());
        $data = AdminSubmenu::find($id);
        $data->update($request->all());
        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
        ]);
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
    public function getDatatable(Request $request)
    {

        $submenu = Datatable::submenu($request);

        return DataTables::of($submenu)
            ->setRowClass(function ($submenu) {
                return $submenu->show ? '' : 'alert-danger';
            })
            ->make(true);

    }
}
