<?php

namespace App\Http\Controllers\Backend;

use App\CoreFunction\Datatable;
use App\Model\AdminHeadMenu;
use App\Model\Brandjsm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Log;

class SettingMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.Admin.Settingmenu.menu');
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
        return view('backend/Admin/Settingmenu.menu_main');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menuitem = AdminHeadMenu::findOrFail($id);
        $data = [
            'data_menu' => $menuitem,
            'status' => 'edit',
        ];
        return view('backend/Admin/Settingmenu.form')->with($data);
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

 //$checsort = AdminHeadMenu::where('id',$request->id)->where('sort_id',$request->sort_id)->first();


    if($request->id == 1){
        if($request->is_active == 'N'){

            return response()->json([
                'msg_return' => 'ไม่สามารถบันทึกได้',
                'code' => 500,
            ]);
        }else{
            $data = AdminHeadMenu::find($id);
            $data->update($request->all());
            return response()->json([
                'msg_return' => 'บันทึกสำเร็จ',
                'code' => 200,
            ]);

        }
    }else{
        $data = AdminHeadMenu::find($id);
        $data->update($request->all());
        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
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

    public function getDatatable(Request $request)
    {

        $groupmenu = Datatable::groupmenu($request);

        return DataTables::of($groupmenu)
            ->setRowClass(function ($groupmenu) {
                return $groupmenu->is_active ? '' : 'alert-danger';
            })
            ->make(true);

    }
}
