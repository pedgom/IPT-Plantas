<!-- Agua Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('agua_atributo_id', $aguaAtributoPlanta->getAttributeLabel('agua_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('agua_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('agua_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('agua_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Planta Id Field -->
<div class="mb-10">
    {!! Form::label('planta_id', $aguaAtributoPlanta->getAttributeLabel('planta_id'), ['class' => 'form-label']) !!}
    {!! Form::number('planta_id', null, ['class' => 'form-control form-control-solid '.($errors->has('planta_id') ? 'is-invalid' : '')]) !!}
    @error('planta_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
