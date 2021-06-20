<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRM</title>
    <meta
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
        name="viewport">

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link
        rel="stylesheet"
        href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">
    <link
        rel="stylesheet"
        href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
    <link
        rel="stylesheet"
        href="{{ asset('dashboard_files/css/skin-blue.min.css') }}">


        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link
            rel="stylesheet"
            href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('dashboard_files/css/AdminLTE.min.css') }}">

    <style>
        .mr-2 {
            margin-right: 5px;
        }
        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #367FA9;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 1s linear infinite;
            /* Safari */
            animation: spin 1s linear infinite;
        }
        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    {{--<!-- jQuery 3 -->--}}
    <script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>

    {{--noty--}}
    <link
        rel="stylesheet"
        href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    {{--morris--}}
    <link
        rel="stylesheet"
        href="{{ asset('dashboard_files/plugins/morris/morris.css') }}">

    {{--<!-- iCheck -->--}}
    <link
        rel="stylesheet"
        href="{{ asset('dashboard_files/plugins/icheck/all.css') }}">

    {{--html in  ie--}}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <header class="main-header">

        {{--<!-- Logo -->--}}
        <a href="/admin" class="logo">
            <b>CRM </b>  <i class="fa fa-users"></i>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">





                    {{--<!-- User Account: style can be found in dropdown.less -->--}}
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img
                                src="https://www.placecage.com/640/360"
                                class="user-image"
                                alt="User Image">
                            <span class="hidden-xs">{{ auth()->user()->name }}
                             </span>
                        </a>
                        <ul class="dropdown-menu">

                            {{--<!-- User image -->--}}
                            <li class="user-header">
                                <img
                                    src="https://www.placecage.com/640/360
"
                                    class="img-circle"
                                    alt="User Image">

                                <p>
                                    {{ auth()->user()->name}}
                                    <small>   {{auth()->user()->created_at->diffForHumans()}}</small>
                                </p>
                            </li>

                            {{--<!-- Menu Footer-->--}}
                            <li class="user-footer">

                                <a
                                    href="{{ route('logout') }}"
                                    class="btn btn-default btn-flat"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"> Logout </a>

                                <form
                                    id="logout-form"
                                    action="{{ route('logout') }}"
                                    method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    @include('layouts.admin._aside') @yield('content')
    @include('partials._session')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">

        </div>
        <strong>Copyright &copy;
            <a href="https://adminlte.io"></a>.</strong>
        All rights reserved.
    </footer>

</div>
<!-- end of wrapper -->

{{--<!-- Bootstrap 3.3.7 -->--}}
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

{{--icheck--}}
<script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>

{{--<!-- FastClick -->--}}
<script src="{{ asset('dashboard_files/js/fastclick.js') }}"></script>

{{--<!-- AdminLTE App -->--}}
<script src="{{ asset('dashboard_files/js/adminlte.min.js') }}"></script>

{{--ckeditor standard--}}
<script src="{{ asset('dashboard_files/plugins/ckeditor/ckeditor.js') }}"></script>

{{--jquery number--}}
<script src="{{ asset('dashboard_files/js/jquery.number.min.js') }}"></script>

{{--print this--}}
<script src="{{ asset('dashboard_files/js/printThis.js') }}"></script>

{{--morris --}}
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('dashboard_files/plugins/morris/morris.min.js') }}"></script>

{{--custom js--}}
<script src="{{ asset('dashboard_files/js/custom/image_preview.js') }}"></script>
<script src="{{ asset('dashboard_files/js/custom/order.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree();
        //icheck
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck(
            {checkboxClass: 'icheckbox_minimal-blue', radioClass: 'iradio_minimal-blue'}
        );
        //delete
        $('.delete').click(function (e) {
            var that = $(this)
            e.preventDefault();
            var n = new Noty({
                text: "Are you sure?",
                type: "success",
                killer: true,
                buttons: [
                    Noty.button("Yes", 'btn btn-danger mr-2', function () {
                        that
                            .closest('form')
                            .submit();
                    }),
                    Noty.button("No", 'btn btn-default mr-2', function () {
                        n.close();
                    })
                ]
            });
            n.show();
        }); //end of delete
        //image preview in create user blade
        $(".logo").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        CKEDITOR.config.language = "{{ app()->getLocale() }}";
    }); //end of ready
</script>
@stack('scripts')
</body>
