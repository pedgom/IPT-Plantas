<!-- Especie Zona Field -->
<div class="mb-10">
    {!! Form::label('especie_zona', $especieZonaAtributo->getAttributeLabel('especie_zona'), ['class' => 'form-label ']) !!}
    {!! Form::text('especie_zona', null, ['class' => 'form-control form-control-solid '.($errors->has('especie_zona') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('especie_zona')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
