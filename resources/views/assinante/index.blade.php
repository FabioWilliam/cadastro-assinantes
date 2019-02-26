@extends('layouts.app')

@section('content')
    <h1 class="h2 mb-2">Lista de Assinantes</h1>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <form action="{{ route('assinantes.batch') }}" method="POST" class="form-list">
        @csrf
        @method('DELETE')
        <input type="hidden" id="assinantes_marcados" name="assinantes_marcados" value="">
        <div class="actions py-2">
            <a href="{{ route('assinantes.create') }}" class="btn btn-primary">Criar Assinante</a>
            <input type="submit" id="remover" value="Excluir Assinantes" class="btn btn-danger" disabled>
            <div class="form-group">
                <select class="form-control col-2" id="search_ativo" name="search_ativo">
                    <option value="todos" {{ $status == 'todos' ? 'selected' : '' }}>Todos</option>
                    <option value="ativos" {{ $status == 'ativos' ? 'selected' : '' }}>Ativos</option>
                    <option value="inativos" {{ $status == 'inativos' ? 'selected' : '' }}>Inativos</option>
                </select>
            </div>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="select_all">
                </th>
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
                    <td>
                        <input type="checkbox" name="assinante[]" class="checkboxItem" value="{{ $assinante->id }}">
                    </td>
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
                            <button type="submit" class="btn btn-outline-primary btn-sm" onclick="javascript: return confirm('Você deseja realmente apagar este assinante?')">remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $assinantes->appends(['status' => $status])->links() }}

@endsection
