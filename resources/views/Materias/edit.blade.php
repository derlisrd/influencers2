@extends('Layout.app')
@section('title', 'Perfil da conta')
@section('title2', 'Perfil da conta')
@section('main')


    <form method="post" action="{{ route('materia_update') }}">
        <input type="hidden" name="id" value="{{ $dato->id}}" />
        @csrf
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6>Editar materia</h6>
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
                            <label for="title" class="form-label text-dark">Titulo: </label>
                            <input name="title" value="{{ $dato->title ?? '' }}" class="form-control form-control-lg" placeholder="Titulo">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="form-label text-dark">Descripçao: </label>
                            <textarea name="description" placeholder="Descripção" class="form-control" id="description" rows="3">{{ $dato->description ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-lg btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
