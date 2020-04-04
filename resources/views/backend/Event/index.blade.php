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
        <h1 class="h3 mb-4 text-gray-800">Manage List Events</h1>

        <!-- DataTales Example -->
        <div class="card shadow col-md-12" style="margin-bottom: 8%;">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12" style="text-align:right; margin: 0 0 2% 0;">
                        <a href="{{ url('cms/event/add') }}" class="btn btn-success">
                            Add Event
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable"  class="display" width="100%" cellspacing="0">
                        <thead>
                            <tr class="center">
                                <th>Id</th>
                                <th>Name</th>
                                <th style="width:250px">Picture</th>
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
                url:  "{!! route('event.data') !!}",
                method: 'POST',
                data: RefreshTable,
            },
            columns: [
                {data: 'id'},
                {data: 'topic_en'},
                {data: 'banner2'},
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
                    targets: 2,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        var result = data ? '<img src="/public/event/' + data + '" alt="' + row.name + '" class="img-fluid rounded mx-auto">' : '';
                        return result;
                    }
                },
                {
                    targets: 3,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
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
                    targets: 4,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        var dataName = row.topic_en;
                        var dataid = row.id;
                        var btnEdit = '<a role="button"  href="event/edit/' + dataid +'" class="btn btn-outline-dark btn-sm btn-edit"><i class="fa fa-edit"></i> Edit</a> ';
                        var btnDelete = '<a href="#" data-href="/event/' + data + '" data-name="' + dataName + '"  data-id="' + dataid + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> Delete</a>';
                        return btnEdit + btnDelete;
                    }
                },
            ]
        });

        function RefreshTable(data) {

            data._token = "{{ csrf_token() }}";
            //data.categorie_id = $('select[name=idcategory]').val();
            //data.product_id = $('select[name=idproduct]').val();
            return data;

        }

        function reloadData() {

            table.ajax.reload(null, false);
        }

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
                url: '/cms/event/' + id,

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
                        url: '/cms/event/' + id,

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
