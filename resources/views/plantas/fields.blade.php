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


<!-- Descritor Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('descritor_atributo_id', $planta->getAttributeLabel('descritor_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('descritor_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('descritor_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('descritor_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Ordem Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('ordem_atributo_id', $planta->getAttributeLabel('ordem_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('ordem_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('ordem_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('ordem_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Familia Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('familia_atributo_id', $planta->getAttributeLabel('familia_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('familia_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('familia_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('familia_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Genero Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('genero_atributo_id', $planta->getAttributeLabel('genero_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('genero_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('genero_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('genero_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Situacao Ecologica Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('situacao_ecologica_atributo_id', $planta->getAttributeLabel('situacao_ecologica_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('situacao_ecologica_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('situacao_ecologica_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('situacao_ecologica_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Persistencia Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('persistencia_atributo_id', $planta->getAttributeLabel('persistencia_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('persistencia_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('persistencia_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('persistencia_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- O Relacao Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('o_relacao_atributo_id', $planta->getAttributeLabel('o_relacao_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('o_relacao_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('o_relacao_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('o_relacao_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Usos Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('usos_atributo_id', $planta->getAttributeLabel('usos_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('usos_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('usos_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('usos_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Aplicacoes Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('aplicacoes_atributo_id', $planta->getAttributeLabel('aplicacoes_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('aplicacoes_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('aplicacoes_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('aplicacoes_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Colecoes Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('colecoes_atributo_id', $planta->getAttributeLabel('colecoes_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('colecoes_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('colecoes_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('colecoes_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Forma Arv Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('forma_arv_atributo_id', $planta->getAttributeLabel('forma_arv_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('forma_arv_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('forma_arv_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('forma_arv_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Forma Arb Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('forma_arb_atributo_id', $planta->getAttributeLabel('forma_arb_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('forma_arb_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('forma_arb_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('forma_arb_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Forma Herb Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('forma_herb_atributo_id', $planta->getAttributeLabel('forma_herb_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('forma_herb_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('forma_herb_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('forma_herb_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Cor Sintese Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('cor_sintese_atributo_id', $planta->getAttributeLabel('cor_sintese_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('cor_sintese_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('cor_sintese_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('cor_sintese_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<!-- Estacao Sintese Atributo Id Field -->
<div class="mb-10">
    {!! Form::label('estacao_sintese_atributo_id', $planta->getAttributeLabel('estacao_sintese_atributo_id'), ['class' => 'form-label']) !!}
    {!! Form::number('estacao_sintese_atributo_id', null, ['class' => 'form-control form-control-solid '.($errors->has('estacao_sintese_atributo_id') ? 'is-invalid' : '')]) !!}
    @error('estacao_sintese_atributo_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
