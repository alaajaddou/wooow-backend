<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0 shrink-to-fit=no">
    <meta name="description" content="Wooow Supermarket">
    <meta name="author" content="Alaa M. Jaddou">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title')</title>

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.js" integrity="sha512-gRg3MTbqGUwZiqkDRUj7BJOqiYX6tQDAkZVq6zCHfRUxBhoW0kRG4ASllaK31PIe+I+xdaJhLcZXbs2O2r8SRg==" crossorigin="anonymous"></script>
    <script>

    </script>
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet" />
    <style>


    .wrapper{
      position: absolute;
      top: 50%;
      left: 50%;
      width: 100%;
      text-align:center;
      transform: translateX(-50%);
    }

    .spanner{
      position:fixed;
      top: 50%;
      left: 0;
      background: #2a2a2a55;
      width: 100vw;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
      height: 100vh;
      color: #FFF;
      transform: translateY(-50%);
      z-index: 1000;
      visibility: hidden;
    }

    .overlay{
      position: fixed;
    	width: 100%;
    	height: 100%;
      background: rgba(0,0,0,0.5);
      visibility: hidden;
    }

    .show{
      visibility: visible;
    }

    .spanner, .overlay{
    	opacity: 0;
    	-webkit-transition: all 0.3s;
    	-moz-transition: all 0.3s;
    	transition: all 0.3s;
        z-index: 10;
    }

    .spanner.show, .overlay.show {
    	opacity: 1
    }
    </style>

    @yield('css')
</head>
