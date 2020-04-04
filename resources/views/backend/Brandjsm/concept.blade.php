@extends('backend.layouts.content')

@section('content')

    <style>
        .btn-icon-split .icon {
            padding-top: 5%;
        }
        .center{
            text-align:center;
        }
        .btn-delete{
            color:  #e74a3b!important;
        }
        .btn-delete:hover{
            color:  #fff!important;
        }

    </style>

    <div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Manage List Concept </h1>
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow col-md-12" style="margin-bottom: 8%;">
            <div class="card-body">

                <div class="row">
                    <!-- <div class="col-md-12" style="text-align:right; margin: 0 0 2% 0;">
                        <a href="{!! route('backend.Brandjsm.form') !!}" class="btn btn-success">
                            Add Artist
                        </a>
                    </div> -->
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable"  class="display" width="100%" cellspacing="0">
                        <thead>
                        <tr class="center">
                            <th>Id</th>
                            <th>Name En</th>
                            <th>Name Th</th>
                            <th>Type</th>
                            <th>Is Active</th>
                            <th style="width:50px">Action</th>
                        </tr>
                        </thead>

                        <tbody id="tBody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">

        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url:  "{!! route('brandconcept.data') !!}",
                method: 'POST',
                data: RefreshTable,

            },
            columns: [
                {data: 'id', name:'id'},
                {data: 'name_en', name: 'name_en'},
                {data: 'name_th', name: 'name_th'},
                {data: 'type', name: 'type'},
                {data: 'is_active', name: 'is_active'},
                {data: 'action', name: 'action', orderable:false, serachable:false}

            ],
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
                        var result = data ?  '  <center><span class="badge badge-primary badge-pill m-b-5">Concept</span></center>' : '<center><span class="badge badge-danger badge-pill m-b-5">Concept</span></center>';
                        return result;
                        //var result = '<input checked data-toggle="toggle" data-onstyle="success" type="checkbox" id="toggle-one"  class="toggle-class">';

                        // var result = data ? '<input checked data-toggle="toggle" data-onstyle="success" type="checkbox" id="toggle-one" onclick="myfunction()">' : '';

                    }
                },{
                    targets: 4,
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
                        //var result = '<input checked data-toggle="toggle" data-onstyle="success" type="checkbox" id="toggle-one"  class="toggle-class">';

                        // var result = data ? '<input checked data-toggle="toggle" data-onstyle="success" type="checkbox" id="toggle-one" onclick="myfunction()">' : '';

                    }
                },
                {
                    targets: 5,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        var dataName = row.name;
                        var dataid = row.id;
                        var btnEdit = '<a role="button"  href="concept/' + dataid +'" class="btn btn-outline-dark btn-sm btn-edit"><i class="fa fa-edit"></i> Edit</a> ';
                        return btnEdit;

                    }
                },
            ]
        });

        function RefreshTable(data) {

            data._token = "{{ csrf_token() }}";


            return data;

        }

        $('body').on('click', '.btn-delete', function (e) {
            e.preventDefault();

            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');

            deleteConf(id, name);
        });


        $('body').on('click', '.btn-delete', function (e) {
            e.preventDefault();

            var id = $(this).attr('data-id');

            deleteConf(id);
        });

        function deleteConf(id) {

            swal({
                    title: "Are you sure?",
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
                            url: '/cms/brandjsm/brandcontent/' + id,

                            success: function(datas){
                                swal("Good job!", "You clicked the button!", "success");
                                reloadData();
                            }
                        })

                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
        } // error form show text

        function reloadData() {

            table.ajax.reload(null, false);
        }








    </script>


@endsection



