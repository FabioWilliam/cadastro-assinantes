@extends('layouts.app')

@section('content')
    <h1 class="h2 mb-2">Novo Assinante</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('assinantes.store') }}" method="POST" novalidate>
        @csrf
        @include('assinante.form')
    </form>
@endsection
