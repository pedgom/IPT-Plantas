<!-- Densidade Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('densidade_atributo_id', $densidadeAtributoPlanta->getAttributeLabel('densidade_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('densidade_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('densidade_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('densidade_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Planta Id Field -->
<div class="mb-10">
    {!! Form::label('planta_id', $densidadeAtributoPlanta->getAttributeLabel('planta_id'), ['class' => 'form-label']) !!}
    {!! Form::number('planta_id', null, ['class' => 'form-control form-control-solid '.($errors->has('planta_id') ? 'is-invalid' : '')]) !!}
    @error('planta_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
