<!-- Origem Relacao Field -->
<div class="mb-10">
    {!! Form::label('origem_relacao', $origemRelacaoAtributo->getAttributeLabel('origem_relacao'), ['class' => 'form-label ']) !!}
    {!! Form::text('origem_relacao', null, ['class' => 'form-control form-control-solid '.($errors->has('origem_relacao') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('origem_relacao')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
