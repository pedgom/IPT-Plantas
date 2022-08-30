<!-- Abreviatura Field -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('abreviatura') }}</label>
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('nome_botanico') }}</label>
    <h5 class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->abreviatura }}</span>

        <span class="fw-bolder fs-6 text-gray-800" margin-left="50px">{{ $planta->nome_botanico }}</span>

    </h5>
</h3>


<br />


<!-- Nome Comum Field -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('nome_comum') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->nome_comum }}</span>
    </div>
</h3>


<!-- Tempo Crescimento Field -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('tempo_crescimento') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->tempo_crescimento }}</span>
    </div>
</h3>


<!-- Notas Field -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('notas') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->notas }}</span>
    </div>
</h3>


<!-- Curiosidades Field -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('curiosidades') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->curiosidades }}</span>
    </div>
</h3>


<!-- Altura Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('altura') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->alturasToString() }}</span>
    </div>
</h3>

<!-- Categoria Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('categoria') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->categoriasToString() }}</span>
    </div>
</h3>

<!-- Luz Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('luz') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->luzToString() }}</span>
    </div>
</h3>


<!-- Diametro Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('diametro') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->diametroToString() }}</span>
    </div>
</h3>


<!-- Densidade Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('densidade') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->densidadeToString() }}</span>
    </div>
</h3>



<!-- Agua Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('agua') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->aguaToString() }}</span>
    </div>
</h3>


<!-- Resistencia Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('resistencia') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->resistenciaToString() }}</span>
    </div>
</h3>

<!-- Solo Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('solo') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->soloToString() }}</span>
    </div>
</h3>


<!-- PhSolo Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('ph_solo') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->phSoloToString() }}</span>
    </div>
</h3>

<!-- Estacao Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('estacao') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->estacaoToString() }}</span>
    </div>
</h3>

<!-- Cor Sintese Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('cor_sintese') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\CorSinteseAtributo::getCorSinteseArray()[$planta->corSinteseAtributo->cor_sintese]??null }}</span>
    </div>
</h3>

<!-- Persistencia Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('persistencia') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\PersistenciaAtributo::getPersistenciaArray()[$planta->persistenciaAtributo->persistencia]??null }}</span>
    </div>
</h3>

<!-- Ordem Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('ordem') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\OrdemAtributo::getOrdemArray()[$planta->ordemAtributo->ordem]??null }}</span>
    </div>
</h3>


<!-- Familia Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('familia') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\FamiliaAtributo::getFamiliaArray()[$planta->familiaAtributo->familia]??null }}</span>
    </div>
</h3>



<!-- Genero Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('genero') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\GeneroAtributo::getGeneroArray()[$planta->generoAtributo->genero]??null }}</span>
    </div>
</h3>

<!-- Forma Arbusto Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('forma_arbusto') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\FormaArbustoAtributo::getFormaArbustoArray()[$planta->formaArbustoAtributo->forma_arbusto]??null }}</span>
    </div>
</h3>


<!-- Uso Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('uso') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\UsoAtributo::getUsoArray()[$planta->usoAtributo->uso]??null }}</span>
    </div>
</h3>


<!-- Origem Relacao Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('origem_relacao') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\OrigemRelacaoAtributo::getOrigemRelacaoArray()[$planta->origemRelacaoAtributo->origem_relacao]??null }}</span>
    </div>
</h3>


<!-- Forma Arvore Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('forma_arvore') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\FormaArvoreAtributo::getFormaArvoreArray()[$planta->formaArvoreAtributo->forma_arvore]??null }}</span>
    </div>
</h3>



<!-- Colecao Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('colecao') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\ColecaoAtributo::getColecaoArray()[$planta->colecaoAtributo->colecao]??null }}</span>
    </div>
</h3>

<!-- Forma Herbacea Atributo -->
<h3 class="row mb-7">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('forma_herbacea') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\FormaHerbaceaAtributo::getFormaHerbaceaArray()[$planta->formaHerbaceaAtributo->forma_herbacea]??null }}</span>
    </div>
</h3>


<!-- Imagens -->

<div>
    @if($planta->hasMedia('imagem_principal'))
        <img
        src="{{ $planta->getFirstMediaUrl('imagem_principal')}}"
        width="600px"
        height="600px"
       />
    @else
        <img
        src="{{ asset('images/default-img.png') }}"
        width="600px"
        height="600px"
        />
    @endif
</div>


<div>
    @if($planta->hasMedia('imagem_zoomin'))
        <img
            src="{{ $planta->getFirstMediaUrl('imagem_zoomin') }}"
            width="600px"
            height="600px"
        />
    @else
        <img
            src="{{ asset('images/default-img.png') }}"
            width="600px"
            height="600px"
        />
    @endif
</div>



<div>
    @if($planta->hasMedia('imagem_zoomout'))
        <img
            src="{{ $planta->getFirstMediaUrl('imagem_zoomout') }}"
            width="600px"
            height="600px"
        />
    @else
        <img
            src="{{ asset('images/default-img.png') }}"
            width="600px"
            height="600px"
        />
    @endif
</div>


<div>
    @if($planta->hasMedia('imagem_tronco'))
        <img
            src="{{ $planta->getFirstMediaUrl('imagem_tronco') }}"
            width="600px"
            height="600px"
        />
    @else
        <img
            src="{{ asset('images/default-img.png') }}"
            width="600px"
            height="600px"
        />
    @endif
</div>

<div>
    @if($planta->hasMedia('imagem_folha'))
        <img
            src="{{ $planta->getFirstMediaUrl('imagem_folha') }}"
            width="600px"
            height="600px"
        />
    @else
        <img
            src="{{ asset('images/default-img.png') }}"
            width="600px"
            height="600px"
        />
    @endif
</div>


<div>
    @if($planta->hasMedia('imagem_fruto'))
        <img
            src="{{ $planta->getFirstMediaUrl('imagem_fruto') }}"
            width="600px"
            height="600px"
        />
    @else
        <img
            src="{{ asset('images/default-img.png') }}"
            width="600px"
            height="600px"
        />
    @endif
</div>


<div>
    @if($planta->hasMedia('imagem_flor'))
        <img
            src="{{ $planta->getFirstMediaUrl('imagem_flor') }}"
            width="600px"
            height="600px"
        />
    @else
        <img
            src="{{ asset('images/default-img.png') }}"
            width="600px"
            height="600px"
        />
    @endif
</div>



