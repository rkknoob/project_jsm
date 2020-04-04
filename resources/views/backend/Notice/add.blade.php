@extends('backend.layouts.content')

@section('content')
    <style>
        .btn-icon-split .icon {
            padding-top: 5%;
        }
        .box-footer{
            clear:both;
            margin-top: 15px;
            text-align : left;
            padding-top: 20px;
            padding-bottom: 15px;
        }
        .note-popover{
            display:none;
        }
        .padding-zero{
            padding-left: 0px!important;
        }
        .profile-image{
            width: 450px;
            padding-top: 25px;
            margin-bottom: 25px;

        }
    </style>


    <div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add Notice Form</h1>

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="multifile" id="multifile" value="">

                        <div class="box">
                            {{ csrf_field() }}

                            <div class="box-body col-md-12">
                                <div class="form-group">
                                    <label for="fname"><b>Name</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="title"><b>Content</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Content">
                                </div>
                                <div class="form-group">
                                    <label for="type"><b>Type</b><font color="red">*</font></label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="normal">Normal</option>
                                        <option value="special">Special</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="">--- Choose A Status ---</option>
                                        <option value="Y">Yes</option>
                                        <option value="N">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><b>Detail Picture EN</b><font color="red">*</font></label>
                                    <div class="dropzone dz-clickable" id="uploadDropzone">
                                        <div class="dz-default dz-message" data-dz-message="">
                                            <span>Drop files to upload or click</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" hidden>
                                    <label><b>Detail Picture TH</b></label>
                                    <div class="dropzone dz-clickable" id="uploadDropzone">
                                        <div class="dz-default dz-message" data-dz-message="">
                                            <span>Drop files to upload or click</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer col-md-12">
                                <button type="button" class="btn btn-success btn-save btn-loading" style="width: 120px;">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
    <script>
        if (!window.moment) {
            document.write('<script src="assets/plugins/moment/moment.min.js"><\/script>');
        }
    </script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js"></script>
    <script>

        var $link = "<?php echo url('/public/notice/'); ?>";
        var $backoffice_url = <?php echo json_encode(url('cms')); ?>

        $('body').on('click', '.btn-save', function () {

            var name = $('#name').val();
            var content = $('#title').val();
            var type = $('#type').val();
            var is_active = $('#is_active').val();
            var file = $('#multifile').val();

            if((name == '' ) || (content =='') || (type =='') || (is_active =='') ||(file =='')){
                return swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูลให้ครบ", "error");
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                dataType: 'json',
                type:'POST',
                data:{name:name,content:content,type:type,is_active:is_active,file:file},
                url: '/cms/notice',
                success: function(datas){
                    console.log(datas);
                    swal("Good job!", "You clicked the button!", "success");
                    window.location.href = '/cms/notice'
                }
            })
        });

        ///--------- Banner Picture ---------///
        $('body').on('change', 'input[name= "file_upload"]', function () {
            if ($('input[name ="file_upload"]').val() != '') {

                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "file_upload"]').prop('files')[0];
                var form_data = new FormData();
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {

                    if((this.width != '1400') && (this.height != '400')){
                        return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }

                    form_data.append('file_upload', file_data);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: '/cms/notice/uploadimage',
                            dataType: 'json',
                            type: 'POST',
                            data: form_data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function success(resp) {

                                $('input[name=image]').val(resp.data);
                                $('#showImage').attr("src", $link +'/'+ resp.data);
                                swal("Good job!", "You clicked the button!", "success");
                            },
                            error: function error(xhr, textStatus, errorThrown) {
                                showFormErrors(xhr, $('#customerForm'));
                                console.log(errorThrown);
                            }
                        });

                    };
                    img.onerror = function() {
                        alert( "not a valid file: " + file.type);
                    };
                    img.src = _URL.createObjectURL(file);
                }
            }
        });

        Dropzone.autoDiscover = false;
        if ($('#productForm').length) {
            var arrImage = [];
            var deleteFileId = [];
            var deleteFileName = [];

            var myDropzone = new Dropzone("div#uploadDropzone", {
                paramName: 'file_upload',
                url:  '/cms/notice/uploadimage',
                acceptedFiles: '.jpeg,.jpg,.png,.gif',
                maxFiles: 1,
                maxFilesize: 25, // MB
                addRemoveLinks: true,
                dictRemoveFile: 'ลบรูปภาพ',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                init: function () {
                    this.on('success', function (file) {
                        var filename = JSON.parse(file.xhr.response);
                        arrImage.push(filename.data);
                        $('input[name=multifile]').val(arrImage);
                        file.dataURL = filename.data;
                    });

                    this.on('removedfile', function (file) {
                        // assign delete value
                        deleteFileName.push(file.name);
                        if (!file.processing) {
                            deleteFileId.push(file.id);
                            $('input[name=deletefile_id]').val(deleteFileId);
                        }
                        $('input[name=deletefile_name]').val(deleteFileName);

                        // pop array on multifile
                        var index = arrImage.indexOf(file.dataURL);

                        if (index > -1) {
                            arrImage.splice(index, 1);
                            $('input[name=multifile]').val(arrImage);
                        }
                    });
                }
            });
        }
        if($('input[name=id]').val()) {
            axios.get($backoffice_url + '/notice/' + $('input[name=id]').val() + '/images')
            .then(function (response) {
                response.data.forEach(function (data) {
                    let thumbFile = {
                        id: data.id,
                        name: data.img_en,
                        size: 0,
                        dataURL: $link+ '/' + data.img_en
                    };
                    myDropzone.emit('addedfile', thumbFile);
                    myDropzone.createThumbnailFromUrl(thumbFile,
                        myDropzone.options.thumbnailWidth,
                        myDropzone.options.thumbnailHeight,
                        myDropzone.options.thumbnailMethod, true,
                        function (thumbnail) {
                            myDropzone.emit('thumbnail', thumbFile, thumbnail);
                        });
                    myDropzone.emit('complete', thumbFile);
                });
            })
            .catch(function (error) {
                console.log(error);
            });
        }


    </script>

@endsection
