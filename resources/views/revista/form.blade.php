<div class="form-group row">
    <label for="nome" class="col-4 col-form-label">Título</label>
    <div class="col-7">
        <input type="text" name="titulo" id="titulo" class="form-control" maxlength="50" value="{{ old('titulo', $revista->titulo ?? '') }}">
    </div>
</div>
<div class="form-group row">
    <label for="codigo" class="col-4 col-form-label">Código</label>
    <div class="col-2">
            <input type="text" name="codigo" id="codigo" class="form-control" maxlength="3" value="{{ old('codigo', $revista->codigo ?? '') }}">
    </div>
</div>
<div class="form-group row">
    <label for="descricao" class="col-4 col-form-label">Descrição</label>
    <div class="col-7">
        <textarea name="descricao" id="descricao" class="form-control" cols="30" rows="4" maxlength="500">{{ old('descricao', $revista->descricao ?? '') }}</textarea>
    </div>
</div>
<div class="form-group row">
    <label for="formato" class="col-4 col-form-label">formato</label>
    <div class="col-6">
        <div class="form-check">
            <input type="radio" name="formato" id="impresso" value="I" class="form-check-input" {{ old('formato', $revista->formato ?? '') == 'I' ? 'checked' : '' }}>
            <label for="impresso" class="form-check-label">Impressa</label>
        </div>
        <div class="form-check">
            <input type="radio" name="formato" id="digital" value="D" class="form-check-input" {{ old('formato', $revista->formato ?? '') == 'D' ? 'checked' : '' }}>
            <label for="digital" class="form-check-label">digital</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="valor" class="col-4 col-form-label">Valor</label>
    <div class="col-3">
        <input type="number" name="valor" id="valor" class="form-control" value="{{ old('valor', $revista->valor ?? '') }}" placeholder="99,99">
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-4 col-form-label">Site</label>
    <div class="col-8">
        <input type="url" name="site" id="site" class="form-control" value="{{ old('site', $revista->url ?? '') }}" placeholder="https://example.com">
    </div>
</div>

<div class="input-group mb-3">
    <div class="input-group-append">
        <span class="input-group-text" id="capaAddon">Foto da Capa</span>
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="capa">
        <label class="custom-file-label" for="capa" aria-describedby="capaAddon">Escola o arquivo</label>
    </div>
</div>
<div class="form-group row">
    <label for="participa_de_promocao" class="col-4 col-form-label">Participa de Promoção</label>
    <div class="col-6">
        <div class="form-check" style="padding-top: 8px">
            <input type="checkbox" name="participa_de_promocao" id="participa_de_promocao" value="1"
                {{ old('participa_de_promocao', $revista->participa_de_promocao ?? '') == '1' ? 'checked' : ''}} class="form-check-input">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="assuntos" class="col-4 col-form-label">assuntos</label>
    <div class="col-5">
        <select name="assuntos[]" id="assuntos" class="form-control" multiple>
            @foreach ($assuntos as $key => $value)
                <option value="{{ $key }}" {{ in_array($key, old('assuntos', $revista->assuntos ?? [])) ? 'selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-muted">Escolha pelo menos 2 assuntos</small>
    </div>
</div>
<div class="form-group row">
    <label for="observacoes" class="col-4 col-form-label">Outras Informações <span class="field-optional">(opcional)</span></label>
    <div class="col-7">
        <textarea name="observacoes" id="observacoes" class="form-control" cols="30" rows="4" maxlength="500">{{ old('observacoes', $revista->outras_informacoes ?? '') }}</textarea>
    </div>
</div>





