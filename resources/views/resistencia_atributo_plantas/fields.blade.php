<!-- Resistencia Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('resistencia_atributo_id', $resistenciaAtributoPlanta->getAttributeLabel('resistencia_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('resistencia_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('resistencia_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('resistencia_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Planta Id Field -->
<div class="mb-10">
    {!! Form::label('planta_id', $resistenciaAtributoPlanta->getAttributeLabel('planta_id'), ['class' => 'form-label']) !!}
    {!! Form::number('planta_id', null, ['class' => 'form-control form-control-solid '.($errors->has('planta_id') ? 'is-invalid' : '')]) !!}
    @error('planta_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
