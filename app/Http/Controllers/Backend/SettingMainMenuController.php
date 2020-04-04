<?php

namespace App\Http\Controllers\Backend;

use App\CoreFunction\Datatable;
use App\Model\AdminHeadMenu;
use App\Model\AdminMenu;
use App\Model\AdminProcessMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class SettingMainMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend/Admin/Settingmenu.menu_main');
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
        $datas['group_menu'] = AdminHeadMenu::all();
        $datas['status'] = 'edit';
        $datas['menu_main'] = AdminMenu::find($id);
        $datas['menu_process'] = AdminProcessMenu::where('menu_id',$datas['menu_main']->id)->first();
        
        return view('backend/Admin/Settingmenu.form_main')->with($datas);
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

        $data = AdminMenu::find($id);
        $data->update($request->all());
        $dataprocess = AdminProcessMenu::where('menu_id',$id)->first();
        if($dataprocess){
            $dataprocess->update(['head_id' => $request->head_id]);
        }


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

        $groupmenu = Datatable::mainmenu($request);

        return DataTables::of($groupmenu)
            ->setRowClass(function ($groupmenu) {
                return $groupmenu->show ? '' : 'alert-danger';
            })
            ->make(true);

    }
}
