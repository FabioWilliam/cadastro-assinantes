@extends('layouts.app')

@section('content')
    <h1 class="h2 mb-2">Lista de Assinantes</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="actions py-2">
        <a href="{{ route('assinantes.create') }}" class="btn btn-primary">Criar Assinante</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assinantes as $assinante)
            <tr>
                <td>{{ $assinante->id }}</td>
                <td>{{ $assinante->nome }}</td>
                <td>{{ $assinante->email }}</td>
                <td>{{ $assinante->telefone }}</td>
                <td>{{ $assinante->cpf }}</td>
                <td>
                    <a href="{{ route('assinantes.show', ['id' => $assinante->id]) }}" class="btn btn-outline-primary btn-sm">visualizar</a>
                    <a href="{{ route('assinantes.edit', ['id' => $assinante->id]) }}" class="btn btn-outline-primary btn-sm">editar</a>
                    <form action="{{ route('assinantes.destroy', ['id' => $assinante->id]) }}" method="POST" style="display: inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $assinantes->links() }}
@endsection
