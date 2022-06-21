<!-- Especie Quercus Field -->
<div class="mb-10">
    {!! Form::label('especie_quercus', $especieQuercusAtributo->getAttributeLabel('especie_quercus'), ['class' => 'form-label ']) !!}
    {!! Form::text('especie_quercus', null, ['class' => 'form-control form-control-solid '.($errors->has('especie_quercus') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('especie_quercus')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
