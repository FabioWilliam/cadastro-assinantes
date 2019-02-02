@extends('layouts.app')

@section('content')
    <h1>Editar Assinante</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('assinantes.update', $assinante->id) }}" method="POST" autocomplete="false" novalidate>
        @csrf
        @method('PATCH')
        @include('assinante.form')
    </form>
@endsection
