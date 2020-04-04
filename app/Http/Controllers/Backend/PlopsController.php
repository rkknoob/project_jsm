<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CoreFunction\Product;
use App\Models\ProductImage;
use App\Model\FindStoreModel;
use App\Model\FindStore_cate;
use App\CoreFunction\Datatable;
use Yajra\DataTables\DataTables;
use Log;
use DB;

use Validator;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;

class PlopsController extends Controller
{
    //
    public function index()
    {
        return view('backend.FindStore.index_plops');
    }

    public function getDatatable(Request $request)
    {
        $department = Datatable::listplops($request);

        return DataTables::of($department)
            ->setRowClass(function ($department) {
                return $department->is_active ? '' : 'alert-danger';
            })
            ->make(true);
    }

    public function create()
    {
        $datas['faq_ate'] = FindStore_cate::all();
        $datas['status'] = 'add';


        return view('backend.FindStore.formcate')->with($datas);
    }

    public function edit($id)
    {
        $datas['faq'] = FindStore_cate::findorfail($id);
        $datas['status'] = 'edit';

        return view('backend.FindStore.formcate')->with($datas);
    }


    public function store(Request $request)
    {
        \Log::info($request->all());
        $item_review = FindStore_cate::create($request->all());
        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
        ]);
    }

    public function update(Request $request, $id)
    {
        \Log::info($request->all());
        $item_faq = FindStore_cate::find($id);
        $item_faq->update($request->all());

        $result = FindStoreModel::where('type', $id)->update([
            "is_active" => "Y",
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
        ]);
    }

    public function destroy($id)
    {
        $result = FindStore_cate::where('id', $id)->update([
            "is_active" => "N",
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        $result = FindStoreModel::where('type', $id)->update([
            "is_active" => "N",
            'updated_at' => date('y-m-d H:i:s'),
        ]);


    
        return response()->json([
            'msg_return' => 'บันทึกสำเร็จ',
            'code' => 200,
        ]);
    }
}
