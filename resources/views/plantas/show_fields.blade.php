<head>

    <style>

    </style>

</head>



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

<!-- Abreviatura Field -->


<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Abreviatura') }}</label>

    <h5 class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->abreviatura }}</span>



    </h5>
</div>

<div class="row g-5 g-xl-10">
<div  style="background-color: #00b300" class="card h-lg-100">
    <div class="card-body d-flex justify-content-between align-items-start flex-column">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Nome Botânico') }}</label>
    <h5 class="col-lg-8">
    <span class="fw-bolder fs-6 text-gray-800" margin-left="50px">{{ $planta->nome_botanico }}</span>
    </h5>
    </div>
</div>



<div  style="background-color: #00b300" class="card h-lg-100">
<!-- Nome Comum Field -->
    <div class="card-body d-flex justify-content-between align-items-start flex-column">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('nome_comum') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->nome_comum }}</span>
    </div>
</div>
</div>


<!-- Tempo Crescimento Field -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('tempo_crescimento') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->tempo_crescimento }}</span>
    </div>
</div>


<!-- Notas Field -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Notas') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->notas }}</span>
    </div>
</div>


<!-- Curiosidades Field -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Curiosidades') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->curiosidades }}</span>
    </div>
</div>


<!-- Altura Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Altura') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->alturasToString() }}</span>
    </div>
</div>

<!-- Categoria Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Categoria') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->categoriasToString() }}</span>
    </div>
</div>

<!-- Luz Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Luz') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->luzToString() }}</span>
    </div>
</div>


<!-- Diametro Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Diâmetro') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->diametroToString() }}</span>
    </div>
</div>


<!-- Densidade Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Densidade') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->densidadeToString() }}</span>
    </div>
</div>



<!-- Agua Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Água') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->aguaToString() }}</span>
    </div>
</div>


<!-- Resistencia Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Resistência') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->resistenciaToString() }}</span>
    </div>
</div>

<!-- Solo Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Solo') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->soloToString() }}</span>
    </div>
</div>


<!-- PhSolo Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Ph_Solo') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->phSoloToString() }}</span>
    </div>
</div>

<!-- Estacao Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Estação') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->estacaoToString() }}</span>
    </div>
</div>

<!-- Cor Sintese Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Cor Sintese') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ \App\Models\CorSinteseAtributo::getCorSinteseArray()[$planta->corSinteseAtributo->cor_sintese]??null }}</span>
    </div>
</div>

<!-- Persistencia Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Persistência') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->persistenciaAtributo->persistencia??null }}</span>
    </div>
</div>

<!-- Ordem Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Ordem') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->ordemAtributo->ordem??null }}</span>
    </div>
</div>


<!-- Familia Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Família') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->familiaAtributo->familia??null }}</span>
    </div>
</div>



<!-- Genero Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Género') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->generoAtributo->genero??null }}</span>
    </div>
</div>

<!-- Forma Arbusto Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('forma_arbusto') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{$planta->formaArbustoAtributo->forma_arbusto??null }}</span>
    </div>
</div>


<!-- Uso Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Uso') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->usoAtributo->uso??null }}</span>
    </div>
</div>


<!-- Origem Relacao Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Origem Relação') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->origemRelacaoAtributo->origem_relacao??null }}</span>
    </div>
</div>


<!-- Forma Arvore Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Forma Árvore') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->formaArvoreAtributo->forma_arvore??null }}</span>
    </div>
</div>



<!-- Colecao Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Coleção') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->colecaoAtributo->colecao??null }}</span>
    </div>
</div>

<!-- Forma Herbacea Atributo -->
<div  class="col-12 col-md-4">
    <label class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Forma Herbácea') }}</label>
    <div class="col-lg-8">
        <span class="fw-bolder fs-6 text-gray-800">{{ $planta->formaHerbaceaAtributo->forma_herbacea??null }}</span>
    </div>
</div>



<!-- Imagens -->


    <div class="slider">

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

</div>

