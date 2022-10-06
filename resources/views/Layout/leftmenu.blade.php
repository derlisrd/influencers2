<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ route('home') }}" >
        <i class="navbar-brand-img h-100 ni ni-world" ></i>
        <span class="ms-1 font-weight-bold">
            Influencers 2.0
        </span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('home') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        @if(Auth::user()->type == '1')
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('domains*')) ? 'active' : '' }}" href="{{ route('domains') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-building text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dominios</span>
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('posts*')) ? 'active' : '' }}" href="{{ route('posts') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Posts</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('materias*')) ? 'active' : '' }}" href="{{ route('materias') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-copy-04 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Materias</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Conta</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('profile*')) ? 'active' : '' }}" href="{{ route("profile") }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Perfil</span>
          </a>
        </li>

        @if(Auth::user()->type == '1')
         <li class="nav-item">
            <a class="nav-link {{ (request()->is('users*')) ? 'active' : '' }}" href="{{ route('users') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Usuarios</span>
            </a>
          </li>
          @endif

        <li class="nav-item">
            <a class="nav-link {{ (request()->is('payments*')) ? 'active' : '' }}" href="{{ route('payments') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Pagamentos</span>
            </a>
          </li>
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('socialnetworks*')) ? 'active' : '' }}" href="{{ route('socialnetworks') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Redes</span>
          </a>
        </li>
        @if(Auth::user()->type == '1')
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('setting*')) ? 'active' : '' }}" href="{{ route('setting') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-settings text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Config</span>
            </a>
          </li>
          @endif
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">

        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Precisa de ajuda?</h6>
            <p class="text-xs font-weight-bold mb-0">Entre en contato</p>
          </div>
        </div>
      </div>
      <a href="mailto:derlisruizdiazr@gmail.com" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">E-mail</a>

    </div>
  </aside>
