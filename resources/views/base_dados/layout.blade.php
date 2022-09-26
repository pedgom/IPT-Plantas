<?php
view()->share('pageTitle', __('Base de Dados'));
view()->share('hideToolbar', true);
?>
<x-base-layout>

    <div style="background-color:#009900;" class="card card-flush ">
        <!--begin::Header-->
        <div class="card-header pt-7" >
            <!--begin::Title-->
            <h3  class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Base de Dados</span>
            </h3>
            <!--end::Title-->
            <!--begin::Toolbar-->
            {{--
            <div class="card-toolbar">
                <a href="../../demo1/dist/account/statements.html" class="btn btn-sm btn-light">History</a>
            </div>
            --}}
            <!--end::Toolbar-->
        </div>
        <!--end::Header-->
        <!--begin::Card body-->
        <div style="background-color:#a0aec0" class="card-body pt-7">

            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('aguaAtributos') ? "active" : "index" }}" href="{{ route('agua-atributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Água') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('alturaAtributos') ? "active" : "index" }}" href="{{ route('altura-atributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Altura') }}</span>
                </a>
            </div>


            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('categoriaAtributos') ? "active" : "index" }}" href="{{ route('categoria-atributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Categoria') }}</span>
                </a>
            </div>




            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('corSinteseAtributos') ? "active" : "index" }}" href="{{ route('corSinteseAtributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Cores') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('densidadeAtributos') ? "active" : "index" }}" href="{{ route('densidade-atributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Densidade') }}</span>
                </a>
            </div>




            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('diametroAtributos') ? "active" : "index" }}" href="{{ route('diametro-atributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Diâmetro') }}</span>
                </a>
            </div>








            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('estacaoAtributos') ? "active" : "index" }}" href="{{ route('estacao-atributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Estação') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('familiaAtributos') ? "active" : "index" }}" href="{{ route('familiaAtributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Família') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('formaArbustoAtributos') ? "active" : "index" }}" href="{{ route('formaArbustoAtributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Forma Arbustos') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('formaArvoreAtributos') ? "active" : "index" }}" href="{{ route('formaArvoreAtributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Forma Árvores') }}</span>
                </a>
            </div>


            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('formaHerbaceaAtributos') ? "active" : "index" }}" href="{{ route('formaHerbaceaAtributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Forma Herbáceas') }}</span>
                </a>
            </div>


            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('generoAtributos') ? "active" : "index" }}" href="{{ route('generoAtributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Género') }}</span>
                </a>
            </div>


            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('luzAtributos') ? "active" : "index" }}" href="{{ route('luz-atributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Luz') }}</span>
                </a>
            </div>


            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('ordemAtributos') ? "active" : "index" }}" href="{{ route('ordemAtributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Ordem') }}</span>
                </a>
            </div>




            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('origemRelacaoAtributos') ? "active" : "index" }}" href="{{ route('origemRelacaoAtributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Origem Relação') }}</span>
                </a>
            </div>


            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('persistenciaAtributos') ? "active" : "index" }}" href="{{ route('persistenciaAtributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Persistência') }}</span>
                </a>
            </div>


            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('phSoloAtributos') ? "active" : "index" }}" href="{{ route('ph-solo-atributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Ph Solo ') }}</span>
                </a>
            </div>


            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('resistenciaAtributos') ? "active" : "index" }}" href="{{ route('resistencia-atributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Resistência') }}</span>
                </a>
            </div>


            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('situacaoEcologiaAtributos') ? "active" : "index" }}" href="{{ route('situacaoEcologicaAtributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Situação Ecológica') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('soloAtributos') ? "active" : "index" }}" href="{{ route('solo-atributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Solo') }}</span>
                </a>
            </div>


            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('usoAtributos') ? "active" : "index" }}" href="{{ route('usoAtributos.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->

                        <!--end::Svg Icon-->
                    </span>
                    <span style="color:white; font-size:30px" class="menu-title">{{ __('Uso') }}</span>
                </a>
            </div>







        </div>

        <!--end::Card body-->
    </div>
    <!--end::Player widget 1-->




</x-base-layout>

