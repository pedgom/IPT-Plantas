<!-- Luz Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('luz_atributo_id', $luzAtributoPlanta->getAttributeLabel('luz_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('luz_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('luz_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('luz_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Planta Id Field -->
<div class="mb-10">
    {!! Form::label('planta_id', $luzAtributoPlanta->getAttributeLabel('planta_id'), ['class' => 'form-label']) !!}
    {!! Form::number('planta_id', null, ['class' => 'form-control form-control-solid '.($errors->has('planta_id') ? 'is-invalid' : '')]) !!}
    @error('planta_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
