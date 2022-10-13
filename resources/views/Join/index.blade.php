@extends('Layout.app')
@section('title', 'Raveshare Join')
@section('title2', 'Raveshare Join')
@section('main')

<form method="post" action="{{ route('raveshare_join_store') }}" >
    <input type="hidden" name="id" value="{{ $setting->id ?? '' }}" />
    @csrf
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6>Configuraçao do raveshare do dono da rede</h6>
            @isset($guardado)
                <div class="alert alert-success text-white" role="alert">
                    Atualizado
                </div>
            @endisset
        </div>
        <div class="card-body pt-4 p-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="form-label text-dark">Nome da empresa: </label>
                        <input name="name" type="text" disabled value="{{ $setting->name ?? '' }}" class="form-control form-control-lg" placeholder="Nome da empresa">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="form-label text-dark">RaveShare da join: </label>
                        <input name="raveshare_join" type="text" value="{{ $setting->raveshare_join ?? '' }}" class="form-control form-control-lg" placeholder="Raveshare Join">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
