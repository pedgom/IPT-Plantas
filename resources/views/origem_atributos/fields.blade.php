<!-- Pais Field -->
<div class="mb-10">
    {!! Form::label('pais', $origemAtributo->getAttributeLabel('pais'), ['class' => 'form-label ']) !!}
    {!! Form::text('pais', null, ['class' => 'form-control form-control-solid '.($errors->has('pais') ? 'is-invalid' : ''),'maxlength' => 2]) !!}
    @error('pais')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Continente Field -->
<div class="mb-10">
    {!! Form::label('continente', $origemAtributo->getAttributeLabel('continente'), ['class' => 'form-label ']) !!}
    {!! Form::text('continente', null, ['class' => 'form-control form-control-solid '.($errors->has('continente') ? 'is-invalid' : ''),'maxlength' => 2]) !!}
    @error('continente')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
