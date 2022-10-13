@extends('Layout.app')
@section('title', 'Saque')
@section('title2', 'Saque')
@section('main')

<div class="row">
    <form action="{{ route('payment_request_post') }}" method="post">
        @csrf
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Saque</h5>
                <input autofocus type="number" name="amount" class="form-control form-control-lg @error('amount') is-invalid @enderror"  placeholder="Valor" />
                <p class="text-muted text-sm">Insira o monto a sacar</p>
                @error('amount')
                   <span class="text-danger">{{ $message }}</span>
                @enderror

                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
    </form>
</div>

@endsection
