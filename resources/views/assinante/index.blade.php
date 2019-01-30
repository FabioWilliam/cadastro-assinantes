@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Lista de Assinantes</h1>

    <div class="actions mb-3">
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
                    <a href="{{ route('assinantes.show', ['id' => $assinante->id]) }}">visualizar</a> |
                    <a href="{{ route('assinantes.edit', ['id' => $assinante->id]) }}">editar</a> |
                    <a href="{{ route('assinantes.destroy', ['id' => $assinante->id]) }}">apagar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
