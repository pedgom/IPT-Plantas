<!-- Name Field -->
<div class="mb-10">
    {!! Form::label('forma_arbusto', $formaArbustoAtributo->getAttributeLabel('forma_herbacea'), ['class' => 'form-label ']) !!}
    {!! Form::text('forma_arbusto', null, ['class' => 'form-control form-control-solid '.($errors->has('forma_herbacea') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
