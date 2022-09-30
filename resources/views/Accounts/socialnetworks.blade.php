@extends('Layout.app')
@section('title', 'Redes sociais')
@section('title2', 'Redes sociais')
@section('main')

<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Redes sociais</h6>
          <a href="{{ route('socialnetworks_create') }}" class="btn btn-primary btn-lg m-1">Adicionar</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titulo</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @if($datos->count()==0)
                    <tr>
                        <td colspan="4" align="center">
                            <h4>Por favor, adicione...</h4>
                        </td>
                    </tr>
                @endif
               @foreach ($datos as $dato )
               <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ $dato->title }}</h6>
                      <p class="text-xs text-secondary mb-0">{{ $dato->url }}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ $dato->username }}</p>
                  <p class="text-xs text-secondary mb-0">{{ $dato->user->name }}</p>
                </td>
                <td class="align-middle text-center text-sm">
                    <p class="text-xs font-weight-bold mb-0">{{ $dato->url }}</p>
                  <span class="badge badge-sm bg-gradient-success">Online</span>
                </td>
                <td class="align-middle">
                  <a href="{{ route('socialnetworks_edit',$dato->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Editar
                  </a>
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
