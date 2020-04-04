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
        <h1 class="h3 mb-4 text-gray-800">Artist Introduction</h1>

        <!-- DataTales Example -->
        <div class="card shadow col-md-12" style="margin-bottom: 8%;">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12" style="text-align:right; margin: 0 0 2% 0;">
                        <a href="" class="btn btn-success">
                            Add Artist
                        </a>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable"  class="display" width="100%" cellspacing="0">
                        <thead>
                            <tr class="center">
                                <th>Id</th>
                                <th>Name</th>
                                <th style="width:180px">Picture</th>
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


    <script type="text/javascript">


    </script>


@endsection
