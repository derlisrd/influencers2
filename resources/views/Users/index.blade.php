@extends('Layout.app')
@section('title', 'Usuarios')
@section('title2', 'Usuarios')
@section('main')


<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Usuarios</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipo</th>
                  <th class="text-secondary opacity-7">Status</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($datos as $dato )
               <tr>

                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ $dato->name }}</h6>
                      <p class="text-xs text-secondary mb-0">{{ $dato->username }}</p>
                    </div>
                  </div>
                </td>

                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ $dato->email }}</p>
                </td>

                <td class="align-middle text-sm">

                  @if($dato->type == 1)
                  <span class="badge badge-sm bg-gradient-success">Administrador</span>
                  @else
                  <span class="badge badge-sm bg-gradient-info">Usuario</span>
                  @endif
                </td>

                <td class="align-middle">
                  @if($dato->active==0)
                    <a href="{{ route('user_active',$dato->id) }}" class="btn btn-primary">Ativar</a>
                    @else
                    <span class="badge badge-sm bg-gradient-secondary">Usuario Ativo</span>
                    @if($dato->type == 0)
                    <a href="{{ route('user_desactive',$dato->id) }}" class="btn btn-primary">Desativar</a>
                    @endif
                  @endif
                </td>

              </tr>
               @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
