<!-- Diametro Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('diametro_atributo_id', $diametroAtributoPlanta->getAttributeLabel('diametro_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('diametro_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('diametro_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('diametro_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Planta Id Field -->
<div class="mb-10">
    {!! Form::label('planta_id', $diametroAtributoPlanta->getAttributeLabel('planta_id'), ['class' => 'form-label']) !!}
    {!! Form::number('planta_id', null, ['class' => 'form-control form-control-solid '.($errors->has('planta_id') ? 'is-invalid' : '')]) !!}
    @error('planta_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
