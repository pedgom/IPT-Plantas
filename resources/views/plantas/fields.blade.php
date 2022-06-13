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

<!-- User Id Field -->
<div class="mb-10">
    {!! Form::label('altura[]', $planta->getAttributeLabel('altura'), ['class' => 'form-label']) !!}

    {!! Form::select('altura[]',\App\Models\AlturaAtributo::valoresArray(), null , ['id' => 'altura','class' => 'form-select form-select-solid ' .($errors->has('altura') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

    @error('altura')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror
    @push('scripts')
        <script>
            jQuery(document).ready(function() {
                $("#altura").select2({
                    placeholder: '{{ __('Selecione uma ou mais alturas') }}',
                    allowClear: true,
                    minimumInputLength: 0,
                });
            });
        </script>
    @endpush
</div>


<div class="mb-10">
    {!! Form::label('categoria[]', $planta->getAttributeLabel('categoria'), ['class' => 'form-label']) !!}

    {!! Form::select('categoria[]',\App\Models\CategoriaAtributo::valoresArray(), null , ['id' => 'categoria','class' => 'form-select form-select-solid ' .($errors->has('categoria') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

    @error('categoria')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror
    @push('scripts')
        <script>
            jQuery(document).ready(function() {
                $("#categoria").select2({
                    placeholder: '{{ __('Selecione uma ou mais categorias') }}',
                    allowClear: true,
                    minimumInputLength: 0,
                });
            });
        </script>
    @endpush
</div>



<div class="mb-10">
    {!! Form::label('luz[]', $planta->getAttributeLabel('luz'), ['class' => 'form-label']) !!}

    {!! Form::select('luz[]',\App\Models\LuzAtributo::valoresArray(), null , ['id' => 'luz','class' => 'form-select form-select-solid ' .($errors->has('luz') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

    @error('luz')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror
    @push('scripts')
        <script>
            jQuery(document).ready(function() {
                $("#luz").select2({
                    placeholder: '{{ __('Selecione um ou mais tipos de luz') }}',
                    allowClear: true,
                    minimumInputLength: 0,
                });
            });
        </script>
    @endpush
</div>




<div class="mb-10">
    {!! Form::label('diametro[]', $planta->getAttributeLabel('diametro'), ['class' => 'form-label']) !!}

    {!! Form::select('diametro[]',\App\Models\DiametroAtributo::valoresArray(), null , ['id' => 'diametro','class' => 'form-select form-select-solid ' .($errors->has('diametro') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

    @error('diametro')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror
    @push('scripts')
        <script>
            jQuery(document).ready(function() {
                $("#diametro").select2({
                    placeholder: '{{ __('Selecione um ou mais tipos de diametro') }}',
                    allowClear: true,
                    minimumInputLength: 0,
                });
            });
        </script>
    @endpush
</div>



<div class="mb-10">
    {!! Form::label('densidade[]', $planta->getAttributeLabel('densidade'), ['class' => 'form-label']) !!}

    {!! Form::select('densidade[]',\App\Models\DensidadeAtributo::valoresArray(), null , ['id' => 'densidade','class' => 'form-select form-select-solid ' .($errors->has('densidade') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

    @error('densidade')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror
    @push('scripts')
        <script>
            jQuery(document).ready(function() {
                $("#densidade").select2({
                    placeholder: '{{ __('Selecione um ou mais tipos de densidade') }}',
                    allowClear: true,
                    minimumInputLength: 0,
                });
            });
        </script>
    @endpush
</div>




<div class="mb-10">
    {!! Form::label('agua[]', $planta->getAttributeLabel('agua'), ['class' => 'form-label']) !!}

    {!! Form::select('agua[]',\App\Models\AguaAtributo::valoresArray(), null , ['id' => 'agua','class' => 'form-select form-select-solid ' .($errors->has('agua') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

    @error('agua')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror
    @push('scripts')
        <script>
            jQuery(document).ready(function() {
                $("#agua").select2({
                    placeholder: '{{ __('Selecione um ou mais tipos de agua') }}',
                    allowClear: true,
                    minimumInputLength: 0,
                });
            });
        </script>
    @endpush
</div>


<div class="mb-10">
    {!! Form::label('resistencia[]', $planta->getAttributeLabel('resistencia'), ['class' => 'form-label']) !!}

    {!! Form::select('resistencia[]',\App\Models\ResistenciaAtributo::valoresArray(), null , ['id' => 'resistencia','class' => 'form-select form-select-solid ' .($errors->has('resistencia') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

    @error('resistencia')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror
    @push('scripts')
        <script>
            jQuery(document).ready(function() {
                $("#resistencia").select2({
                    placeholder: '{{ __('Selecione um ou mais tipos de resistencia') }}',
                    allowClear: true,
                    minimumInputLength: 0,
                });
            });
        </script>
    @endpush
</div>

<div class="mb-10">
    {!! Form::label('solo[]', $planta->getAttributeLabel('solo'), ['class' => 'form-label']) !!}

    {!! Form::select('solo[]',\App\Models\SoloAtributo::valoresArray(), null , ['id' => 'solo','class' => 'form-select form-select-solid ' .($errors->has('solo') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

    @error('solo')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror
    @push('scripts')
        <script>
            jQuery(document).ready(function() {
                $("#solo").select2({
                    placeholder: '{{ __('Selecione um ou mais tipos de solos') }}',
                    allowClear: true,
                    minimumInputLength: 0,
                });
            });
        </script>
    @endpush
</div>



<div class="mb-10">
    {!! Form::label('ph_solo[]', $planta->getAttributeLabel('ph_solo'), ['class' => 'form-label']) !!}

    {!! Form::select('ph_solo[]',\App\Models\PhSoloAtributo::valoresArray(), null , ['id' => 'ph_solo','class' => 'form-select form-select-solid ' .($errors->has('ph_solo') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

    @error('ph_solo')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror
    @push('scripts')
        <script>
            jQuery(document).ready(function() {
                $("#ph_solo").select2({
                    placeholder: '{{ __('Selecione um ou mais tipos de ph solos') }}',
                    allowClear: true,
                    minimumInputLength: 0,
                });
            });
        </script>
    @endpush
</div>


<div class="mb-10">
    {!! Form::label('persistencia', $planta->getAttributeLabel('persistencia'), ['class' => 'form-label']) !!}

    {!! Form::select('persistencia',\App\Models\PersistenciaAtributo::getPersistenciaArray(), null , ['id' => 'persistencia','class' => 'form-select form-select-solid ' .($errors->has('persistencia') ? 'is-invalid' : '')]) !!}

    @error('persistencia')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror

</div>
