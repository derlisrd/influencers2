@extends('Layout.app')

@section('title','Dashboard')


@section('main')


<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Hoje</p>
                <h5 class="font-weight-bolder">
                  {{ $today_values ?? 0 }}
                </h5>
                <p class="mb-0 text-sm">
                  Receita de hoje
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Impressao</p>
                <h5 class="font-weight-bolder">
                  {{ $impressions ?? 0 }}
                </h5>
                <p class="mb-0 text-sm">
                  Ultimas impressoes do día
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Post</p>
                <h5 class="font-weight-bolder">
                  {{ $post_count ?? 0 }}
                </h5>
                <p class="mb-0 text-sm">
                  Quantidade de Post
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Pagos</p>
                <h5 class="font-weight-bolder">
                  {{ $last_payment ?? 0 }}
                </h5>
                <p class="mb-0 text-sm">
                  Ultimo saque feito
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">Ultimos 7 días</h6>
          <p class="text-sm mb-0">
            <i class="fa fa-arrow-up text-success"></i>
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-5">

      <div class="card card-carousel overflow-hidden h-100 p-0">
        <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
          <div class="carousel-inner border-radius-lg h-100">

            @foreach ($last_posts as $key=>$post)
            <div class="carousel-item h-100 @if($key==0) active @endif" style="background-image: url('{{ $post->image }}');
            background-size: cover;">
                        <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                          <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                            <i class="ni ni-camera-compact text-dark opacity-10"></i>
                          </div>
                          <h5 class="text-white bg-default p-1">{{ $post->title }}</h5>
                          <p>{{ $post->date }}</p>
                        </div>
            </div>
            @endforeach



          </div>
          <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Ant</span>
          </button>
          <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sig</span>
          </button>
        </div>
      </div>
    </div>

  </div>

  <div class="row mt-4">

    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card ">
        <div class="card-header pb-0 p-3">
          <div class="d-flex justify-content-between">
            <h6 class="mb-2">Por Rede social</h6>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center ">
            <tbody>
              @foreach ($social_network_revenue as $revenue )
              <tr>
                <td class="w-30">
                  <div class="d-flex px-2 py-1 align-items-center">
                    <div class="ms-4">
                      <p class="text-xs font-weight-bold mb-0">Rede:</p>
                      <h6 class="text-sm mb-0">{{ $revenue['title'] }}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Receita:</p>
                    <h6 class="text-sm mb-0">{{ $revenue['revenue'] }} $</h6>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">Posts</h6>
        </div>
        <div class="card-body p-3">
          <ul class="list-group">
            @foreach ($last_posts as $post )
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni ni-books text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">{{ $post->domain->name }}</h6>
                    <span class="text-xs">{{ $post->title }}</span>
                  </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li>
            @endforeach

          </ul>

        </div>
      </div>
    </div>
  </div>




  <div class="row mt-4">

    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card ">
        <div class="card-header pb-0 p-3">
          <div class="d-flex justify-content-between">
            <h6 class="mb-2">Por influencer</h6>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center ">
            <tbody>
              @foreach ($por_influencer as $influencer )
              <tr>
                <td class="w-30">
                  <div class="d-flex px-2 py-1 align-items-center">
                    <div class="ms-4">
                      <p class="text-xs font-weight-bold mb-0">Nome:</p>
                      <h6 class="text-sm mb-0">{{ $influencer['name'] }}</h6>
                    </div>
                  </div>
                </td>
                <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Raveshare:</p>
                      <h6 class="text-sm mb-0">{{ $influencer['raveshare'] }} </h6>
                    </div>
                  </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Receita:</p>
                    <h6 class="text-sm mb-0">{{ $influencer['revenue'] }} $</h6>
                  </div>
                </td>
                <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Influencer:</p>
                      <h6 class="text-sm mb-0">{{ $influencer['influencer'] }} $</h6>
                    </div>
                  </td>
                <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Lucro:</p>
                      <h6 class="text-sm mb-0">{{ $influencer['lucro'] }} $</h6>
                    </div>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('scripts')
<script>


    var ultimos_dias = [];
    for (var i=0; i<7; i++) {
        var d = new Date();
        ultimos_dias.push(d.getDate() - i )
    }
    var results = [@foreach ($last_7_days as $day ){{ $day . "," }}@endforeach]


    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ultimos_dias.reverse(),
        datasets: [{
          label: "Renda",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: results,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
@endsection
