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
        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap-material-design/dist/css/bootstrap-material-design.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap-material-design/dist/css/ripples.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">
        
        <!-- Javascript -->
        <script src="{{URL::asset('vendor/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{URL::asset('vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('vendor/bootstrap-material-design/dist/js/material.min.js')}}"></script>
        <script src="{{URL::asset('vendor/bootstrap-material-design/dist/js/ripples.min.js')}}"></script>
        
        

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
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li> 
              </ul>
              <form class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" class="form-control col-md-8" placeholder="Search">
                </div>
              </form>
            </div>
          </div>
        </nav>
        <!-- Main Content -->
        <main class="container">
            
            <div class="col-md-12">
                <h1>Hello World!</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-md-4">
                <h2><i class="material-icons">fingerprint</i> Secure</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris.</p>
            </div>
            <div class="col-md-4">
                <h2><i class="material-icons">lock_open</i> Open-Source</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris.</p>
            </div>
            <div class="col-md-4">
                <h2><i class="material-icons">view_list</i> Features</h2>
                <ul>
                    <li>Lorem ipsum</li>
                    <li>dolor sit</li>
                    <li>Ut enim ad</li>
                    <li>ullamco laboris</li>
                </ul>
            </div>
        </main>
        <!-- Footer -->
        <footer class="footer ">
            <div class="container">
                <div class="col-md-4">
                    <h3>About</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
                <div class="col-md-4">
                    <h3>Tools</h3>
                    <ul>
                    <li>Bootstrap 3 Material Theme</li>
                    <li>Google Material Icon Font</li>
                    <li>Laravel
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Links</h3>
                    <ul>
                        <li>GitHub</li>
                        <li>Other</li>
                    </ul>
                    </div>
                <div class="col-md-12 text-center">
                    &copy;2016 - Severin Kaderli, Marius Schär
                </div>
            </div>
        </footer>
    </body>
</html>
