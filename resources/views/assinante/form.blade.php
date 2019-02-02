<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" class="form-control" maxlength="50" value="{{ old('nome') }}">
</div>
<div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" class="form-control" maxlength="60" value="{{ old('email') }}" placeholder="nome@dominio.com.br">
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
    <input type="text" name="cpf" id="cpf" class="form-control" maxlength="14" value="{{ old('cpf') }}" placeholder="999.999.999-99">
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
    <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" maxlength="10" value="{{ old('data_nascimento') }}" placeholder="21/03/1970">
</div>
<div class="form-group">
    <label for="cep">CEP</label>
    <input type="text" name="cep" id="cep" class="form-control" maxlength="9" value="{{ old('cep') }}" placeholder="02435-090">
</div>
<div class="form-row">
    <div class="form-group col-md-2">
        <label for="tipo_logradouro">Tipo</label>
        <select name="tipo_logradouro" id="tipo_logradouro" class="form-control">
            <option value="">Selecione</option>
            @foreach ($tipos_logradouro as $key => $tipo_logradouro)
                <option value="{{ $key }}" {{ $key == old('tipo_logradouro') ? 'selected' : '' }}>
                {{ $tipo_logradouro }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-8">
        <label for="logradouro">Endereço</label>
        <input type="text" name="logradouro" id="logradouro" class="form-control" maxlength="60" value="{{ old('logradouro') }}">
    </div>
    <div class="form-group col-md-2">
        <label for="numero">Número</label>
        <input type="text" name="numero" id="numero" class="form-control" maxlength="6" value="{{ old('numero') }}" placeholder="999 ou sn">
    </div>
</div>
   <div class="form-row">
    <div class="form-group">
        <label for="complemento">Complemento</label>
        <input type="text" name="complemento" id="complemento" class="form-control" maxlength="20" value="{{ old('complemento') }}" placeholder="apto 99 bl 1">
    </div>
</div>
<div class="form-group">
    <label for="bairro">Bairro</label>
    <input type="text" name="bairro" id="bairro" class="form-control" maxlength="60" value="{{ old('bairro') }}">
</div>
<div class="form-group">
    <label for="cidade">Cidade</label>
    <input type="text" name="cidade" id="cidade" class="form-control" maxlength="60" value="{{ old('cidade') }}">
</div>
<div class="form-group">
    <label for="estado">Estado</label>
    <select name="estado" id="estado" class="form-control">
        <option value="">Selecione</option>
        @foreach ($estados as $key => $estado)
            <option value="{{ $key }}" {{ $key == old('estado') ? 'selected' : '' }}>
                {{ $estado }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" name="telefone" id="telefone" class="form-control" maxlength="15" value="{{ old('telefone') }}" placeholder="(99) 99999-9999">
</div>
<div class="form-group">
    <label for="interesses">Interesses</label>
    <select name="interesses[]" id="interesses" class="form-control" multiple>
        @foreach ($interesses as $key => $value)
            <option value="{{ $key }}" {{ in_array($key, old('interesses', [])) ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
   </select>
</div>
<div class="form-group">
    <label for="aceita_receber_informacoes">Aceita Receber Informações</label>
    <input type="checkbox" name="aceita_receber_informacoes" id="aceita_receber_informacoes" value="1"
        {{ old('aceita_receber_informacoes') == '1' ? 'checked' : ''}}>
</div>
<div class="form-group">
    <label for="outras_informacoes">Outras Informações</label>
    <textarea name="outras_informacoes" id="outras_informacoes" class="form-control" cols="30" rows="4" maxlength="500">{{ old('outras_informacoes') }}</textarea>
</div>
<div class="form-group">
    <input type="submit" value="Cadastrar" class="btn btn-primary">
</div>
