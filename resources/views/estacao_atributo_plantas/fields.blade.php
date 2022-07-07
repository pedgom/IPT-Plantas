<!-- Estacao Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('estacao_atributo_id', $estacaoAtributoPlanta->getAttributeLabel('estacao_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('estacao_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('estacao_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('estacao_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Planta Id Field -->
<div class="mb-10">
    {!! Form::label('planta_id', $estacaoAtributoPlanta->getAttributeLabel('planta_id'), ['class' => 'form-label']) !!}
    {!! Form::number('planta_id', null, ['class' => 'form-control form-control-solid '.($errors->has('planta_id') ? 'is-invalid' : '')]) !!}
    @error('planta_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
