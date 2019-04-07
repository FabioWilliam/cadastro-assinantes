@extends('layouts.app')

@section('content')
    <h1 class="h2 mb-2">Lista de Assinaturas</h1>

    @if (Session::has('message'))
        <div class="alert alert-{{ session('status') ? 'success' : 'danger'}}">
            {{ session('message') }}
        </div>
    @endif

    <form id="excluir_itens_do_formulario" action="{{ route('assinaturas.batch') }}" method="POST" class="form-list">
        @csrf
        @method('DELETE')
        <input type="hidden" value="" id="itens_marcados" name="itens_marcados">
    </form>

    <div class="actions py-2">
        <a href="{{ route('assinaturas.create') }}" class="btn btn-primary">Criar Assinatura</a>
        <input type="button" id="remover" value="Excluir assinaturas" class="btn btn-danger" disabled>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="select_all">
                </th>
                <th>#</th>
                <th>Assinante</th>
                <th>Revista</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Data</th>
                <th>Ip</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assinaturas as $assinatura)
                <tr>
                    <td>
                        <input type="checkbox" name="assinatura[]" class="checkboxItem" value="{{ $assinatura->id }}">
                    </td>
                    <td>{{ $assinatura->id }}</td>
                    <td>{{ $assinatura->assinante->nome }}</td>
                    <td>{{ $assinatura->revista->titulo }}</td>
                    <td class="text-right">{{ $assinatura->revista->valor }}</td>
                    <td>{{ $assinatura->status }}</td>
                    <td>{{ $assinatura->getDataAssinatura() }}</td>
                    <td>{{ $assinatura->ip }}</td>
                    <td style="width: 240px">
                        <a href="{{ route('assinaturas.show', ['id' => $assinatura->id]) }}" class="btn btn-outline-primary btn-sm">visualizar</a>
                        <a href="{{ route('assinaturas.edit', ['id' => $assinatura->id]) }}" class="btn btn-outline-primary btn-sm">editar</a>
                        <form action="{{ route('assinaturas.destroy', ['id' => $assinatura->id]) }}" method="POST" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-primary btn-sm" onclick="javascript: return confirm('Você deseja realmente apagar este assinatura?')">remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $assinaturas->links() }}

@endsection
