@extends('Layout.app')
@section('title', 'Redes sociais')
@section('title2', 'Adicionar redes sociais')
@section('main')

<form method="post" action="{{ route('socialnetworks_store') }}">
    @csrf
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6>Adicionar uma nova</h6>
            @if ($errors->any())
            <div class="alert alert-warning" role="alert">
                Complete corretamente todos os campos
            </div>
            @endif
        </div>
        <div class="card-body pt-4 p-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title" class="form-label text-dark">Titulo da rede social: </label>
                        <input autofocus name="title" class="form-control form-control-lg" placeholder="Youtube, instagram...">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="url" class="form-label text-dark">Link ou URL: </label>
                        <input name="url" class="form-control form-control-lg" placeholder="Link: https://youtube.com/usuario">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="username" class="form-label text-dark">Nome do usuario: </label>
                        <input name="username" class="form-control form-control-lg" placeholder="Usuario">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
                    <a href="{{ route('socialnetworks') }}"  class="btn btn-lg btn-default">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
