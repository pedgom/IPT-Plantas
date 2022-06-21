<!-- Forma Arvore Field -->
<div class="mb-10">
    {!! Form::label('forma_arvore', $formaArvoreAtributo->getAttributeLabel('forma_arvore'), ['class' => 'form-label ']) !!}
    {!! Form::text('forma_arvore', null, ['class' => 'form-control form-control-solid '.($errors->has('forma_arvore') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('forma_arvore')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
