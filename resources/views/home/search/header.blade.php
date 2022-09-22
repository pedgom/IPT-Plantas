<div class="card card-custom mb-10">
    <div class="card-body">
        <form>

        <div class="row">
            <div class="col-9">
                <!-- Client Id Field -->
                <div class="mb-10">

                    {!! Form::text('search', old('search',$search ?? null), ['class' => 'form-control form-control-solid '.($errors->has('search') ? 'is-invalid' : ''),'maxlength' => 255,'placeholder' => __('Pesquisar Plantas')]) !!}
                    @error('search')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @push('scripts')
                    <script>
                    </script>
                @endpush
            </div>
            <div class="col-3">
                <button class="btn btn-secondary w-30" data-bs-toggle="collapse" data-bs-target="#filtros"  type="button">Filtros</button>
                <button class="btn btn-primary w-30"  type="submit">Pesquisa</button>
            </div>
        </div>
            <div class="row collapse"  id="filtros">
                <!-- Meter Input/ Filtros -->
                <!-- Água -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('agua[]', $planta->getAttributeLabel('Água'), ['class' => 'form-label']) !!}

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
                </div>
                <!-- Altura -->
                <div class="col-12 col-md-4">
                     <div class="mb-10">
                        {!! Form::label('altura[]', $planta->getAttributeLabel('Altura'), ['class' => 'form-label']) !!}

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

                </div>

                <!-- Categoria -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('categoria[]', $planta->getAttributeLabel('Categoria'), ['class' => 'form-label']) !!}

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

                </div>

                <!-- Cor -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('cor_sintese', $planta->getAttributeLabel('Cor'), ['class' => 'form-label']) !!}
                        {!! Form::select('cor_sintese',\App\Models\CorSinteseAtributo::getCorSinteseArray(), null, ['class' => 'form-select form-select-solid  '.($errors->has('cor_sintese') ? 'is-invalid' : ''),
                                            "placeholder"=>'Escolha uma Cor']) !!}
                        @error('cor_sintese')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <!-- Familia -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('familia', $planta->getAttributeLabel('Família'), ['class' => 'form-label']) !!}
                        {!! Form::select('familia',\App\Models\FamiliaAtributo::getFamiliaArray(), null, ['class' => 'form-select form-select-solid  '.($errors->has('familia') ? 'is-invalid' : ''),
                                            "placeholder"=>'Escolha uma Família']) !!}
                        @error('familia')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <!-- Ordem -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('ordem', $planta->getAttributeLabel('Ordem'), ['class' => 'form-label']) !!}
                        {!! Form::select('ordem',\App\Models\OrdemAtributo::getOrdemArray(), null, ['class' => 'form-select form-select-solid  '.($errors->has('ordem') ? 'is-invalid' : ''),
"placeholder"=>'Escolha uma Ordem']) !!}
                        @error('ordem')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <!-- Genero -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('genero', $planta->getAttributeLabel('Género'), ['class' => 'form-label']) !!}
                        {!! Form::select('genero',\App\Models\GeneroAtributo::getGeneroArray(), null, ['class' => 'form-select form-select-solid  '.($errors->has('genero') ? 'is-invalid' : ''),
"placeholder"=>'Escolha um Género']) !!}
                        @error('genero')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <!-- Luz -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('luz[]', $planta->getAttributeLabel('Luz'), ['class' => 'form-label']) !!}

                        {!! Form::select('luz[]',\App\Models\LuzAtributo::valoresArray(), null , ['id' => 'luz','class' => 'form-select form-select-solid ' .($errors->has('luz') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

                        @error('luz')
                        <div class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                        @push('scripts')
                            <script>
                                jQuery(document).ready(function() {
                                    $("#luz").select2({
                                        placeholder: '{{ __('Selecione uma ou mais tipos de luz') }}',
                                        allowClear: true,
                                        minimumInputLength: 0,
                                    });
                                });
                            </script>
                        @endpush
                    </div>

                </div>


                <!-- Solo -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('solo[]', $planta->getAttributeLabel('Solo'), ['class' => 'form-label']) !!}

                        {!! Form::select('solo[]',\App\Models\SoloAtributo::valoresArray(), null , ['id' => 'solo','class' => 'form-select form-select-solid ' .($errors->has('solo') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

                        @error('solo')
                        <div class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                        @push('scripts')
                            <script>
                                jQuery(document).ready(function() {
                                    $("#solo").select2({
                                        placeholder: '{{ __('Selecione um ou mais tipos de solo') }}',
                                        allowClear: true,
                                        minimumInputLength: 0,
                                    });
                                });
                            </script>
                        @endpush
                    </div>

                </div>



                <!-- Diametro -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('diametro[]', $planta->getAttributeLabel('Diâmetro'), ['class' => 'form-label']) !!}

                        {!! Form::select('diametro[]',\App\Models\DiametroAtributo::valoresArray(), null , ['id' => 'diametro','class' => 'form-select form-select-solid ' .($errors->has('diametro') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

                        @error('diametro')
                        <div class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                        @push('scripts')
                            <script>
                                jQuery(document).ready(function() {
                                    $("#diametro").select2({
                                        placeholder: '{{ __('Selecione um ou mais tipos de Diâmetro') }}',
                                        allowClear: true,
                                        minimumInputLength: 0,
                                    });
                                });
                            </script>
                        @endpush
                    </div>

                </div>



                <!-- Densidade -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('densidade[]', $planta->getAttributeLabel('Densidade'), ['class' => 'form-label']) !!}

                        {!! Form::select('densidade[]',\App\Models\DensidadeAtributo::valoresArray(), null , ['id' => 'densidade','class' => 'form-select form-select-solid ' .($errors->has('densidade') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

                        @error('densidade')
                        <div class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                        @push('scripts')
                            <script>
                                jQuery(document).ready(function() {
                                    $("#densidade").select2({
                                        placeholder: '{{ __('Selecione um ou mais tipos de Densidade') }}',
                                        allowClear: true,
                                        minimumInputLength: 0,
                                    });
                                });
                            </script>
                        @endpush
                    </div>

                </div>


                <!-- Resistencia -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('resistencia[]', $planta->getAttributeLabel('Resistência'), ['class' => 'form-label']) !!}

                        {!! Form::select('resistencia[]',\App\Models\ResistenciaAtributo::valoresArray(), null , ['id' => 'resistencia','class' => 'form-select form-select-solid ' .($errors->has('resistencia') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

                        @error('resistencia')
                        <div class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                        @push('scripts')
                            <script>
                                jQuery(document).ready(function() {
                                    $("#resistencia").select2({
                                        placeholder: '{{ __('Selecione um ou mais tipos de Resistência') }}',
                                        allowClear: true,
                                        minimumInputLength: 0,
                                    });
                                });
                            </script>
                        @endpush
                    </div>

                </div>


                <!-- Resistencia -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('ph_solo[]', $planta->getAttributeLabel('Ph Solo'), ['class' => 'form-label']) !!}

                        {!! Form::select('ph_solo[]',\App\Models\PhSoloAtributo::valoresArray(), null , ['id' => 'ph_solo','class' => 'form-select form-select-solid ' .($errors->has('ph_solo') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

                        @error('ph_solo')
                        <div class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                        @push('scripts')
                            <script>
                                jQuery(document).ready(function() {
                                    $("#ph_solo").select2({
                                        placeholder: '{{ __('Selecione um ou mais tipos de Ph') }}',
                                        allowClear: true,
                                        minimumInputLength: 0,
                                    });
                                });
                            </script>
                        @endpush
                    </div>

                </div>


                <!-- Estacao -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('estacao[]', $planta->getAttributeLabel('Estação'), ['class' => 'form-label']) !!}

                        {!! Form::select('estacao[]',\App\Models\EstacaoAtributo::valoresArray(), null , ['id' => 'estacao','class' => 'form-select form-select-solid ' .($errors->has('estacao') ? 'is-invalid' : '') ,'multiple'=>true]) !!}

                        @error('estacao')
                        <div class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                        @push('scripts')
                            <script>
                                jQuery(document).ready(function() {
                                    $("#estacao").select2({
                                        placeholder: '{{ __('Selecione uma ou mais estações do ano') }}',
                                        allowClear: true,
                                        minimumInputLength: 0,
                                    });
                                });
                            </script>
                        @endpush
                    </div>

                </div>


                <!-- Persistencia -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('persistencia', $planta->getAttributeLabel('Persistência'), ['class' => 'form-label']) !!}
                        {!! Form::select('persistencia',\App\Models\PersistenciaAtributo::getPersistenciaArray(), null, ['class' => 'form-select form-select-solid  '.($errors->has('persistencia') ? 'is-invalid' : ''),
"placeholder"=>'Escolha um tipo de Persistência']) !!}
                        @error('persistencia')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <!-- Forma Arbusto -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('forma_arbusto', $planta->getAttributeLabel('Forma Arbusto'), ['class' => 'form-label']) !!}
                        {!! Form::select('forma_arbusto',\App\Models\FormaArbustoAtributo::getFormaArbustoArray(), null, ['class' => 'form-select form-select-solid  '.($errors->has('forma_arbusto') ? 'is-invalid' : ''),
"placeholder"=>'Escolha a forma do Arbusto']) !!}
                        @error('forma_arbusto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <!-- Forma Arvore -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('forma_arvore', $planta->getAttributeLabel('Forma Árvore'), ['class' => 'form-label']) !!}
                        {!! Form::select('forma_arvore',\App\Models\FormaArvoreAtributo::getFormaArvoreArray(), null, ['class' => 'form-select form-select-solid  '.($errors->has('forma_arvore') ? 'is-invalid' : ''),
"placeholder"=>'Escolha a forma da Árvore']) !!}
                        @error('forma_arvore')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <!-- Forma Herbacea -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('forma_herbacea', $planta->getAttributeLabel('Forma Herbácea'), ['class' => 'form-label']) !!}
                        {!! Form::select('forma_herbacea',\App\Models\FormaHerbaceaAtributo::getFormaHerbaceaArray(), null, ['class' => 'form-select form-select-solid  '.($errors->has('forma_herbacea') ? 'is-invalid' : ''),
"placeholder"=>'Escolha a forma da Herbácea']) !!}
                        @error('forma_herbacea')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <!-- Colecao -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('colecao', $planta->getAttributeLabel('Coleção'), ['class' => 'form-label']) !!}
                        {!! Form::select('colecao',\App\Models\ColecaoAtributo::getColecaoArray(), null, ['class' => 'form-select form-select-solid  '.($errors->has('colecao') ? 'is-invalid' : ''),
"placeholder"=>'Escolha um tipo de Coleção']) !!}
                        @error('colecao')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <!-- Uso -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('uso', $planta->getAttributeLabel('Uso'), ['class' => 'form-label']) !!}
                        {!! Form::select('uso',\App\Models\UsoAtributo::getUsoArray(), null, ['class' => 'form-select form-select-solid  '.($errors->has('uso') ? 'is-invalid' : ''),
"placeholder"=>'Escolha um tipo de Uso']) !!}
                        @error('uso')
                        <div class="inv1alid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Origem Relacao -->
                <div class="col-12 col-md-4">
                    <div class="mb-10">
                        {!! Form::label('origem_relacao', $planta->getAttributeLabel('Origem Relação'), ['class' => 'form-label']) !!}
                        {!! Form::select('origem_relacao',\App\Models\OrigemRelacaoAtributo::getOrigemRelacaoArray(), null, ['class' => 'form-select form-select-solid  '.($errors->has('origem_relacao') ? 'is-invalid' : ''),
"placeholder"=>'Escolha um tipo de Origem Relação']) !!}
                        @error('origem_relacao')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>






























            </div>
        </form>

    </div>
</div>


