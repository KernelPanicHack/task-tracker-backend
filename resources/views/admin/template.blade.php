<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bellota&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        :root {
            /*--body: 239, 235, 249;*/
            --body: 223, 224, 255;
            --success-bg: 17, 157, 17;
            --success-text: 178, 255, 178;
            --warning-bg: 225, 169, 0;
            --warning-text: 255, 255, 199;
            --error-bg: 190, 10, 10;
            --error-text: 255, 197, 197;
            --info-bg: 38, 93, 205;
            --info-text: 179, 220, 255;
            --dark-50: 83, 103, 132;
            --dark-100: 74, 90, 121;
            --dark-200: 65, 81, 114;
            --dark-300: 53, 69, 103;
            --dark-400: 48, 61, 93;
            --dark-500: 41, 53, 82;
            --dark-600: 40, 51, 78;
            --dark-700: 39, 45, 69;
            --dark-800: 27, 37, 59;
            --dark-900: 15, 23, 42;
            /*--primary: 54, 26, 94;*/
            --primary: 67, 55, 132;
            --secondary: 182, 41, 130;
            --border:26,24,49 ;
            --border-alpha:26,24,49,0.8 ;
            --text-color:26,24,49;
        }
        html{
            height: 100%;
            width: 100%;
            font-family: 'Poppins', sans-serif;
            font-weight: 100;
            overflow: hidden;
        }

        body {
            background-color: rgb(var(--body));
            height: 100%;
            margin: 0;
            width: 100%;
            color: rgb(var(--text-color));
        }
        .main {
            display: flex;
            height: 100%;

        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        /* ---------------------------------------------------
            SIDEBAR STYLE
        ----------------------------------------------------- */

        /*.main {*/
        /*    display: flex;*/
        /*    width: 100%;*/
        /*    align-items: stretch;*/
        /*    height: 100%;*/
        /*    max-width: 100%;*/
        /*}*/
        .content {
            width: 80%;
            overflow-x: scroll;
        }
        .content-logged-out {
            width: 100%;
        }


    </style>


</head>
<body>
<header style="border-bottom: 1px solid rgba(var(--border-alpha)); background-color: rgba(var(--body),1)">
    @include('admin.header')
</header>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="main container-fluid" >
    @if(auth()->check())

            <x-sidebar />
    @endif


    <!-- Page Content  -->
    <div class="content {{ auth()->check() ? 'content-logged-in' : 'content-logged-out' }}">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container mt-5" style="margin-bottom: 10%">
            @yield('content')
        </div>
    </div>
</div>


















<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('#sidebarCollapse').on('click', function () {--}}
{{--            $('#sidebar').toggleClass('active');--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH D:\LaravelProjects\мумбашайн\hackaton_laravel_template\resources\views/admin/template.blade.php ENDPATH**/ ?>
