@extends('layouts.app')

@section('content')
<h1>Exibir Assinatura</h1>

<div class="form-group row">
    <label for="nome" class="col-4 col-form-label">Nome</label>
    <div class="col-7">
        {{ $assinatura->assinante->nome }}
    </div>
</div>
<div class="form-group row">
    <label for="revista" class="col-4 col-form-label">Revista</label>
    <div class="col-6">
        {{ $assinatura->revista->titulo }}
    </div>
</div>
<div class="form-group row">
    <label for="status" class="col-4 col-form-label">Status</label>
    <div class="col-4">
        {{ $assinatura->status }}
    </div>
</div>
<div class="form-group row">
    <label for="valor" class="col-4 col-form-label">Valor</label>
    <div class="col-3">
        R$ {{ $assinatura->revista->valor }}
    </div>
</div>
<div class="form-group row">
    <label for="valor" class="col-4 col-form-label">Data</label>
    <div class="col-3">
        {{ $assinatura->getDataAssinatura()  }}
    </div>
</div>
<div class="form-group row">
    <label for="valor" class="col-4 col-form-label">Ip</label>
    <div class="col-3">
        {{ $assinatura->ip }}
    </div>
</div>
<div class="form-action">
    <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Voltar</a>
</div>

@endsection
