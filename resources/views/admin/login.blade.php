<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
  <title>
    Admin Login
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
  <script src="http://unpkg.com/turbolinks"></script>

    <style>
    
        .main{

            padding-top: 15px;   
            margin-top:10%;

        }
        button{

            margin-top:5px;
            margin-left:100px

        }

        .badge{

            margin-left:20px;
            padding-left:250px;
            padding-right:250px;

        }

    </style>
  
</head>

<body>
    
    <div class="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <span class="badge badge-pill badge-lg bg-gradient-success">Admin Login</span><br><br>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Password" aria-label="Password" type="password" value="password" id="example-password-input">
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <button type="button" class="btn bg-gradient-secondary">Login</button>
                </div>
            </div>    
        </div>
    </div>



    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>

    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>

</body>

</html>


