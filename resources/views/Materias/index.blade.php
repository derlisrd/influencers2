@extends('Layout.app')
@section('title', 'Materias')
@section('title2', 'Materias')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Materias</h6>
                <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal"
                    data-bs-target="#modal_new_domain">
                    Solicitar
                </button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titulo</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descriçao</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Usuario</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($datos->count() == 0)
                                <tr>
                                    <td colspan="4">
                                        <h4 class='text-center'>Por favor, adicione...</h4>
                                    </td>
                                </tr>
                            @endif
                            @foreach ($datos as $dato)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $dato->title }}</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $dato->description }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $dato->user->name }}</p>
                                    </td>
                                    <td>
                                        @if($dato->status)
                                            <span class="badge badge-sm bg-gradient-success">Aprobado</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-warning">Pendente...</span>
                                        @endif

                                    </td>
                                    <td class="align-middle">

                                       @if(Auth::user()->type=="1" && $dato->status=='0')
                                       <a href="{{ route('materia_approve',$dato->id)}}" class="badge badge-sm bg-info">Aprovar</a>
                                       @endif
                                        <a href="{{ route('materia_edit',$dato->id)}}" class="badge badge-sm bg-success">Editar</a>
                                        <a href="{{ route('materia_destroy',$dato->id)}}" class="badge badge-sm bg-danger">Apagar</a>
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

<form method="post" action="{{ route('materia_store') }}">
    @csrf
    <div class="modal fade" id="modal_new_domain" tabindex="-1" role="dialog" aria-labelledby="modal_new_domain"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar materia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="form-label text-dark">Titulo: </label>
                                <input autofocus name="title" class="form-control form-control-lg" placeholder="Titulo...">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="form-label text-dark">Descripçao: </label>
                                <textarea name="description" placeholder="Descripção" class="form-control" id="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-primary">Adicionar</button>
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
