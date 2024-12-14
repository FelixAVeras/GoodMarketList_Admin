<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoodMarket List - Admin || @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css"> -->
     <!-- <link rel="stylesheet" href="https://bootswatch.com/3/readable/bootstrap.min.css"> -->
    @stack('loginStyle')
    <style>
        .container { padding: 10px; }
        body { padding-top: 50px; }

        nav.navbar {
            background: #fdedc0;
        }

        nav.navbar a.navbar-brand { color: green }
        nav.navbar ul.nav.navbar-nav li a { color: green }
    </style>
</head>
<body>
    @auth
        @include('navbar')
    @endauth
    <div class="container">
        @yield('content')
    </div>

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
</body>
</html>