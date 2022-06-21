<!-- Situacao Ecologica Field -->
<div class="mb-10">
    {!! Form::label('situacao_ecologica', $situacaoEcologicaAtributo->getAttributeLabel('situacao_ecologica'), ['class' => 'form-label ']) !!}
    {!! Form::text('situacao_ecologica', null, ['class' => 'form-control form-control-solid '.($errors->has('situacao_ecologica') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('situacao_ecologica')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
