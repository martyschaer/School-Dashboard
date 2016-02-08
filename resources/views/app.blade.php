<!DOCTYPE html>
<html>
    <head>
        <!-- SEO Information -->
        <meta charset="utf-8">
        <title>School-Dashboard</title>
        <meta name="author" content="Severin Kaderli, Marius Schär">
        <meta name="keywords" content"school, dashboard, todo, list">
        <meta name="description" content="Project for Module 306 at gibb">
        <!-- Other Meta Information -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#ABCDEF">
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap-material-design/dist/css/bootstrap-material-design.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap-material-design/dist/css/ripples.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">
        <!-- Javascript -->
        <script src="{{URL::asset('vendor/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{URL::asset('vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('vendor/bootstrap-material-design/dist/js/material.min.js')}}"></script>
        <script src="{{URL::asset('vendor/bootstrap-material-design/dist/js/ripples.min.js')}}"></script>
        @yield('headJS')
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-success">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">School-Dashboard</a>
            </div>
            <div class="navbar-collapse collapse navbar-warning-collapse">
                @if(Auth::check()):
                    @include('navigation.auth')
                @else
                    @include('navigation.guest')
                @endif
            </div>
          </div>
        </nav>

        <!-- Main Content -->
        <main class="container">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer ">
            @include('footer')
        </footer>
        @yield('bodyJS')
    </body>
</html>
