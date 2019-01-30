@extends('layouts.app')

@section('content')
    <h1>Novo Assinante</h1>
    <form action="{{ route('assinantes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" maxlength="50">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" maxlength="60">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" maxlength="60">
        </div>
        <div class="form-group">
            <label for="confirma_senha">Confirma Senha</label>
            <input type="password" name="confirma_senha" id="confirma_senha" class="form-control" maxlength="60">
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" maxlength="14">
        </div>
        <div class="form-group">
            <label for="sexo">Sexo</label>
            <input type="radio" name="sexo" id="masculino" value="M">
            <label for="masculino">Masculino</label>
            <input type="radio" name="sexo" id="feminino" value="F">
            <label for="feminino">Feminino</label>
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data Nascimento</label>
            <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" maxlength="10">
        </div>
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control" maxlength="9">
        </div>
        <div class="form-group">
            <label for="tipo_logradouro">Endereço</label>
            <select name="tipo_logradouro" id="tipo_logradouro" class="form-control">
                <option value="">Selecione</option>
                <option value="R">Rua</option>
                <option value="AV">Avenida</option>
                <option value="AL">Alameda</option>
                <option value="Q">Quadra</option>
                <option value="RES">Residencial</option>
                <option value="OUTROS">Outros</option>
            </select>
            <input type="text" name="logradouro" id="logradouro" class="form-control" maxlength="60">
        </div>
        <div class="form-group">
            <label for="numero">Número</label>
            <input type="text" name="numero" id="numero" class="form-control" maxlength="6">
        </div>
        <div class="form-group">
            <label for="complemento">Complemento</label>
            <input type="text" name="complemento" id="complemento" class="form-control" maxlength="20">
        </div>
        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro" class="form-control" maxlength="60">
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="form-control" maxlength="60">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option value="">Selecione</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AM">Amazonas</option>
                <option value="AP">Amapá</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RO">Rondônia</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SE">Sergipe</option>
                <option value="SP">São Paulo</option>
                <option value="TO">Tocantins</option>
            </select>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" maxlength="15">
        </div>
        <div class="form-group">
            <label for="interesses">Interesses</label>
            <select name="interesses" id="interesses" class="form-control" multiple>
                <option value="leitura">Leitura</option>
                <option value="esporte">Esporte</option>
                <option value="academia">Academia</option>
                <option value="teatro">Teatro</option>
                <option value="ioga">Ioga</option>
                <option value="cinema">Cinema</option>
                <option value="dança">Dança</option>
                <option value="televisão">Televisão</option>
                <option value="jogos">Jogos</option>
                <option value="carros">Carros</option>
           </select>
        </div>
        <div class="form-group">
            <label for="aceita_receber_informacoes">Aceita Receber Informações</label>
            <input type="checkbox" name="aceita_receber_informacoes" id="aceita_receber_informacoes">
        </div>
        <div class="form-group">
            <label for="outras_informacoes">Outras Informações</label>
            <textarea name="outras_informacoes" id="outras_informacoes" class="form-control" cols="30" rows="4"  maxlength="500"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </div>
    </form>
@endsection
