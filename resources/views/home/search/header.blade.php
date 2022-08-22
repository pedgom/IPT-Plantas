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
                </div>
                <!-- Altura -->
                <div class="col-12 col-md-4">
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

                </div>

                <!-- Categoria -->
                <div class="col-12 col-md-4">
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

                </div>

                <!-- Luz -->
                <div class="col-12 col-md-4">
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
                        {!! Form::label('solo[]', $planta->getAttributeLabel('solo'), ['class' => 'form-label']) !!}

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


                <!-- Estacao -->
                <div class="col-12 col-md-4">
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
                                        placeholder: '{{ __('Selecione uma ou mais estações do ano') }}',
                                        allowClear: true,
                                        minimumInputLength: 0,
                                    });
                                });
                            </script>
                        @endpush
                    </div>

                </div>


            </div>
        </form>

    </div>
</div>


