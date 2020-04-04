<?php

namespace App\Http\Controllers\Backend;

use App\CoreFunction\Datatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AdminModel;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    //
    public function __construct()
    {
         $this->middleware('auth:admin');
    }

    public function add()
    {
        $data = [
            'status' => 'add',
        ];

        return view('backend.Admin.form')->with($data);
    }

    public function index()
    {



        return view('backend.Admin.index');
    }

    public function store(Request $request)
    {


        $duplicate = AdminModel::where('email', $request->email)->first();
        if($duplicate){
            return response()->json([
                'msg_return' => 'Email ซ้ำ',
                'code' => 501,
            ]);
        }

        $password = bcrypt($request->password);
        $detailsKeyword = AdminModel::create([
            "fname" => $request->fname,
            "lname" => $request->lname,
            "email" => $request->email,
            "password" => $password,
            "is_active" => $request->is_active,
            "token" => $request->token,
            "created_at" => date('y-m-d H:i:s'),
            "updated_at" => date('y-m-d H:i:s'),

        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
        ]);
    }

    public function edit($id)
    {
        $listitem = AdminModel::where('id',$id)->first();
        $data = [
            'item' => $listitem,
            'status' => 'edit',
        ];

        return view('backend.Admin.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        \Log::info($request->all());
        $item = AdminModel::findOrFail($request->id);
        $duplicate = AdminModel::where('email', $request->email)->first();
        if($duplicate->id==$id){
            $item->update($request->all());
            return response()->json([
                'msg_return' => 'บันทึกสำเร็จ',
                'code' => 200,
            ]);
        }else{
            return response()->json([
                'msg_return' => 'Email ซ้ำ',
                'code' => 501,
            ]);
        }  
  
    }


    public function getDatatable(Request $request)
    {

        $item = Datatable::settinguser($request);
        return DataTables::of($item)
            ->make(true);

    }

}

?>
