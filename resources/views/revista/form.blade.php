<div class="form-group row">
    <label for="titulo" class="col-4 col-form-label">Título</label>
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
    <label for="formato" class="col-4 col-form-label">Formato</label>
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
        <input type="text" name="valor" id="valor" class="form-control" value="{{ old('valor', $revista->valor ?? '') }}" placeholder="99,99">
    </div>
</div>
<div class="form-group row">
    <label for="vigencia" class="col-4 col-form-label">Vigência</label>
    <div class="col-3">
        <select name="vigencia" id="vigencia" class="form-control">
            <option value="">Selecione...</option>
            @foreach ($vigencia as $key => $value)
                <option value="{{ $key }}" {{ $key == old('vigencia', $revista->vigencia ?? '') ? 'selected' : '' }}>
                {{-- <option value="{{ $key }}" {{ in_array($key, old(['vigencia'], $revista->vigencia ?? [])) ? 'selected' : '' }}> --}}
                    {{ $value }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="site" class="col-4 col-form-label">Site</label>
    <div class="col-8">
        <input type="url" name="site" id="site" class="form-control" value="{{ old('site', $revista->site ?? '') }}" placeholder="https://example.com">
    </div>
</div>
<div class="form-group row">
    <label for="capa" class="col-4 col-form-label">Capa</label>
    <div class="col-6">
        <input type="file" name="capa" id="capa">
    </div>
    @hasSection ('editar')
        <img src="../../capas/{{ $revista->capa }}"  height="70">
    @endif
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
    <label for="assuntos" class="col-4 col-form-label">Assuntos</label>
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
    <label for="observacoes" class="col-4 col-form-label">Observações<span class="field-optional">(opcional)</span></label>
    <div class="col-7">
        <textarea name="observacoes" id="observacoes" class="form-control" cols="30" rows="4" maxlength="500">{{ old('observacoes', $revista->observacoes ?? '') }}</textarea>
    </div>
</div>

