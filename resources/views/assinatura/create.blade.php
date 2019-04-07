@extends('layouts.app')

@section('content')
    <h1 class="h2 mb-2">Nova Assinatura</h1>

    @include('layouts.error')

    <form action="{{ route('assinaturas.store') }}" method="POST" novalidate>
        @csrf
        @include('assinatura.form')
        <div class="form-action">
            <input type="submit" value="Cadastrar" class="btn btn-lg btn-primary">
        </div>
    </form>
@endsection
