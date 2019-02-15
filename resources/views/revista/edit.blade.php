@extends('layouts.app')

@section('editar')
    <img src="\capas\" . $revista->capas>
@endsection

@section('content')
    <h1>Editar Revista</h1>

    @include('layouts.error')

    <form action="{{ route('revistas.update', $revista->id) }}" method="POST" enctype="multipart/form-data" autocomplete="false" novalidate>
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{ $revista->id }}">
        @include('revista.form')
        <div class="form-action">
            <input type="submit" value="Salvar" class="btn btn-lg btn-primary">
        </div>
    </form>
@endsection

