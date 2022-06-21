<!-- Colecao Field -->
<div class="mb-10">
    {!! Form::label('colecao', $colecaoAtributo->getAttributeLabel('colecao'), ['class' => 'form-label ']) !!}
    {!! Form::text('colecao', null, ['class' => 'form-control form-control-solid '.($errors->has('colecao') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('colecao')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
