<!-- Abreviatura Field -->
<div class="mb-10">
    {!! Form::label('abreviatura', $planta->getAttributeLabel('abreviatura'), ['class' => 'form-label ']) !!}
    {!! Form::text('abreviatura', null, ['class' => 'form-control form-control-solid '.($errors->has('abreviatura') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('abreviatura')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Nome Botanico Field -->
<div class="mb-10">
    {!! Form::label('nome_botanico', $planta->getAttributeLabel('nome_botanico'), ['class' => 'form-label ']) !!}
    {!! Form::text('nome_botanico', null, ['class' => 'form-control form-control-solid '.($errors->has('nome_botanico') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('nome_botanico')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Nome Comum Field -->
<div class="mb-10">
    {!! Form::label('nome_comum', $planta->getAttributeLabel('nome_comum'), ['class' => 'form-label ']) !!}
    {!! Form::text('nome_comum', null, ['class' => 'form-control form-control-solid '.($errors->has('nome_comum') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('nome_comum')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Tempo Crescimento Field -->
<div class="mb-10">
    {!! Form::label('tempo_crescimento', $planta->getAttributeLabel('tempo_crescimento'), ['class' => 'form-label ']) !!}
    {!! Form::text('tempo_crescimento', null, ['class' => 'form-control form-control-solid '.($errors->has('tempo_crescimento') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('tempo_crescimento')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Notas Field -->
<div class="mb-10">
    {!! Form::label('notas', $planta->getAttributeLabel('notas'), ['class' => 'form-label ']) !!}
    {!! Form::text('notas', null, ['class' => 'form-control form-control-solid '.($errors->has('notas') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('notas')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Curiosidades Field -->
<div class="mb-10">
    {!! Form::label('curiosidades', $planta->getAttributeLabel('curiosidades'), ['class' => 'form-label ']) !!}
    {!! Form::text('curiosidades', null, ['class' => 'form-control form-control-solid '.($errors->has('curiosidades') ? 'is-invalid' : ''),'maxlength' => 255]) !!}
    @error('curiosidades')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Altura Atributo Planta Id Field -->
<div class="mb-10">
    {!! Form::label('altura_atributo_planta_id', $planta->getAttributeLabel('altura_atributo_planta_id'), ['class' => 'form-label']) !!}
    {!! Form::number('altura_atributo_planta_id', null, ['class' => 'form-control form-control-solid '.($errors->has('altura_atributo_planta_id') ? 'is-invalid' : '')]) !!}
    @error('altura_atributo_planta_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
