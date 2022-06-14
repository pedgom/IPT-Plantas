<!-- Abreviatura Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('abreviatura') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->abreviatura }}</span>
    </div>
</div>


<!-- Nome Botanico Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('nome_botanico') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->nome_botanico }}</span>
    </div>
</div>


<!-- Nome Comum Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('nome_comum') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->nome_comum }}</span>
    </div>
</div>


<!-- Tempo Crescimento Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('tempo_crescimento') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->tempo_crescimento }}</span>
    </div>
</div>


<!-- Notas Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('notas') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->notas }}</span>
    </div>
</div>


<!-- Curiosidades Field -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('curiosidades') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->curiosidades }}</span>
    </div>
</div>


<!-- Altura Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('altura') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->alturasToString() }}</span>
    </div>
</div>

<!-- Categoria Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('categoria') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->categoriasToString() }}</span>
    </div>
</div>

<!-- Luz Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('luz') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->luzToString() }}</span>
    </div>
</div>


<!-- Diametro Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('diametro') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->diametroToString() }}</span>
    </div>
</div>


<!-- Densidade Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('densidade') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->densidadeToString() }}</span>
    </div>
</div>



<!-- Agua Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('agua') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->aguaToString() }}</span>
    </div>
</div>


<!-- Resistencia Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('resistencia') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->resistenciaToString() }}</span>
    </div>
</div>

<!-- Solo Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('solo') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->soloToString() }}</span>
    </div>
</div>


<!-- PhSolo Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('ph_solo') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->phSoloToString() }}</span>
    </div>
</div>

<!-- Persistencia Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('persistencia') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\PersistenciaAtributo::getPersistenciaArray()[$planta->persistenciaAtributo->persistencia]??null }}</span>
    </div>
</div>

<!-- Ordem Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('ordem') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\OrdemAtributo::getOrdemArray()[$planta->ordemAtributo->ordem]??null }}</span>
    </div>
</div>


<!-- Familia Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('familia') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\FamiliaAtributo::getFamiliaArray()[$planta->familiaAtributo->familia]??null }}</span>
    </div>
</div>



<!-- Genero Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('genero') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\GeneroAtributo::getGeneroArray()[$planta->generoAtributo->genero]??null }}</span>
    </div>
</div>

<!-- Forma Arbusto Atributo -->
<div class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('forma_arbusto') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\FormaArbustoAtributo::getFormaArbustoArray()[$planta->formaArbustoAtributo->forma_arbusto]??null }}</span>
    </div>
</div>
