@extends('Layout.app')
@section('title', 'Saque')
@section('title2', 'Saque')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Por favor configure os dados de configuraçao da empresa</h2>
                <a href="{{ route('setting') }}" class="btn btn-primary">Ir Configurar</a>
            </div>
        </div>
    </div>
</div>

@endsection
