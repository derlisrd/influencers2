@extends('Layout.app')
@section('title', 'Senha da conta')
@section('title2', 'Senha da conta')
@section('main')



    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Trocar senha</div>

                <form action="{{ route('profile_password_post') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="oldPasswordInput" class="form-label">Senha antiga</label>
                            <input autofocus name="old_password" type="password"
                                class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                placeholder="Senha antiga">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="newPasswordInput" class="form-label">Nova senha</label>
                            <input name="new_password" type="password"
                                class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                placeholder="Nova senha">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirmNewPasswordInput" class="form-label">Repetir senha nova</label>
                            <input name="new_password_confirmation" type="password" class="form-control"
                                id="confirmNewPasswordInput" placeholder="Repetir senha nova">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-success">Salvar</button>
                        <a href="{{ route("profile") }}" class="btn btn-default">Sair</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
