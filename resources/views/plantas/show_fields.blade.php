<head>

    <style>

        .column {
            float: left;
            width: 25%;
            padding: 10px;
        }

        /* Style the images inside the grid */
        .column img {
            opacity: 0.8;
            cursor: pointer;
        }

        .column img:hover {
            opacity: 1;
        }

        /* Clear floats after the columns */
        .gallery-image:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The expanding image container (positioning is needed to position the close button and the text) */
        .contentor {
            position: relative;
            display: none;
        }

        /* Expanding image text */
        #imgtext {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: white;
            font-size: 20px;
        }

        /* Closable button inside the image */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 35px;
            cursor: pointer;
        }
    </style>

</head>

<div style="border-style: solid; background-color:#0b0e18">
<div class="contentor">
    <!-- Close the image -->
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

    <!-- Expanded image -->
    <img id="expandedImg" style="border-style: solid; border-width:10px; width:700px ; height: 400px;display:block; margin-left:auto; margin-right:auto;">

    <!-- Image text -->
    <div id="imgtext"></div>
</div>

</div>


<div style="border-style: solid; margin-top:10px; background-color:#FFF8DC" class="gallery-image">
    <div class="column">
        @if($planta->hasMedia('imagem_principal'))
            <img
                src="{{ $planta->getFirstMediaUrl('imagem_principal')}}"
                width="280px"
                height="280px"
                style="border-style:solid"
                alt="Principal" onclick="myFunction(this);"
            />
        @else
            <img
                src="{{ asset('images/default-img.png') }}"
                width="280px"
                height="280px"
                style="border-style:solid"
                alt="Default" onclick="myFunction(this);"
            />
        @endif
    </div>
    <div class="column">
        @if($planta->hasMedia('imagem_zoomin'))
            <img
                src="{{ $planta->getFirstMediaUrl('imagem_zoomin') }}"
                width="280px"
                height="280px"
                style="border-style:solid"
                alt="Zoom In" onclick="myFunction(this);"
            />
        @else

        @endif
    </div>
    <div class="column">
        @if($planta->hasMedia('imagem_zoomout'))
            <img
                src="{{ $planta->getFirstMediaUrl('imagem_zoomout') }}"
                width="280px"
                height="280px"
                style="border-style:solid"
                alt="Zoom Out" onclick="myFunction(this);"
            />
        @else

        @endif
    </div>
    <div class="column">
        @if($planta->hasMedia('imagem_tronco'))
            <img
                src="{{ $planta->getFirstMediaUrl('imagem_tronco') }}"
                width="280px"
                height="280px"
                style="border-style:solid"
                alt="Tronco" onclick="myFunction(this);"
            />
        @else

        @endif
    </div>
    <div style="margin-left:150px" class="column">
        @if($planta->hasMedia('imagem_folha'))
            <img
                src="{{ $planta->getFirstMediaUrl('imagem_folha') }}"
                width="280px"
                height="280px"
                style="border-style:solid"
                alt="Folha" onclick="myFunction(this);"
            />
        @else

        @endif
    </div>
    <div class="column">
        @if($planta->hasMedia('imagem_flor'))
            <img
                src="{{ $planta->getFirstMediaUrl('imagem_flor') }}"
                width="280px"
                height="280px"
                style="border-style:solid"
                alt="Flor" onclick="myFunction(this); "
            />
        @else

        @endif
    </div>

    <div class="column">
        @if($planta->hasMedia('imagem_fruto'))
            <img
                src="{{ $planta->getFirstMediaUrl('imagem_fruto') }}"
                width="280px"
                height="280px"
                style="border-style:solid"
                alt="Fruto" onclick="myFunction(this);"
            />
        @else

        @endif
    </div>






<script>
    function myFunction(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        imgText.innerHTML = imgs.alt;
        expandImg.parentElement.style.display = "block";
    }
</script>


</div>
<br/>
<br/>
<br/>
<br/>

<!-- Categoria Atributo -->
<div style="border-style:double; border-color: #00b300">
    <div  style="margin-top:10px; margin-bottom:10px;" class="col-12 col-md-4">
        <label style="margin-left:300px;font-size: 20px; width: 300px; float: left;" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Categoria') }}</label>
        <div style="margin-left: 200px;width :800px;" class="col-lg-8">
            <span style="font-size:20px;color:black;font-weight: bold;">{{ $planta->categoriasToString() }}</span>
        </div>
    </div>
</div>

<br />
<br />
<div style="border-style:double; border-color: #00b300">
<!-- Abreviatura Field -->


<div  style="margin-top:20px;width: 100%; overflow: hidden;" class="col-12 col-md-4">
    <label style="margin-left: 20px;font-size: 20px; width: 300px; float: left;" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Abreviatura') }}</label>

    <div style=" margin-left: 200px;" class="col-lg-8">
        <span style="font-size:20px;color:black;font-weight: bold;" >{{ $planta->abreviatura }}</span>



    </div>
</div>

<div style="margin-top:20px; width: 100%; overflow: hidden;" class="col-12 col-md-4">

        <label style="margin-left: 20px;font-size: 20px; width: 300px; float: left;" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Nome Botânico') }}</label>
        <div style=" margin-left: 200px;" class="col-lg-8">
            <span style="font-size:20px;color:black; font-weight: bold;" >{{ $planta->nome_botanico }}</span>
        </div>
    </div>



<div  style=" margin-top:20px;margin-bottom:20px;width: 100%; overflow: hidden;" class="col-12 col-md-4">
<!-- Nome Comum Field -->

        <label style="margin-left: 20px;font-size: 20px; width: 300px; float: left;" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('nome_comum') }}</label>
        <div style="margin-left: 200px;" class="col-lg-8">
            <span style="font-size:20px;color:black;font-weight: bold;" >{{ $planta->nome_comum }}</span>
        </div>

</div>
</div>

<br />
<br />

<div style="display:flex;border-style:double; border-color: #00b300;">
    <!-- Ordem Atributo -->
    <div  style="margin-bottom: 40px;margin-top:45px;margin-left:60px;float:left" class="col-12 col-md-4">
        <label style="font-size:20px; width:100px"  class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Ordem') }}</label>
        <div class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->ordemAtributo->ordem??null }}</span>
        </div>
    </div>


    <!-- Familia Atributo -->
    <div  style="margin-bottom: 40px;margin-top:45px;margin-left:40px;float:left" class="col-12 col-md-4">
        <label style="font-size:20px; width:100px"  class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Família') }}</label>
        <div class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->familiaAtributo->familia??null }}</span>
        </div>
    </div>



    <!-- Genero Atributo -->
    <div  style="margin-bottom: 40px;margin-top:45px;margin-left:40px;float:left" class="col-12 col-md-4">
        <label style="font-size:20px; width:100px"  class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Género') }}</label>
        <div class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->generoAtributo->genero??null }}</span>
        </div>
    </div>

</div>

<br />
<br />

<div style="border-style:double; border-color: #00b300">
<!-- Tempo Crescimento Field -->
<div  style=" margin-top:20px; "class="col-12 col-md-4">
    <label style="margin-left: 20px;font-size: 20px; width: 300px; float: left;" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('tempo_crescimento') }}</label>
    <div style="margin-left: 200px;" class="col-lg-8">
        <span style="font-size:20px;color:black;font-weight: bold;">{{ $planta->tempo_crescimento }}</span>
    </div>
</div>


<!-- Notas Field -->
<div  style=" margin-top:20px;" class="col-12 col-md-4">
    <label style="margin-left: 20px;font-size: 20px; width: 300px; float: left;" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Notas') }}</label>
    <div style="margin-left: 200px;width :800px;" class="col-lg-8">
        <span style="font-size:20px;color:black;font-weight: bold;">{{ $planta->notas }}</span>
    </div>
</div>


<!-- Curiosidades Field -->
<div  style=" margin-top:20px;margin-bottom:20px;" class="col-12 col-md-4">
    <label style="margin-left: 20px;font-size: 20px; width: 300px; float: left;" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Curiosidades') }}</label>
    <div style="margin-left: 200px;width :800px;" class="col-lg-8">
        <span style="font-size:20px;color:black;font-weight: bold;">{{ $planta->curiosidades }}</span>
    </div>
</div>
</div>

<br />
<br />



    <div style="margin-bottom:20px;float:left;border-style:double; border-color: #00b300; width:450px; height:230px"  >
        <div>
            <img
                src="{{asset('images/altura.png')}}"
                width="40px"
                height="40px"
                style="margin-left:140px; margin-top:10px"



            />
            <span style="margin-top:30px;font-size:20px;color:#3b0d0c;font-weight: bold;">Medidas</span>
        </div>
        <br />
        <br />


        <!-- Altura Atributo -->
        <div  style="margin-left: 20px;margin-rigth:20px;float:left" class="col-12 col-md-4">
            <label style="font-size:16px; width:100px"class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Altura(m)') }}</label>
            <div class="col-lg-8">
                <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->alturasToString() }}</span>
            </div>
        </div>

        <!-- Diametro Atributo -->
        <div  style="margin-left:20px;float:left" class="col-12 col-md-4">
            <label style="font-size:16px; width:150px" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Diâmetro(m)') }}</label>
            <div class="col-lg-8">
                <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->diametroToString() }}</span>
            </div>
        </div>


        <!-- Densidade Atributo -->
        <div  style="margin-left: 20px; margin-bottom: 20px;" class="col-12 col-md-4">
            <label style="font-size:16px; width:100px" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Densidade') }}</label>
            <div class="col-lg-8">
                <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->densidadeToString() }}</span>
            </div>
        </div>
    </div>



    <div style="margin-bottom:20px;margin-left:20px; float:left;display:flex;border-style:double; border-color: #00b300; width:730px; height:230px"  >
    <!-- Luz Atributo -->
        <div  style="margin-top:30px;margin-left:150px;float:left" class="col-12 col-md-4">
            <img
                src="{{asset('images/sol.png')}}"
                width="50px"
                height="50px"




            />
            <label style="font-size:20px; width:100px" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Luz') }}</label>
            <div class="col-lg-8">
                <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->luzToString() }}</span>
            </div>
        </div>

        <!-- Agua Atributo -->
        <div  style="margin-bottom: 40px;margin-top:40px;float:left" class="col-12 col-md-4">
            <img
                src="{{asset('images/agua.png')}}"
                width="40px"
                height="40px"




            />
            <label style="font-size:20px; width:100px" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Água') }}</label>
            <div class="col-lg-8">
                <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->aguaToString() }}</span>
            </div>
        </div>

        <!-- Solo Atributo -->
        <div  style="position: absolute;margin-bottom: 20px;margin-left: 150px;margin-top:150px;" class="col-12 col-md-4">
            <img
                src="{{asset('images/solo.png')}}"
                width="40px"
                height="40px"




            />
            <label style="font-size:20px; width:100px" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Solo') }}</label>
            <div class="col-lg-8">
                <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->soloToString() }}</span>
            </div>
        </div>

        <!-- PhSolo Atributo -->
        <div  style=" position: absolute;margin-bottom: 20px;margin-left: 390px;margin-top:150px;" class="col-12 col-md-4">
            <img
                src="{{asset('images/ph.png')}}"
                width="40px"
                height="40px"
«
            />
            <label style="font-size:20px; width:100px" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Ph_Solo') }}</label>
            <div class="col-lg-8">
                <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->phSoloToString() }}</span>
            </div>
        </div>
    </div>

<br />
<br />

<div style="width:100%; margin-top:20px;display:flex;border-style:double; border-color: #00b300;">
    <!-- Forma Arbusto Atributo -->
    <div style="margin-bottom: 40px;margin-top:45px;margin-left:60px;float:left" class="col-12 col-md-4">
        <img
            src="{{asset('images/arbusto.png')}}"
            width="50px"
            height="50px"
        />
        <label style="font-size:20px; width:160px"  class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('forma_arbusto') }}</label>
        <div class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{$planta->formaArbustoAtributo->forma_arbusto??null }}</span>
        </div>
    </div>

    <!-- Forma Arvore Atributo -->
    <div style="margin-bottom: 40px;margin-top:45px;margin-left:40px;float:left" class="col-12 col-md-4">
        <img
            src="{{asset('images/arvore.png')}}"
            width="50px"
            height="50px"
        />
        <label style="font-size:20px; width:160px"  class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Forma Árvore') }}</label>
        <div class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->formaArvoreAtributo->forma_arvore??null }}</span>
        </div>
    </div>

    <!-- Forma Herbacea Atributo -->
    <div style="margin-bottom: 40px;margin-top:45px;margin-left:40px;float:left" class="col-12 col-md-4">
        <img
            src="{{asset('images/herbacea.png')}}"
            width="50px"
            height="50px"
        />
        <label style="font-size:20px; width:180px"  class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Forma Herbácea') }}</label>
        <div class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->formaHerbaceaAtributo->forma_herbacea??null }}</span>
        </div>
    </div>
</div>







<div style="width:100%; margin-top:20px;display:flex;border-style:double; border-color: #00b300;">
<!-- Estacao Atributo -->
    <div  style="margin-bottom: 40px;margin-top:45px;margin-left:260px;float:left"class="col-12 col-md-4">
        <img
            src="{{asset('images/estacoes.png')}}"
            width="50px"
            height="50px"
        />
        <label style="font-size:20px; width:180px"  class="col-lg-4 fw-bold text-muted" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Estação') }}</label>
        <div style="margin-top:10px;" class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->estacaoToString() }}</span>
        </div>
    </div>

    <!-- Cor Sintese Atributo -->
    <div  style="margin-bottom: 40px;margin-top:45px;margin-left:40px;float:left" class="col-12 col-md-4">
        <img
            src="{{asset('images/cores.png')}}"
            width="50px"
            height="50px"
        />
        <label style="font-size:20px; width:180px"  class="col-lg-4 fw-bold text-muted" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Cor') }}</label>
        <div style="margin-left:60px;"class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{ \App\Models\CorSinteseAtributo::getCorSinteseArray()[$planta->corSinteseAtributo->cor_sintese]??null }}</span>
        </div>
    </div>
</div>



<div style="width:100%; margin-top:20px;display:flex;border-style:double; border-color: #00b300;height:250px;">

    <!-- Resistencia Atributo -->
    <div style="margin-bottom: 40px;margin-top:45px;margin-left:200px;float:left"class="col-12 col-md-4">
        <label style="font-size:20px; width:180px"  class="col-lg-4 fw-bold text-muted" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Resistência') }}</label>
        <div class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->resistenciaToString() }}</span>
        </div>
    </div>

    <!-- Persistencia Atributo -->
    <div  style="margin-bottom: 40px;margin-top:45px;margin-left:260px;float:left"class="col-12 col-md-4">
        <label style="font-size:20px; width:180px"  class="col-lg-4 fw-bold text-muted" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Persistência') }}</label>
        <div class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->persistenciaAtributo->persistencia??null }}</span>
        </div>
    </div>



    <!-- Uso Atributo -->
    <div  style="position: absolute;margin-bottom: 40px;margin-top:150px;margin-left:300px;float:left"class="col-12 col-md-4">
        <label style="font-size:20px; width:180px"  class="col-lg-4 fw-bold text-muted" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Uso') }}</label>
        <div class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->usoAtributo->uso??null }}</span>
        </div>
    </div>


    <!-- Origem Relacao Atributo -->
    <div  style="position: absolute;margin-bottom: 40px;margin-top:45px;margin-left:510px;float:left"class="col-12 col-md-4">
        <label style="font-size:20px; width:180px"  class="col-lg-4 fw-bold text-muted" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Origem Relação') }}</label>
        <div class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->origemRelacaoAtributo->origem_relacao??null }}</span>
        </div>
    </div>

    <!-- Colecao Atributo -->
    <div  style="position: absolute;margin-bottom: 40px;margin-top:150px;margin-left:650px;float:left"class="col-12 col-md-4">
        <label style="font-size:20px; width:180px"  class="col-lg-4 fw-bold text-muted" class="col-lg-4 fw-bold text-muted">{{ $planta->getAttributeLabel('Coleção') }}</label>
        <div class="col-lg-8">
            <span style="font-size:16px;color:black;font-weight: bold;">{{ $planta->colecaoAtributo->colecao??null }}</span>
        </div>
    </div>
</div>




</div>

