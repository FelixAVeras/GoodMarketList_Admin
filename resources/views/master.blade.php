<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoodMarket List - Admin || @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
    <!-- <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css"> -->
    <!-- <style>
        .custom-navbar-background {
            background-color: #F8EDD9 !important;
        }

        .custom-navbar-background a {
            color: #317039;
        }

        .custom-navbar-background a.navbar-brand {
            font-weight: 600;
        } 
        
        .custom-navbar-background li.nav-item a.nav-link:hover {
            font-weight: 600;
            color: #317039;
        }

        .page-title, h3.page-subtitle, table.table thead tr th { color: #317039; }

        .custom-btn-primary {
            background: #FFD54F;
            color: black;
            border-color: #FFD54F;
        }

        .custom-btn-primary:hover {
            background: #d8b33d;
            color: black;
            border-color: #d8b33d;
        }

        body { background: #f3f3f3; }

        .custom-container {
            background: #fff;
            padding: 12px;
            margin-top: 2%;
            margin-bottom: 2%;
            border-radius: 12px;
        }
    </style> -->

    @stack('loginStyle')
</head>
<body>
    <!-- @auth -->
        <!-- @include('navbar') -->
        <!-- @endauth -->
        @include('navbar')
    <div class="container">
        @yield('content')
    </div>

    <!-- scripts -->
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>