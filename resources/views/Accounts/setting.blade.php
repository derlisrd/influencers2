@extends('Layout.app')
@section('title', 'Configuraçao')
@section('title2', 'Configuraçao da empresa')
@section('main')


<form method="post" action="{{ route('setting_store') }}">
    <input type="hidden" name="id" value="{{ $data->id ?? '' }}" />
    @csrf
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6>Configuraçao da empresa</h6>
            @if(Session::has('msg'))
                <div class="alert alert-success text-white" role="alert">
                    {{ Session::get('msg') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-warning" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="card-body pt-4 p-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="form-label text-dark">Nome da empresa: </label>
                        <input name="name" type="text" autofocus value="{{ $data->name ?? '' }}"
                            class="form-control form-control-lg" placeholder="Nome da empresa">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="doc" class="form-label text-dark">Documento: </label>
                        <input name="doc" value="{{ $data->doc ?? '' }}" class="form-control form-control-lg" placeholder="Documento">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="tel" class="form-label text-dark">Tel: </label>
                        <input name="tel" value="{{ $data->tel ?? '' }}" class="form-control form-control-lg" placeholder="Documento">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="minimal_payment" class="form-label text-dark">Pago minimo (100 USS): </label>
                        <input name="minimal_payment"  type="number" value="{{ $data->minimal_payment ?? '' }}" class="form-control form-control-lg" placeholder="Pago minimo">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pix" class="form-label text-dark">Pix: </label>
                        <input name="pix" value="{{ $data->pix ?? '' }}" class="form-control form-control-lg" placeholder="Pix">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="raveshare" class="form-label text-dark">Raveshare: % </label>
                        <input name="raveshare" type="number" value="{{ $data->raveshare ?? '' }}" class="form-control form-control-lg" placeholder="Raveshare">
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
