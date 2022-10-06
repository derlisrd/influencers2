<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Entrar
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ URL("/assets/css/nucleo-icons.css") }}" rel="stylesheet" />
  <link href="{{ URL("/assets/css/nucleo-svg.css") }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ URL("assets/css/nucleo-svg.css") }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ URL('assets/css/argon-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="#">
              Sistema de influencers
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link me-2" href="{{ route('login') }}">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Ja tem conta? Entre no sistema
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Adicionar redes sociais</h4>
                    @if($errors->any())
                        <div class="alert alert-warning text-white">{{$errors->first()}}</div>
                    @endif

                </div>
                <div class="card-body">
                  <form method="post" action="{{ route("register_step2_post") }}">
                    @csrf

                        <div id="_redes">
                        <input name="title[]" autofocus   class="mb-3 form-control form-control-lg" placeholder="Titulo: Youtube, Instagram..." >


                        <input name="url[]"  class="mb-3 form-control form-control-lg" placeholder="Link: youtube.com/user" >


                        <input name="username[]" class="mb-3 form-control form-control-lg" placeholder="Usuario: user" >
                        </div>

                        <button class="btn btn-primary" type="button" onclick="adicionar_redes()">Adicionar mais</button>


                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Completar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Ja tem conta ?
                    <a href="{{ route("login") }}" class="text-primary text-gradient font-weight-bold">Entre no sistema</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" >
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Influencers 2.0"</h4>
                <p class="text-white position-relative">Influencers e um sistema de administraçao de blogs especialmente para influencers, youtubers, o influenciadores da midia.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ URL('/assets/js/core/popper.min.js')}}"></script>
  <script src="{{ URL('/assets/js/core/bootstrap.min.js')}}"></script>
  <script>
    function adicionar_redes(){

        var x = document.createElement("input");
        x.setAttribute("type", "text");
        x.setAttribute("name", "title[]");
        x.setAttribute("placeholder", "Titulo: youtube, instagram...");
        x.setAttribute("class", "form-control form-control-lg mb-3");
        document.getElementById("_redes").appendChild(x);
        var y = document.createElement("input");
        y.setAttribute("type", "text");
        y.setAttribute("name", "url[]");
        y.setAttribute("placeholder", "Link: youtube.com/user");
        y.setAttribute("class", "form-control form-control-lg mb-3");
        document.getElementById("_redes").appendChild(y);
        var z = document.createElement("input");
        z.setAttribute("type", "text");
        z.setAttribute("name", "username[]");
        z.setAttribute("placeholder", "Usuario: user");
        z.setAttribute("class", "form-control form-control-lg mb-3");
        document.getElementById("_redes").appendChild(z);
    }
  </script>
</body>

</html>
