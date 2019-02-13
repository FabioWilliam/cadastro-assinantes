@extends('layouts.app')

@section('content')
    <h1 class="h2 mb-2">Nova Revista</h1>

    @include('layouts.error')

    <form action="{{ route('revistas.store') }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        @include('revista.form')
        <div class="form-action">
            <input type="submit" value="Cadastrar" class="btn btn-lg btn-primary">
        </div>
    </form>
@endsection
