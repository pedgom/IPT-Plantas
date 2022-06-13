<!-- Name Field -->
<div class="mb-10">
    {!! Form::label('name', $soloAtributo->getAttributeLabel('name'), ['class' => 'form-label ']) !!}
    {!! Form::text('name', null, ['class' => 'form-control form-control-solid '.($errors->has('name') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
