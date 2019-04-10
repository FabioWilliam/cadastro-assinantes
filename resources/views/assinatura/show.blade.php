@extends('layouts.app')

@section('content')
<h1>Exibir Assinatura</h1>
<form action="">
    <div class="form-group row">
        <label for="assinante" class="col-4 col-form-label">Assinante</label>
        <div class="col-5">
            <input type="text" name="assinante" id="assinante" class="form-control" value="{{ $assinatura->assinante->nome }}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="revista" class="col-4 col-form-label">Revista</label>
        <div class="col-5">
            <input type="text" name="revista" id="revista" class="form-control" value="{{ $assinatura->revista->titulo }}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-4 col-form-label">Status</label>
        <div class="col-4">
            <input type="text" name="status" id="status" class="form-control" value="{{ $assinatura->status}}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="valor" class="col-4 col-form-label">Valor</label>
        <div class="col-3">
            <input type="text" name="valor" id="valor" class="form-control" value="R$ {{ $assinatura->revista->valor}}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="data_assinatura" class="col-4 col-form-label">Data</label>
        <div class="col-3">
            <input type="text" name="data_assinatura" id="data_assinatura" class="form-control" value="{{ $assinatura->getDataAssinatura()  }}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="ip" class="col-4 col-form-label">IP</label>
        <div class="col-3">
            <input type="text" name="ip" id="ip" class="form-control" value="{{ $assinatura->ip }}" disabled>
        </div>
    </div>
    <div class="form-action">
        <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Voltar</a>
    </div>
</form>

@endsection
