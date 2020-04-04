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
        <h1 class="h3 mb-4 text-gray-800">Manage List Review</h1>
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow col-md-12" style="margin-bottom: 8%;">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12" style="text-align:right; margin: 0 0 2% 0;">
                        <a href="/cms/review/settingreview/create" class="btn btn-success">
                            Add Review
                        </a>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable"  class="display" width="100%" cellspacing="0">
                        <thead>
                        <tr class="center">
                            <th>No.</th>
                            <th style="width:40px;">Product</th>
                            <th>Title</th>
                            <th>Score</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th style="width:130px;">Action</th>
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
                url:  "{!! route('review.data') !!}",
                method: 'POST',
                data: RefreshTable,

            },
            columns: [
                {data: 'id', name:'id'},
                {data: 'cover_img', name: 'cover_img'},
                {data: 'title', name: 'title'},
                {data: 'score', name: 'score'},
                {data: 'email', name: 'email'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable:false, serachable:false}

            ],
            columnDefs: [{
                targets: [0],
                orderable: false,
                searchable: false
            },
                {
                    targets: 1,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        var result = data ? '<img src="/public/product/' + data + '" alt="' + row.name + '" class="img-fluid rounded mx-auto" height="48px" width="48px">' : '';
                        return result;
                    }
                },{
                        targets: 3,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            console.log(data);
                            if(data == 5){
                                var result = data ?  '<span class="icon">★★★★★</span>' : data;
                            }else if(data == 4){
                                var result = data ?  '<span class="icon">★★★★</span>' : data;
                            }else if(data == 3){
                                var result = data ?  '<span class="icon">★★★</span>' : data;
                            }else if(data == 2){
                                var result = data ?  '<span class="icon">★★</span>' : data;
                            }else{
                                var result = data ?  '<span class="icon">★</span>' : data;
                            }

                            //var result = '<input checked data-toggle="toggle" data-onstyle="success" type="checkbox" id="toggle-one"  class="toggle-class">';
                            return result;
                            // var result = data ? '<input checked data-toggle="toggle" data-onstyle="success" type="checkbox" id="toggle-one" onclick="myfunction()">' : '';

                        }
                    }
                ,{
                    targets: 5,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        //var result = data ?  '  <center><span class="badge badge-primary badge-pill m-b-5">Active</span></center>' : '<center><span class="badge badge-danger badge-pill m-b-5">Inactive</span></center>';
                        //var result = '<input checked data-toggle="toggle" data-onstyle="success" type="checkbox" id="toggle-one"  class="toggle-class">';
                        //return result;
                        // var result = data ? '<input checked data-toggle="toggle" data-onstyle="success" type="checkbox" id="toggle-one" onclick="myfunction()">' : '';
                        if(row.status == 'Y'){
                            var result = data ?  '  <center><span class="badge badge-primary badge-pill m-b-5">Active</span></center>' : '<center><span class="badge badge-danger badge-pill m-b-5">Active</span></center>';
                            return result;

                        }else{
                            var result = data ?  '  <center><span class="badge badge-danger badge-pill m-b-5">Inactive</span></center>' : '<center><span class="badge badge-danger badge-pill m-b-5">Inactive</span></center>';
                            return result;

                        }
                    }
                },
                {
                targets: 6,
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    var dataName = row.title;
                    var dataid = row.id;
                    var btnEdit = '<a role="button"  href="/cms/review/settingreview/' + dataid +'/edit" class="btn btn-outline-dark btn-sm btn-edit"><i class="fa fa-edit"></i> Edit</a> ';
                    var btnDelete = '<a href="#" data-href="/' + data + '" data-name="' + dataName + '"  data-id="' + dataid + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> Delete</a>';
                    return btnEdit + btnDelete;

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


        function deleteConf(id,name) {
        
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
                            url: '/cms/review/settingreview/' + id,

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



