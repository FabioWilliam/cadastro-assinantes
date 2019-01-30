@extends('layouts.app')

@section('content')
    <h1>Lista de Assinantes</h1>
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
                    <a href="#">visualizar</a> |
                    <a href="#">editar</a> |
                    <a href="#">apagar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
