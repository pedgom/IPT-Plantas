<!-- Categoria Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('categoria_atributo_id', $categoriaAtributoPlanta->getAttributeLabel('categoria_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('categoria_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('categoria_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('categoria_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Planta Id Field -->
<div class="mb-10">
    {!! Form::label('planta_id', $categoriaAtributoPlanta->getAttributeLabel('planta_id'), ['class' => 'form-label']) !!}
    {!! Form::number('planta_id', null, ['class' => 'form-control form-control-solid '.($errors->has('planta_id') ? 'is-invalid' : '')]) !!}
    @error('planta_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
