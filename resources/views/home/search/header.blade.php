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


            </div>
        </form>

    </div>
</div>


