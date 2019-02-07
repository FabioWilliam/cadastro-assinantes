@extends('layouts.app')

@section('content')
    <h1>Editar Assinante</h1>

    @include('assinante.error')

    <form action="{{ route('assinantes.update', $assinante->id) }}" method="POST" autocomplete="false" novalidate>
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{ $assinante->id }}">
        @include('assinante.form')
        <div class="form-action">
            <input type="submit" value="Salvar" class="btn btn-lg btn-primary">
        </div>
    </form>
@endsection

