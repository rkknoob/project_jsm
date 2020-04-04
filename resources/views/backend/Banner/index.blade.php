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
        <h1 class="h3 mb-4 text-gray-800">List Banner Jsm Index</h1>
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow col-md-12" style="margin-bottom: 8%;">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12" style="text-align:right; margin: 0 0 2% 0;">
                        <a href="{{ url('cms/banner/add') }}" class="btn btn-success">
                            Add Banner Index
                        </a>
                    </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable"  class="display" width="100%" cellspacing="0">
                        <thead>
                        <tr class="center">
                            <th>Id</th>
                            <th style="width:90px">seq</th>
                            <th>Name</th>
                            <th style="width:250px">Picture</th>
                            <th>Status</th>
                            <th style="width:170px">Action</th>
                        </tr>
                        </thead>

                        <tbody id="tBody">
                        @foreach($item as $k => $rs)
                        <tr>
                            <td>{{ ++$k }}</td>
                            <td>
                            @if($min == $rs->seq)
                            <button
                                class="btn btn-outline-dark btn-sm btn-edit down"
                                data-name="{{$rs->name_en}}" data-no="{{$rs->seq}}"
                                data-popup="tooltip"
                                title="เลื่อนตำแหน่งลง"
                                data-placement="top"
                                id="top"
                                data-original-title="top tooltip">
                                <i class="fas fa-arrow-down"></i>
                            </button>
                            @elseif($min < $rs->seq && $rs->seq < $max)
                            <button
                                class="btn btn-outline-dark btn-sm btn-edit up"
                                data-name="{{$rs->name_en}}" data-no="{{$rs->seq}}"
                                data-popup="tooltip"
                                title="เลื่อนตำแหน่งขึ้น"
                                data-placement="bottom"
                                id="bottom"
                                data-original-title="bottom tooltip">
                                <i class="fas fa-arrow-up"></i>
                            </button>
                            <button
                                class="btn btn-outline-dark btn-sm btn-edit down"
                                data-name="{{$rs->name_en}}" data-no="{{$rs->seq}}"
                                data-popup="tooltip"
                                title="เลื่อนตำแหน่งลง"
                                data-placement="top"
                                id="top"
                                data-original-title="top tooltip">
                                <i class="fas fa-arrow-down"></i>
                            </button>
                            @else
                            <button
                                class="btn btn-outline-dark btn-sm btn-edit up"
                                data-name="{{$rs->name_en}}" data-no="{{$rs->seq}}"
                                data-popup="tooltip"
                                title="เลื่อนตำแหน่งขึ้น"
                                data-placement="bottom"
                                id="bottom"
                                data-original-title="bottom tooltip">
                                <i class="fas fa-arrow-up"></i>
                            </button>
                            @endif

                            
                            
                            
                            </td>
                            <td>{{ $rs->name_en }}</td>
                            <td>
                                @if($rs->img_en!="")
                                    <img src="/public/banner/{{$rs->img_en}}" class="img-fluid rounded mx-auto">
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                            
                                @if($rs->is_active=="Y")
                                    <center><span class="badge badge-primary badge-pill m-b-5">Active</span></center>
                                @else
                                    <center><span class="badge badge-danger badge-pill m-b-5">Inactive</span></center>
                                @endif
                            
                            </td>
                            <td>
                                <a role="button"  href="banner/edit/{{$rs->id}}" class="btn btn-outline-dark btn-sm btn-edit"><i class="fa fa-edit"></i> Edit</a>
                                <a href="#" data-href="/banner/{{$rs->id}}" data-name="{{$rs->name_en}}"  data-id="{{$rs->id}}" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        
                        </tr>
                        @endforeach

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

    <script>

   
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.up').on('click',function(){
            
            let no   = $(this).data('no');
            let name = $(this).data('name');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                type: "POST",
                data: {seq : no, name_en : name},
                url: "/cms/banner/up",

                success: function(rs){
                    swal("Success!", "ทำการเลื่อนตำแหน่งเรียบร้อยแล้ว", "success", {button:false});
                    setTimeout(function() {
                        location.reload();
                    }, 1200);
                }

            })
          
        });
        $('.down').on('click',function(){

            let no   = $(this).data('no');
            let name = $(this).data('name');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                dataType: 'json',
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: {seq : no, name_en : name},
                url: "/cms/banner/down",

                success: function(rs){
                    swal("Success!", "ทำการเลื่อนตำแหน่งเรียบร้อยแล้ว", "success", {button:false});
                    setTimeout(function() {
                        location.reload();
                    }, 1200);
                }
            })
        });

        $('body').on('click', '.btn-delete', function (e) {
            e.preventDefault();

            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            deleteConf(id, name);
        });

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
                        url: '/cms/banner/' + id,

                        success: function(datas){
                            swal("Good job!", "You clicked the button!", "success");
                            setTimeout(function() {
                                location.reload();
                            }, 1200);
                          
                        }
                    })

                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        } // error form show text




    </script>


@endsection



