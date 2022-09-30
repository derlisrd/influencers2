@extends('Layout.app')
@section('title', 'Dominios')
@section('title2', 'Dominios')
@section('main')

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Dominios</h6>
                    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal"
                        data-bs-target="#modal_new_domain">
                        Adicionar
                    </button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">URL
                                    </th>
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
                                                    <h6 class="mb-0 text-sm">{{ $dato->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $dato->url }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $dato->url }}</p>
                                        </td>
                                        <td class="align-middle">

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


    <form method="post" action="{{ route('domain_store') }}">
        @csrf
        <div class="modal fade" id="modal_new_domain" tabindex="-1" role="dialog" aria-labelledby="modal_new_domain"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar dominio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="form-label text-dark">Nome: </label>
                                    <input autofocus type="text" name="name" class="form-control form-control-lg" placeholder="Nome">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url" class="form-label text-dark">URL: </label>
                                    <input type="text" name="url" class="form-control form-control-lg" placeholder="https://dominio.com/">
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
