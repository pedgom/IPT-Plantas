<!-- Solo Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('solo_atributo_id', $soloAtributoPlanta->getAttributeLabel('solo_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('solo_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('solo_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('solo_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Planta Id Field -->
<div class="mb-10">
    {!! Form::label('planta_id', $soloAtributoPlanta->getAttributeLabel('planta_id'), ['class' => 'form-label']) !!}
    {!! Form::number('planta_id', null, ['class' => 'form-control form-control-solid '.($errors->has('planta_id') ? 'is-invalid' : '')]) !!}
    @error('planta_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
