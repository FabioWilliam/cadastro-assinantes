<div class="form-group row">
    <label for="nome" class="col-4 col-form-label">Nome</label>
    <div class="col-7">
        <input type="text" name="nome" id="nome" class="form-control" maxlength="50" value="{{ old('nome', $assinante->nome ?? '') }}">
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-4 col-form-label">E-mail</label>
    <div class="col-5">
        <input type="email" name="email" id="email" class="form-control" maxlength="60" value="{{ old('email', $assinante->email ?? '') }}" placeholder="nome@dominio.com.br">
    </div>
</div>
<div class="form-group row">
    <label for="senha" class="col-4 col-form-label">Senha</label>
    <div class="col-5">
        <input type="password" name="senha" id="senha" class="form-control" maxlength="60">
    </div>
</div>
<div class="form-group row">
    <label  class="col-4 col-form-label"for="confirma_senha">Confirma Senha</label>
    <div class="col-5">
        <input type="password" name="confirma_senha" id="confirma_senha" class="form-control" maxlength="60">
    </div>
</div>
<div class="form-group row">
    <label for="cpf" class="col-4 col-form-label">CPF</label>
    <div class="col-3">
        <input type="text" name="cpf" id="cpf" class="form-control" maxlength="14" value="{{ old('cpf', $assinante->cpf ?? '') }}" placeholder="999.999.999-99">
    </div>
</div>
<div class="form-group row">
    <label for="sexo" class="col-4 col-form-label">Sexo</label>
    <div class="col-6">
        <div class="form-check">
            <input type="radio" name="sexo" id="masculino" value="M" class="form-check-input" {{ old('sexo', $assinante->sexo ?? '') == 'M' ? 'checked' : '' }}>
            <label for="masculino" class="form-check-label">Masculino</label>
        </div>

        <div class="form-check">
            <input type="radio" name="sexo" id="feminino" value="F" class="form-check-input" {{ old('sexo', $assinante->sexo ?? '') == 'F' ? 'checked' : '' }}>
            <label for="feminino" class="form-check-label">Feminino</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="data_nascimento" class="col-4 col-form-label">Data Nascimento</label>
    <div class="col-3">
        <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" maxlength="10" value="{{ old('data_nascimento', $assinante->data_nascimento ?? '') }}" placeholder="21/03/1970">
    </div>
</div>
<div class="form-group row">
    <label for="cep" class="col-4 col-form-label">CEP</label>
    <div class="col-3">
        <input type="text" name="cep" id="cep" class="form-control" maxlength="9" value="{{ old('cep', $assinante->cep ?? '') }}" placeholder="02435-090">
    </div>
</div>
<div class="form-group row">
    <label for="tipo_logradouro" class="col-4 col-form-label">Endereço</label>
    <div class="col-3">
            <select name="tipo_logradouro" id="tipo_logradouro" class="form-control">
            <option value="">Selecione</option>
            @foreach ($tipos_logradouro as $key => $tipo_logradouro)
                <option value="{{ $key }}" {{ $key == old('tipo_logradouro', $assinante->tipo_logradouro ?? '') ? 'selected' : '' }}>
                {{ $tipo_logradouro }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-5" style="padding-left: 0">
        <input type="text" name="logradouro" id="logradouro" class="form-control" maxlength="60" value="{{ old('logradouro', $assinante->logradouro ?? '') }}">
    </div>
</div>
<div class="form-group row">
    <label for="numero" class="col-4 col-form-label">Número</label>
    <div class="col-3">
        <input type="text" name="numero" id="numero" class="form-control" maxlength="6" value="{{ old('numero', $assinante->numero ?? '') }}" placeholder="999 ou sn">
    </div>
</div>
<div class="form-group row">
    <label for="complemento" class="col-4 col-form-label">Complemento</label>
    <div class="col-3">
        <input type="text" name="complemento" id="complemento" class="form-control" maxlength="20" value="{{ old('complemento', $assinante->complemento ?? '') }}" placeholder="apto 99 bl 1">
    </div>
</div>
<div class="form-group row">
    <label for="bairro" class="col-4 col-form-label">Bairro</label>
    <div class="col-4">
        <input type="text" name="bairro" id="bairro" class="form-control" maxlength="60" value="{{ old('bairro', $assinante->bairro ?? '') }}">
    </div>
</div>
<div class="form-group row">
    <label for="cidade" class="col-4 col-form-label">Cidade</label>
    <div class="col-4">
        <input type="text" name="cidade" id="cidade" class="form-control" maxlength="60" value="{{ old('cidade', $assinante->cidade ?? '') }}">
    </div>
</div>
<div class="form-group row">
    <label for="estado" class="col-4 col-form-label">Estado</label>
    <div class="col-4">
        <select name="estado" id="estado" class="form-control">
            <option value="">Selecione</option>
            @foreach ($estados as $key => $estado)
                <option value="{{ $key }}" {{ $key == old('estado', $assinante->estado ?? '') ? 'selected' : '' }}>
                    {{ $estado }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="telefone" class="col-4 col-form-label">Telefone</label>
    <div class="col-3">
        <input type="text" name="telefone" id="telefone" class="form-control" maxlength="15" value="{{ old('telefone', $assinante->telefone ?? '') }}" placeholder="(99) 99999-9999">
    </div>
</div>
<div class="form-group row">
    <label for="interesses" class="col-4 col-form-label">Interesses</label>
    <div class="col-5">
        <select name="interesses[]" id="interesses" class="form-control" multiple>
            @foreach ($interesses as $key => $value)
                <option value="{{ $key }}" {{ in_array($key, old('interesses', $assinante->interesses ?? [])) ? 'selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="aceita_receber_informacoes" class="col-4 col-form-label">Aceita Receber Informações</label>
    <div class="col-6">
        <div class="form-check" style="padding-top: 8px">
            <input type="checkbox" name="aceita_receber_informacoes" id="aceita_receber_informacoes" value="1"
                {{ old('aceita_receber_informacoes', $assinante->aceita_receber_informacoes ?? '') == '1' ? 'checked' : ''}} class="form-check-input">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="outras_informacoes" class="col-4 col-form-label">Outras Informações</label>
    <div class="col-7">
        <textarea name="outras_informacoes" id="outras_informacoes" class="form-control" cols="30" rows="4" maxlength="500">{{ old('outras_informacoes', $assinante->outras_informacoes ?? '') }}</textarea>
    </div>
</div>
<div class="form-action">
    <input type="submit" value="Cadastrar" class="btn btn-lg btn-primary">
</div>
