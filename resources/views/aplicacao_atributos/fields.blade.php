<!-- Aplicacao Field -->
<div class="mb-10">
    {!! Form::label('aplicacao', $aplicacaoAtributo->getAttributeLabel('aplicacao'), ['class' => 'form-label ']) !!}
    {!! Form::text('aplicacao', null, ['class' => 'form-control form-control-solid '.($errors->has('aplicacao') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('aplicacao')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
