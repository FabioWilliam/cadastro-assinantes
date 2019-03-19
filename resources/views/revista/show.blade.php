@extends('layouts.app')

@section('content')
    <h1>Visualizar Revista</h1>

    <form action="">
        <div class="form-group row">
            <label for="titulo" class="col-4 col-form-label">Título</label>
            <div class="col-7">
                <input type="text" class="form-control" value="{{ $revista->titulo }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="codigo" class="col-4 col-form-label">Código</label>
            <div class="col-2">
                <input type="text" class="form-control" value="{{ $revista->codigo }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="descricao" class="col-4 col-form-label">Descrição</label>
            <div class="col-7">
                <textarea class="form-control" cols="30" rows="4" disabled>{{ $revista->descricao }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="formato" class="col-4 col-form-label">Formato</label>
            <div class="col-6">
                <div class="form-group">
                    <input type="text" value="{{  ($revista->formato == 'D')? 'Digital' : 'Impresso' }}" class="form-control" disabled>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="valor" class="col-4 col-form-label">Valor</label>
            <div class="col-3">
                <input type="text" class="form-control" id="valor" value="{{ $revista->valor }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="vigencia" class="col-4 col-form-label">Vigência</label>
            <div class="col-3">
                <input type="text" class="form-control" value="{{ $revista->vigencia }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="site" class="col-4 col-form-label">Site</label>
            <div class="col-8">
                <input type="url" class="form-control" value="{{ $revista->site }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="capa" class="col-4 col-form-label">Capa</label>
            <div>
                <img src="../../capas/{{ $revista->capa }}" class="rounded" height="120" style="margin-left: 16px">
            </div>
        </div>
        <div class="form-group row">
            <label for="participa_de_promocao" class="col-4 col-form-label">Participa de Promoção</label>
            <div class="col-6">
                <input type="text" value="{{ $revista->participa_de_promocao  == '1' ? 'Sim' : 'Não' }}" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="assuntos" class="col-4 col-form-label">Assuntos</label>
            <div class="col-5">
                <input type="text" class="form-control" value="{{ implode(', ', $revista->assuntos) }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="observacoes" class="col-4 col-form-label">Observações</label>
            <div class="col-7">
                <textarea class="form-control" cols="30" rows="4" disabled>{{ old('observacoes', $revista->observacoes ?? '') }}</textarea>
            </div>
        </div>
        <div class="form-action">
            <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Voltar</a>
        </div>
    </form>
@endsection

