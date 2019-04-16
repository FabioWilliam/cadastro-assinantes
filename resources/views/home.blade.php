@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Assinantes</h5>
                    <p class="card-text">Controle os dados cadastrais</p>
                    <a href="{{ route('assinantes.index') }}" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Revistas</h5>
                    <p class="card-text">Altere os dados cadastrais das Revistas</p>
                    <a href="{{ route('revistas.index') }}" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Assinaturas</h5>
                        <p class="card-text">Altere as assinaturas dos seus clientes</p>
                        <a href="{{ route('assinaturas.index') }}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
