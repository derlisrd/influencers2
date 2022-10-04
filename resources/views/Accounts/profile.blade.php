@extends('Layout.app')
@section('title', 'Perfil da conta')
@section('title2', 'Perfil da conta')
@section('main')


    <form method="post" action="{{ route('profile_post') }}">
        @csrf
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6>Informaçao do usuario</h6>
                <a href="{{ route('profile_password') }}" class="btn btn-secondary">Trocar minha senha</a>
                @if (Session::has('msg'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('msg') }}
                </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
            </div>
            <div class="card-body pt-4 p-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username" class="form-label text-dark">Username: </label>
                            <input type="text" disabled value="{{ $user->username ?? '' }}"
                                class="form-control form-control-lg" placeholder="username">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email" class="form-label text-dark">Email: </label>
                            <input type="email" name="email" value="{{ $user->email ?? '' }}"
                                class="form-control form-control-lg" placeholder="email">
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
