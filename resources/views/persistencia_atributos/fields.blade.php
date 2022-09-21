<!-- Name Field -->
<div class="mb-10">
    {!! Form::label('persistencia', $persistenciaAtributo->getAttributeLabel('persistencia'), ['class' => 'form-label ']) !!}
    {!! Form::text('persistencia', null, ['class' => 'form-control form-control-solid '.($errors->has('persistencia') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
