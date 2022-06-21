<!-- Uso Field -->
<div class="mb-10">
    {!! Form::label('uso', $usoAtributo->getAttributeLabel('uso'), ['class' => 'form-label ']) !!}
    {!! Form::text('uso', null, ['class' => 'form-control form-control-solid '.($errors->has('uso') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('uso')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
