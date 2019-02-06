@extends('layouts.app')

@section('content')
    <h1 class="h2 mb-2">Novo Assinante</h1>

    @include('assinante.error')

    <form action="{{ route('assinantes.store') }}" method="POST" novalidate>
        @csrf
        @include('assinante.form')
    </form>
@endsection
