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
                <div class="col-12">
                    <!-- Meter Input/ Filtros -->
                </div>
            </div>
        </form>

    </div>
</div>


