<!-- Name Field -->
<div class="mb-10">
    {!! Form::label('genero', $generoAtributo->getAttributeLabel('genero'), ['class' => 'form-label ']) !!}
    {!! Form::text('genero', null, ['class' => 'form-control form-control-solid '.($errors->has('genero') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
