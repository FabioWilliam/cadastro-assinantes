@extends('layouts.app')

@section('content')
    <h1>Exibir Assinante</h1>

    <form action="">
        <div class="form-group row">
            <label for="nome" class="col-4 col-form-label">Nome</label>
            <div class="col-7">
                <input type="text" value="{{ $assinante->nome }}" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-4 col-form-label">E-mail</label>
            <div class="col-5">
                <input type="email" value="{{ $assinante->email }}" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="cpf" class="col-4 col-form-label">CPF</label>
            <div class="col-3">
                <input type="text" value="{{ $assinante->cpf }}" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="sexo" class="col-4 col-form-label">Sexo</label>
            <div class="col-3">
                    <input type="text" value="{{ $assinante->sexo == 'M' ? 'Masculino' : 'Feminino' }}" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="data_nascimento" class="col-4 col-form-label">Data Nascimento</label>
            <div class="col-3">
                <input type="text" value="{{ $assinante->data_nascimento }}" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="cep" class="col-4 col-form-label">CEP</label>
            <div class="col-3">
                <input type="text" value="{{ $assinante->cep }}" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="tipo_logradouro" class="col-4 col-form-label">Endereço</label>
            <div class="col-7">
                <input type="text" name="logradouro" id="logradouro" class="form-control" value="{{ $tipos_logradouro[$assinante->tipo_logradouro] }} {{ $assinante->logradouro }}, {{ $assinante->numero }} {{ $assinante->complemento ? '- ' . $assinante->complemento : '' }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="bairro" class="col-4 col-form-label">Bairro</label>
            <div class="col-4">
                <input type="text" value="{{ $assinante->bairro }}" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="cidade" class="col-4 col-form-label">Cidade</label>
            <div class="col-4">
                <input type="text" value="{{ $assinante->cidade }}" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="estado" class="col-4 col-form-label">Estado</label>
            <div class="col-4">
                <input type="text"  class="form-control" value="{{ $estados[$assinante->estado] }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="telefone" class="col-4 col-form-label">Telefone</label>
            <div class="col-3">
                <input type="text" value="{{ $assinante->telefone }}" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="interesses" class="col-4 col-form-label">Interesses</label>
            <div class="col-8">
                <input type="text" class="form-control" value="{{ implode(', ', $assinante->interesses) }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="aceita_receber_informacoes" class="col-4 col-form-label">Aceita Receber Informações</label>
            <div class="col-2"  style="padding-top: 8px">
                    <input type="text" class="form-control" value="{{ $assinante->aceita_receber_informacoes == '1' ? 'Sim' : 'Não' }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="ativo" class="col-4 col-form-label">Ativo</label>
            <div class="col-2"  style="padding-top: 8px">
                <input type="text" class="form-control" value="{{ $assinante->ativo == '1' ? 'Sim' : 'Não' }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="outras_informacoes" class="col-4 col-form-label">Outras Informações</label>
            <div class="col-7 text-muted">
                {{ $assinante->outras_informacoes }}
            </div>
        </div>
        <div class="form-action">
            <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Voltar</a>
        </div>
    </form>

@endsection
