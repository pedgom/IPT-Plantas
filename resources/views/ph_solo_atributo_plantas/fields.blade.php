<!-- Ph Solo Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('ph_solo_atributo_id', $phSoloAtributoPlanta->getAttributeLabel('ph_solo_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('ph_solo_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('ph_solo_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('ph_solo_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Planta Id Field -->
<div class="mb-10">
    {!! Form::label('planta_id', $phSoloAtributoPlanta->getAttributeLabel('planta_id'), ['class' => 'form-label']) !!}
    {!! Form::number('planta_id', null, ['class' => 'form-control form-control-solid '.($errors->has('planta_id') ? 'is-invalid' : '')]) !!}
    @error('planta_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
