@extends('backend.layouts.content')

@section('content')
    <style>
        .btn-icon-split .icon {
            padding-top: 5%;
        }
        .table th {
            padding: .5rem;
        }
        .center{
            text-align:center;
        }
        .btn-delete:hover{
            color: #fff;
        }
        .btn-edit:hover{
            color: #fff!important;
        }
        a{
            text-decoration:none;
        }
        .current{
            background: transparent!important;
        }
        .dataTable{
            margin-bottom: 1.5%!important;
        }


    </style>

    <div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Manage List Sku</h1>

        <!-- DataTales Example -->
        <div class="card shadow col-md-12" style="margin-bottom: 8%;">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-8">
                    <form name="myForm" action="#" id="skuForm" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group row">
                            <label for="category" class="col-2" style="margin-top: .5rem;"><B>Category : </B></label>
                            <select class="form-control idcategory col-10" name="idcategory" id="idcategory" >
                                    <option value="">--- Choose A Category ---</option>
                                @foreach($itemCategory as $category)
                                    <option value="{{$category->id}}"> {{$category->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-2" style="margin-top: .5rem;"><B>Product : </B></label>
                            <select class="form-control col-10 idproduct" name="idproduct" id="idproduct">
                                    <option value="">--- Choose A Product ---</option>
                                @foreach($itemProduct as $product)
                                    <option value="{{$product->id}}"> {{$product->name_en}} </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    </div>

                    <div class="col-md-4" style="text-align:right;">
                        <a href="{{ url('cms/sku/add') }}" class="btn btn-success">
                            Add Sku
                        </a>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable"  class="display" width="100%" cellspacing="0">
                        <thead>
                            <tr class="center">
                                <th>Id</th>
                                <th>Code Sku</th>
                                <th >Name Sku</th>
                                <th style="width:150px">Picture</th>
                                <th>Status</th>
                                <th style="width:130px">Action</th>
                            </tr>
                        </thead>

                        <tbody id="tBody">

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>



    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


    <script type="text/javascript">

        var searchData = {};

        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,

            ajax: {
                url:  "{!! route('sku.data') !!}",
                method: 'POST',
                data: RefreshTable,
            },
            columns: [
                {data: 'id'},
                {data: 'sku'},
                {data: 'name_en'},
                {data: 'img_product'},
                {data: 'is_active', name: 'is_active', orderable:false, serachable:false},
                {data: 'action', name: 'action', orderable:false, serachable:false}
            ],catch (Error) {
                if (typeof console != "undefined") {
                    console.log(Error);
                }
            },

            columnDefs: [{
                targets: [0],
                orderable: false,
                searchable: false
            },
                {
                    targets: 3,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        var result = data ? '<img src="/public/colorproduct/' + data + '" alt="' + row.name + '" class="img-fluid rounded mx-auto">' : '';
                        return result;
                    }
                },
                {
                    targets: 4,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        //var result = data ?  '  <center><span class="badge badge-primary badge-pill m-b-5">Active</span></center>' : '<center><span class="badge badge-danger badge-pill m-b-5">Inactive</span></center>';
                        //var result = '<input checked data-toggle="toggle" data-onstyle="success" type="checkbox" id="toggle-one"  class="toggle-class">';
                        //return result;
                        // var result = data ? '<input checked data-toggle="toggle" data-onstyle="success" type="checkbox" id="toggle-one" onclick="myfunction()">' : '';
                        if(row.is_active == 'Y'){
                            var result = data ?  '  <center><span class="badge badge-primary badge-pill m-b-5">Active</span></center>' : '<center><span class="badge badge-danger badge-pill m-b-5">Active</span></center>';
                            return result;

                        }else{
                            var result = data ?  '  <center><span class="badge badge-danger badge-pill m-b-5">Inactive</span></center>' : '<center><span class="badge badge-danger badge-pill m-b-5">Inactive</span></center>';
                            return result;
                        }
                    }
                },
                {
                    targets: 5,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        var dataName = row.name_en;
                        var dataid = row.id;
                        //var btnDetail = '<a role="button"  href="products/sku/' + dataid +'" class="btn btn-outline-primary btn-sm"><i class="fa fa-server"></i> Detail</a> ';
                        var btnEdit = '<a role="button"  href="sku/edit/' + dataid +'" class="btn btn-outline-dark btn-sm btn-edit"><i class="fa fa-edit"></i> Edit</a> ';
                        var btnDelete = '<a href="#" data-href="/sku/' + data + '" data-name="' + dataName + '"  data-id="' + dataid + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> Delete</a>';
                        return btnEdit + btnDelete;


                    }
                },
            ]
        });


        function RefreshTable(data) {

            data._token = "{{ csrf_token() }}";
            data.categorie_id = $('select[name=idcategory]').val();
            data.product_id = $('select[name=idproduct]').val();

            return data;

        }

        function reloadData() {

            table.ajax.reload(null, false);
        }

        $('select').on('change', function() {
            searchData.categorie_id = $('select[name=idcategory]').val();
            searchData.product_id = $('select[name=idproduct]').val();

            //console.log(searchData.categorie_id,searchData.product_id);
            table.ajax.reload();

        });

        $('.idcategory').change(function(){
            if($(this).val !='' ){
                var select = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "/cms/sku/fetch",
                    method: "POST",
                    data: {select:select,_token:_token},
                    success:function(data){
                     // console.log(data.datas)
                        // $("#idproduct").html(data);
                        $('#idproduct').empty();
                        $('#idproduct').append('<option value=""> All</option>');
                        $.each(data.datas, function(i, item) {
                            $('#idproduct').append('<option value="'+ item.id +'">'+ item.name_en +'</option>');
                        })
                    }
                })
            }
        });


        $('body').on('click', '.btn-delete', function (e) {
            e.preventDefault();

            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            deleteConf(id, name);
        });

        function del(id) {
            console.log('del');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            swal({
                title: 'Are you sure?',
                text: "It will permanently deleted !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function() {
                swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );
            }),
            $.ajax({
                dataType: 'json',
                type:'DELETE',
                data:{id:id},
                url: '/cms/sku/' + id,

                success: function(datas){

                    swal({
                        type: datas.type,
                        title: datas.title
                    });
                    table.ajax.reload();
                }

            })
        }

        function validateForm(){

            var x = confirm("Are you sure you want to delete?");
            if (x) {
                return true;
            }
            else {

                event.preventDefault();
                return false;
            }
        }

        function deleteConf(id, name) {
            console.log('deleteConf');
            swal({
                title: "Are you sure?",
                text: name,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, archive it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        dataType: 'json',
                        type:'DELETE',
                        data:{id:id},
                        url: '/cms/sku/' + id,

                        success: function(datas){
                            swal("Good job!", "You clicked the button!", "success");
                            table.ajax.reload();
                        }

                    })

                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        } // error form show text








    </script>


@endsection
