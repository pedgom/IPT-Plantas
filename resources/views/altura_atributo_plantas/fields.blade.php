<!-- Planta Id Field -->
<div class="mb-10">
    {!! Form::label('planta_id', $alturaAtributoPlanta->getAttributeLabel('planta_id'), ['class' => 'form-label']) !!}
    {!! Form::number('planta_id', null, ['class' => 'form-control form-control-solid '.($errors->has('planta_id') ? 'is-invalid' : '')]) !!}
    @error('planta_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Altura Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('altura_atributo_id', $alturaAtributoPlanta->getAttributeLabel('altura_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('altura_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('altura_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('altura_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
