<!-- Name Field -->
<div class="mb-10">
    {!! Form::label('Ordem', $ordemAtributo->getAttributeLabel('Ordem'), ['class' => 'form-label ']) !!}
    {!! Form::text('ordem', null, ['class' => 'form-control form-control-solid '.($errors->has('ordem') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
