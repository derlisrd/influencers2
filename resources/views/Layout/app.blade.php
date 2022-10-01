<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ URL("assets/img/apple-icon.png") }}">
  <link rel="icon" type="image/png" href="{{ URL("assets/img/favicon.png") }}">
  <title>
    @yield("title","Influencers 2")
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ URL("/assets/css/nucleo-icons.css") }}" rel="stylesheet" />
  <link href="{{ URL("/assets/css/nucleo-svg.css") }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ URL("/assets/css/nucleo-svg.css") }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ URL("assets/css/argon-dashboard.css") }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('Layout.leftmenu')

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('Layout.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @yield('main')
      @include('Layout.footer')
    </div>

  </main>
  @include('Layout.rightmenu')
  <!--   Core JS Files   -->
  <script src="{{ URL("assets/js/core/popper.min.js") }}"></script>
  <script src="{{ URL("assets/js/core/bootstrap.min.js") }}"></script>
  <script src="{{ URL("assets/js/plugins/perfect-scrollbar.min.js") }}"></script>
  <script src="{{ URL("assets/js/plugins/smooth-scrollbar.min.js") }}"></script>
  <script src="{{ URL("assets/js/plugins/chartjs.min.js") }}"></script>
  <script src="{{URL('assets/sa')}}/sweetalert.min.js"></script>

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
  <script src="{{ URL('assets/js/argon-dashboard.js') }}"></script>
  @yield('scripts')
</body>

</html>
