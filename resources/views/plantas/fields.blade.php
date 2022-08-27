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
    {!! Form::label('estacao[]', $planta->getAttributeLabel('estacao'), ['class' => 'form-label']) !!}

    {!! Form::select('estacao[]',\App\Models\EstacaoAtributo::valoresArray(), null , ['id' => 'estacao','class' => 'form-select form-select-solid ' .($errors->has('estacao') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

    @error('estacao')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror
    @push('scripts')
        <script>
            jQuery(document).ready(function() {
                $("#estacao").select2({
                    placeholder: '{{ __('Selecione um ou mais Meses') }}',
                    allowClear: true,
                    minimumInputLength: 0,
                });
            });
        </script>
    @endpush
</div>

<div class="mb-10">
    {!! Form::label('cor_sintese', $planta->getAttributeLabel('cor_sintese'), ['class' => 'form-label']) !!}

    {!! Form::select('cor_sintese',\App\Models\CorSinteseAtributo::getCorSinteseArray(), null , ['id' => 'cor_sintese','class' => 'form-select form-select-solid ' .($errors->has('cor_sintese') ? 'is-invalid' : '')]) !!}

    @error('cor_sintese')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror

</div>


<div class="mb-10">
    {!! Form::label('persistencia', $planta->getAttributeLabel('persistencia'), ['class' => 'form-label']) !!}

    {!! Form::select('persistencia',\App\Models\PersistenciaAtributo::getPersistenciaArray(), null , ['id' => 'persistencia','class' => 'form-select form-select-solid ' .($errors->has('persistencia') ? 'is-invalid' : '')]) !!}

    @error('persistencia')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror

</div>


<div class="mb-10">
    {!! Form::label('ordem', $planta->getAttributeLabel('ordem'), ['class' => 'form-label']) !!}

    {!! Form::select('ordem',\App\Models\OrdemAtributo::getOrdemArray(), null , ['id' => 'ordem','class' => 'form-select form-select-solid ' .($errors->has('ordem') ? 'is-invalid' : '')]) !!}

    @error('ordem')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror

</div>


<div class="mb-10">
    {!! Form::label('familia', $planta->getAttributeLabel('familia'), ['class' => 'form-label']) !!}

    {!! Form::select('familia',\App\Models\FamiliaAtributo::getFamiliaArray(), null , ['id' => 'familia','class' => 'form-select form-select-solid ' .($errors->has('familia') ? 'is-invalid' : '')]) !!}

    @error('familia')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror

</div>



<div class="mb-10">
    {!! Form::label('genero', $planta->getAttributeLabel('genero'), ['class' => 'form-label']) !!}

    {!! Form::select('genero',\App\Models\GeneroAtributo::getGeneroArray(), null , ['id' => 'genero','class' => 'form-select form-select-solid ' .($errors->has('genero') ? 'is-invalid' : '')]) !!}

    @error('genero')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror

</div>


<div class="mb-10">
    {!! Form::label('forma_arbusto', $planta->getAttributeLabel('forma_arbusto'), ['class' => 'form-label']) !!}

    {!! Form::select('forma_arbusto',\App\Models\FormaArbustoAtributo::getFormaArbustoArray(), null , ['id' => 'forma_arbusto','class' => 'form-select form-select-solid ' .($errors->has('forma_arbusto') ? 'is-invalid' : '')]) !!}

    @error('forma_arbusto')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror

</div>



<div class="mb-10">
    {!! Form::label('uso', $planta->getAttributeLabel('uso'), ['class' => 'form-label']) !!}

    {!! Form::select('uso',\App\Models\UsoAtributo::getUsoArray(), null , ['id' => 'uso','class' => 'form-select form-select-solid ' .($errors->has('uso') ? 'is-invalid' : '')]) !!}

    @error('uso')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror

</div>

<div class="mb-10">
    {!! Form::label('origem_relacao', $planta->getAttributeLabel('origem_relacao'), ['class' => 'form-label']) !!}

    {!! Form::select('origem_relacao',\App\Models\OrigemRelacaoAtributo::getOrigemRelacaoArray(), null , ['id' => 'origem_relacao','class' => 'form-select form-select-solid ' .($errors->has('origem_relacao') ? 'is-invalid' : '')]) !!}

    @error('origem_relacao')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror

</div>



<div class="mb-10">
    {!! Form::label('forma_arvore', $planta->getAttributeLabel('forma_arvore'), ['class' => 'form-label']) !!}

    {!! Form::select('forma_arvore',\App\Models\FormaArvoreAtributo::getFormaArvoreArray(), null , ['id' => 'forma_arvore','class' => 'form-select form-select-solid ' .($errors->has('forma_arvore') ? 'is-invalid' : '')]) !!}

    @error('forma_arvore')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror

</div>


<div class="mb-10">
    {!! Form::label('colecao', $planta->getAttributeLabel('colecao'), ['class' => 'form-label']) !!}

    {!! Form::select('colecao',\App\Models\ColecaoAtributo::getColecaoArray(), null , ['id' => 'colecao','class' => 'form-select form-select-solid ' .($errors->has('colecao') ? 'is-invalid' : '')]) !!}

    @error('colecao')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror

</div>




<div class="mb-10">
    {!! Form::label('forma_herbacea', $planta->getAttributeLabel('forma_herbacea'), ['class' => 'form-label']) !!}

    {!! Form::select('forma_herbacea',\App\Models\FormaHerbaceaAtributo::getFormaHerbaceaArray(), null , ['id' => 'forma_herbacea','class' => 'form-select form-select-solid ' .($errors->has('forma_herbacea') ? 'is-invalid' : '')]) !!}

    @error('forma_herbacea')
    <div class="error invalid-feedback">{{ $message }}</div>
    @enderror

</div>

<div>Imagem Principal: </div>
<div class="mb-10">
    <!--begin::Image input-->
    <div class="image-input image-input-outline @if(!$planta->hasMedia('imagem_principal')) image-input-empty @endif" data-kt-image-input="true" style="background-image: url({{ assetCustom('media/avatars/blank.png') }})">
        <!--begin::Image preview wrapper-->
        <div class="image-input-wrapper w-125px h-125px" @if($planta->hasMedia('imagem_principal')) style="background-image: url('{{ $planta->getFirstMediaUrl('imagem_principal') }}')" @endif></div>
        <!--end::Image preview wrapper-->

        <!--begin::Edit button-->
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
               data-kt-image-input-action="change"
               data-bs-toggle="tooltip"
               data-bs-dismiss="click"
               title="{{ __('Change image') }}">
            <i class="bi bi-pencil-fill fs-7"></i>

            <!--begin::Inputs-->
            <input type="file" name="imagem_principal" accept=".png, .jpg, .jpeg" />
            <input type="hidden" name="delete_imagem_principal" value="{{ old('delete_imagem_principal') }}" />
            <!--end::Inputs-->
        </label>
        <!--end::Edit button-->

        <!--begin::Cancel button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="cancel"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Cancel image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Cancel button-->

        <!--begin::Remove button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="remove"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Remove image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Remove button-->
    </div>
    <!--end::Image input-->
</div>




<div>Imagem ZoomIn: </div>
<div class="mb-10">
    <!--begin::Image input-->
    <div class="image-input image-input-outline @if(!$planta->hasMedia('imagem_zoomin')) image-input-empty @endif" data-kt-image-input="true" style="background-image: url({{ assetCustom('media/avatars/blank.png') }})">
        <!--begin::Image preview wrapper-->
        <div class="image-input-wrapper w-125px h-125px" @if($planta->hasMedia('imagem_zoomin')) style="background-image: url('{{ $planta->getFirstMediaUrl('imagem_principal') }}')" @endif></div>
        <!--end::Image preview wrapper-->

        <!--begin::Edit button-->
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
               data-kt-image-input-action="change"
               data-bs-toggle="tooltip"
               data-bs-dismiss="click"
               title="{{ __('Change image') }}">
            <i class="bi bi-pencil-fill fs-7"></i>

            <!--begin::Inputs-->
            <input type="file" name="imagem_zoomin" accept=".png, .jpg, .jpeg" />
            <input type="hidden" name="delete_imagem_zoomin" value="{{ old('delete_imagem_zoomin') }}" />
            <!--end::Inputs-->
        </label>
        <!--end::Edit button-->

        <!--begin::Cancel button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="cancel"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Cancel image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Cancel button-->

        <!--begin::Remove button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="remove"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Remove image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Remove button-->
    </div>
    <!--end::Image input-->
</div>




<div>Imagem ZoomOut: </div>
<div class="mb-10">
    <!--begin::Image input-->
    <div class="image-input image-input-outline @if(!$planta->hasMedia('imagem_zoomout')) image-input-empty @endif" data-kt-image-input="true" style="background-image: url({{ assetCustom('media/avatars/blank.png') }})">
        <!--begin::Image preview wrapper-->
        <div class="image-input-wrapper w-125px h-125px" @if($planta->hasMedia('imagem_zoomout')) style="background-image: url('{{ $planta->getFirstMediaUrl('imagem_principal') }}')" @endif></div>
        <!--end::Image preview wrapper-->

        <!--begin::Edit button-->
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
               data-kt-image-input-action="change"
               data-bs-toggle="tooltip"
               data-bs-dismiss="click"
               title="{{ __('Change image') }}">
            <i class="bi bi-pencil-fill fs-7"></i>

            <!--begin::Inputs-->
            <input type="file" name="imagem_zoomout" accept=".png, .jpg, .jpeg" />
            <input type="hidden" name="delete_imagem_zoomout" value="{{ old('delete_imagem_zoomout') }}" />
            <!--end::Inputs-->
        </label>
        <!--end::Edit button-->

        <!--begin::Cancel button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="cancel"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Cancel image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Cancel button-->

        <!--begin::Remove button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="remove"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Remove image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Remove button-->
    </div>
    <!--end::Image input-->
</div>

<div>Imagem Tronco: </div>
<div class="mb-10">
    <!--begin::Image input-->
    <div class="image-input image-input-outline @if(!$planta->hasMedia('imagem_tronco')) image-input-empty @endif" data-kt-image-input="true" style="background-image: url({{ assetCustom('media/avatars/blank.png') }})">
        <!--begin::Image preview wrapper-->
        <div class="image-input-wrapper w-125px h-125px" @if($planta->hasMedia('imagem_tronco')) style="background-image: url('{{ $planta->getFirstMediaUrl('imagem_tronco') }}')" @endif></div>
        <!--end::Image preview wrapper-->

        <!--begin::Edit button-->
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
               data-kt-image-input-action="change"
               data-bs-toggle="tooltip"
               data-bs-dismiss="click"
               title="{{ __('Change image') }}">
            <i class="bi bi-pencil-fill fs-7"></i>

            <!--begin::Inputs-->
            <input type="file" name="imagem_tronco" accept=".png, .jpg, .jpeg" />
            <input type="hidden" name="delete_imagem_tronco" value="{{ old('delete_imagem_tronco') }}" />
            <!--end::Inputs-->
        </label>
        <!--end::Edit button-->

        <!--begin::Cancel button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="cancel"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Cancel image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Cancel button-->

        <!--begin::Remove button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="remove"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Remove image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Remove button-->
    </div>
    <!--end::Image input-->
</div>

<div>Imagem Folha: </div>
<div class="mb-10">
    <!--begin::Image input-->
    <div class="image-input image-input-outline @if(!$planta->hasMedia('imagem_folha')) image-input-empty @endif" data-kt-image-input="true" style="background-image: url({{ assetCustom('media/avatars/blank.png') }})">
        <!--begin::Image preview wrapper-->
        <div class="image-input-wrapper w-125px h-125px" @if($planta->hasMedia('imagem_folha')) style="background-image: url('{{ $planta->getFirstMediaUrl('imagem_folha') }}')" @endif></div>
        <!--end::Image preview wrapper-->

        <!--begin::Edit button-->
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
               data-kt-image-input-action="change"
               data-bs-toggle="tooltip"
               data-bs-dismiss="click"
               title="{{ __('Change image') }}">
            <i class="bi bi-pencil-fill fs-7"></i>

            <!--begin::Inputs-->
            <input type="file" name="imagem_folha" accept=".png, .jpg, .jpeg" />
            <input type="hidden" name="delete_imagem_folha" value="{{ old('delete_imagem_folha') }}" />
            <!--end::Inputs-->
        </label>
        <!--end::Edit button-->

        <!--begin::Cancel button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="cancel"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Cancel image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Cancel button-->

        <!--begin::Remove button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="remove"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Remove image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Remove button-->
    </div>
    <!--end::Image input-->
</div>


<div>Imagem Fruto: </div>
<div class="mb-10">
    <!--begin::Image input-->
    <div class="image-input image-input-outline @if(!$planta->hasMedia('imagem_fruto')) image-input-empty @endif" data-kt-image-input="true" style="background-image: url({{ assetCustom('media/avatars/blank.png') }})">
        <!--begin::Image preview wrapper-->
        <div class="image-input-wrapper w-125px h-125px" @if($planta->hasMedia('imagem_fruto')) style="background-image: url('{{ $planta->getFirstMediaUrl('imagem_fruto') }}')" @endif></div>
        <!--end::Image preview wrapper-->

        <!--begin::Edit button-->
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
               data-kt-image-input-action="change"
               data-bs-toggle="tooltip"
               data-bs-dismiss="click"
               title="{{ __('Change image') }}">
            <i class="bi bi-pencil-fill fs-7"></i>

            <!--begin::Inputs-->
            <input type="file" name="imagem_fruto" accept=".png, .jpg, .jpeg" />
            <input type="hidden" name="delete_imagem_fruto" value="{{ old('delete_imagem_fruto') }}" />
            <!--end::Inputs-->
        </label>
        <!--end::Edit button-->

        <!--begin::Cancel button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="cancel"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Cancel image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Cancel button-->

        <!--begin::Remove button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="remove"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Remove image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Remove button-->
    </div>
    <!--end::Image input-->
</div>


<div>Imagem Flor: </div>
<div class="mb-10">
    <!--begin::Image input-->
    <div class="image-input image-input-outline @if(!$planta->hasMedia('imagem_flor')) image-input-empty @endif" data-kt-image-input="true" style="background-image: url({{ assetCustom('media/avatars/blank.png') }})">
        <!--begin::Image preview wrapper-->
        <div class="image-input-wrapper w-125px h-125px" @if($planta->hasMedia('imagem_flor')) style="background-image: url('{{ $planta->getFirstMediaUrl('imagem_flor') }}')" @endif></div>
        <!--end::Image preview wrapper-->

        <!--begin::Edit button-->
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
               data-kt-image-input-action="change"
               data-bs-toggle="tooltip"
               data-bs-dismiss="click"
               title="{{ __('Change image') }}">
            <i class="bi bi-pencil-fill fs-7"></i>

            <!--begin::Inputs-->
            <input type="file" name="imagem_flor" accept=".png, .jpg, .jpeg" />
            <input type="hidden" name="delete_imagem_flor" value="{{ old('delete_imagem_flor') }}" />
            <!--end::Inputs-->
        </label>
        <!--end::Edit button-->

        <!--begin::Cancel button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="cancel"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Cancel image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Cancel button-->

        <!--begin::Remove button-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="remove"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="{{ __('Remove image') }}">
             <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Remove button-->
    </div>
    <!--end::Image input-->
</div>










