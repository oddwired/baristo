@extends('admin.layouts.app')
@section('title', "Admin")
@section('csscontent')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection
@section('navcontent')
    <li>
        <a href="#">HOME</a>
    </li>
    <li>
        <a href="#">LOCATIONS</a>
    </li>
    <li>
        <a href="{{url('admin/menu')}}">MENU</a>
    </li>
    <li class="active">
        <a href="{{url('admin/about')}}">ABOUT</a>
    </li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div id="info"></div>
            <div class="card-title">Edit <b>About Us</b> page</div>
            <div class="editor">
                <div id="toolbar-container">
                    <span class="ql-formats">
                    <select class="ql-font"></select>
                    <select class="ql-size"></select>
                    </span>
                    <span class="ql-formats">
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline"></button>
                    <button class="ql-strike"></button>
                    </span>
                    <span class="ql-formats">
                    <select class="ql-color"></select>
                    <select class="ql-background"></select>
                    </span>
                    <span class="ql-formats">
                    <button class="ql-script" value="sub"></button>
                    <button class="ql-script" value="super"></button>
                    </span>
                    <span class="ql-formats">
                    <button class="ql-header" value="1"></button>
                    <button class="ql-header" value="2"></button>
                    <button class="ql-blockquote"></button>
                    <button class="ql-code-block"></button>
                    </span>
                    <span class="ql-formats">
                    <button class="ql-list" value="ordered"></button>
                    <button class="ql-list" value="bullet"></button>
                    <button class="ql-indent" value="-1"></button>
                    <button class="ql-indent" value="+1"></button>
                    </span>
                    <span class="ql-formats">
                    <button class="ql-direction" value="rtl"></button>
                    <select class="ql-align"></select>
                    </span>
                    <span class="ql-formats">
                    <button class="ql-link"></button>
                    <button class="ql-image"></button>
                    <button class="ql-video"></button>
                    <button class="ql-formula"></button>
                    </span>
                    <span class="ql-formats">
                    <button class="ql-clean"></button>
                    </span>
                </div>
                <div id="editor">{!! $about->content_data !!}</div>
            </div>

            <button class="btn btn-primary" onclick="saveContent()">Save</button>
        </div>
    </div>
@endsection
@section('jscontent')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <!-- Initialize Quill editor -->
    <script>

        var quill = new Quill('#editor', {
            modules: {
                toolbar: '#toolbar-container'
            },
            theme: 'snow'
        });

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        function saveContent() {
            //console.log(quill.root.innerHTML);
            $("#info").html("");

            var formData = new FormData();
            formData.append('text', quill.root.innerHTML);
            $.ajax({
                url: "{{url('admin/saveabout')}}",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    //alert("Success");
                },
                error: function(data) {
                    $("#info").html("<div class='alert alert-danger'>An error occurred!</div>");
                },
                complete: function(data) {
                    $("#info").html("<div class='alert alert-info'>Content saved</div>");
                    location.reload();
                }
            });
        }

    </script>
@endsection