<div class="form-group row">
    <label for="assinante" class="col-4 col-form-label">Assinante</label>
    <div class="col-5">
        <input type="text" name="assinante" id="nome_assinante" class="form-control" value="{{ old('assinante', $assinatura->assinante->nome ?? '') }}">
        <input type="hidden" name="assinante_id" id="assinante_id" value="{{ old('assinante_id', $assinatura->assinante_id ?? '') }}">
    </div>
</div>
<div class="form-group row">
    <label for="revista" class="col-4 col-form-label">Revista</label>
    <div class="col-5">
        <select name="revista" id="revista" class="form-control">
            <option value="">Selecione</option>
            @foreach ($revistas as $revista)
                <option value="{{ $revista->id }}" data-valor="{{ $revista->valor }}" {{ $revista->id == old('revista', $assinatura->revista_id ?? '') ? 'selected' : '' }}>
                    {{ $revista->titulo }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="status" class="col-4 col-form-label">Status</label>
    <div class="col-4">
        <select name="status" id="status" class="form-control">
            <option value="">Selecione</option>
            @foreach ($status as $key => $statusAssinatura)
                <option value="{{ $key }}" {{ $key == old('status', $assinatura->status ?? '') ? 'selected' : '' }}>
                    {{ $statusAssinatura }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="valor" class="col-4 col-form-label">Valor</label>
    <div class="col-3">
        <input type="text" name="valor" id="valor" class="form-control" value="{{ old('valor', $assinatura->revista->valor ?? '') }}" disabled>
    </div>
</div>

