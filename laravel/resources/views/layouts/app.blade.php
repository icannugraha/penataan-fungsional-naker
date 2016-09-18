<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#a94442" />

    <title>@yield('title')</title>
    
    <link rel="shortcut icon" href="../../../favicon.png" />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <!-- <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../../../styles/styles.css">

    <script src="../../../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../dist/sweetalert.css">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    PFPK Application
                </a>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/about') }}">About</a></li>
                    @if (Auth::guest())
                    @else
                        @if (Auth::user()->is_admin)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Manage <span class="caret"></span>
                            </a>
                        
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('admin/user') }}">Users</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('admin/pengawas') }}">Pengawas</a></li>
                            </ul>
                        </li>
                        @endif
                    @endif
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        
                        <li><a href="{{ url('login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-btn fa-user"></i> {{ Auth::user()->username }}
                                <span class="caret"></span>
                            </a>
                        
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><i class="fa fa-btn fa-gear"></i> Akun</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container col-md-8 col-md-offset-2">
        @include('notice2')
        @yield('content')
    </div>
    
    <footer class="footer">
        <div class="container">
            <p class="text-muted">&copy; 2016 Penataan Fungsional Pengawas Ketenagakerjaan </p>
        </div>
    </footer>

    <!-- JavaScripts -->
    <script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    
    <script>
        $('button#delete').on('click', function(){
            swal({   
                title: "Are you sure?",
                text: "You will not be able to recover this!",
                allowOutsideClick: true, 
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!", 
                closeOnConfirm: false 
            }, 
            function(){   
                $("#deleteform").submit();
            });
        })
    </script>

</body>
</html>
