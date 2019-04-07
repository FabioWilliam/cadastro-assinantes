@extends('layouts.app')

@section('content')
    <h1>Editar Assinatura</h1>

    @include('layouts.error')

    <form action="{{ route('assinaturas.update', $assinatura->id) }}" method="POST" autocomplete="false" novalidate>
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{ $assinatura->id }}">
        @include('assinatura.form')
        <div class="form-action">
            <input type="submit" value="Salvar" class="btn btn-lg btn-primary">
        </div>
    </form>
@endsection

