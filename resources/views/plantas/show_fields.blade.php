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


