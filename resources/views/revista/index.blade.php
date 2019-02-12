@extends('layouts.app')

@section('content')
    <h1 class="h2 mb-2">Lista de Revistas</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="actions py-2">
        <a href="{{ route('revistas.create') }}" class="btn btn-primary">Criar Revista</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Código</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Vigência</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($revistas as $revista)
            <tr>
                <td>{{ $revista->codigo }}</td>
                <td>{{ $revista->titulo }}</td>
                <td>{{ $revista->descricao }}</td>
                <td>{{ $revista->valor }}</td>
                <td>{{ $revista->vigencia }}</td>
                <td>
                    <a href="{{ route('revistas.show', ['id' => $revista->id]) }}" class="btn btn-outline-primary btn-sm">visualizar</a>
                    <a href="{{ route('revistas.edit', ['id' => $revista->id]) }}" class="btn btn-outline-primary btn-sm">editar</a>
                    <form action="{{ route('revistas.destroy', ['id' => $revista->id]) }}" method="POST" style="display: inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm" onclick="javascript: return confirm('Você deseja realmente apagar este revista?')">remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $revistas->links() }}
@endsection
