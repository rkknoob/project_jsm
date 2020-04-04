@include('backend.layouts.style')
<div class="wrapper" style="display:flex;">
    @include('backend.layouts.sidebar')

    <div id="content-wrapper" class="d-flex flex-column" style="width: 100%;">
        <div id="content">
            @include('backend.layouts.header')

            <section class="container-fluid">
                @yield('content')
            </section>

            @include('backend.layouts.footer')
        </div>
    </div>
    <!-- /.content-wrapper -->
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<!-- ./wrapper -->
@include('backend.layouts.script')
