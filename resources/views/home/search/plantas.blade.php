
<head>

    <style>
        .image {
            position: relative;
            width: 400px;
        }

        .image__img {
            display: block;
            width: 100%;
        }

        .image__overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 220px;
            height: 220px;
            background: rgba(0, 0, 0, 0.6);
            color: #ffffff;
            font-family: 'Quicksand', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.25s;
        }

        .image__overlay--blur {
            backdrop-filter: blur(5px);
        }

        .image__overlay--primary {
            background: #FFF5EE;
        }

        .image__overlay > * {
            transform: translateY(20px);
            transition: transform 0.25s;
        }

        .image__overlay:hover {
            opacity: 0.9;
        }

        .image__overlay:hover > * {
            transform: translateY(0);
        }

        .image__title {
            font-size: 2em;
            font-weight: bold;
        }

        .image__description {
            font-size: 1.1em;
            margin-top: 0.25em;
            text-align: left;
        }


    </style>


</head>












<!--begin::Player widget 1-->
<div class="card card-flush ">
    <!--begin::Header-->
    <div class="card-header pt-7">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder text-dark">Plantas</span>
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

    <div class="card-body pt-7">
        <!--begin::Row-->
        <div class="row g-5 g-xl-9 mb-5 mb-xl-9">
            @forelse($plantas as $planta)

            <!--begin::Col-->
            <div class="col-sm-3 mb-3 mb-sm-0">
                <!--begin::Player card-->
                <div class="m-0">
                    <!--begin::User pic-->
                    <div class="card-rounded position-relative mb-5">
                        <!--begin::Img-->
                        <div class="image">
                            <div class="bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded" @if($planta->hasMedia('imagem_principal')) style=" display:block;width: 200px; background-image: url('{{ $planta->getFirstMediaUrl('imagem_principal') }}') " @else style="display:block; width: 200px; background-image: url('{{ asset('images/default-img.png') }}')" @endif></div>
                            <div class="image__overlay image__overlay--primary">
                                <div>
                                    <p class="image__description">
                                        <img alt="Solo" src="{{asset('images/sol.png')}}" class="h-25px logo"/><b style="color:#5F9EA0">Luz:</b><b style="color:black">{{$planta->luzToString()}}</b>
                                    </p>
                                    <p class="image__description">
                                        <img alt="Solo" src="{{asset('images/solo.png')}}" class="h-15px logo"/><b style="color:#5F9EA0">Solo:</b><b style="color:black">{{$planta->soloToString()}}</b>
                                    </p>
                                    <p class="image__description">
                                        <img alt="Agua" src="{{asset('images/agua.png')}}" class="h-25px logo"/><b style="color:#5F9EA0">Água:</b><b style="color:black">{{$planta->aguaToString()}}</b>
                                    </p>
                                    <p class="image__description">
                                        <img alt="Altura" src="{{asset('images/altura.png')}}" class="h-25px logo"/><b style="color:#5F9EA0">Altura(m):</b><b style="color:black">{{$planta->alturasToString()}}</b>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <!--end::Img-->
                        <!--begin::Play-->
                        <button class="btn btn-icon h-auto w-auto p-0 ms-4 mb-4 position-absolute bottom-0 right-0" data-kt-element="list-play-button">
                            <i class="fonticon-play text-white fs-2x" data-kt-element="list-play-icon"></i>
                            <i class="fonticon-pause text-white fs-2x d-none" data-kt-element="list-pause-icon"></i>
                        </button>
                        <!--end::Play-->
                    </div>
                    <!--end::User pic-->
                    <!--begin::Info-->
                    <div class="m-0">
                        <!--begin::Title-->
                        <a href="/plantas/{{$planta->id}}" class="text-gray-800 text-hover-primary fs-3 fw-bolder d-block mb-2">{{$planta->nome_botanico}}</a>
                        <!--end::Title-->
                        <span class="fw-bolder fs-6 text-gray-400 d-block lh-1">{{$planta->nome_comum}}</span>
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Player card-->
            </div>

            @empty
                Nao existe plantas
            @endforelse
            <!--end::Col-->
            <!--begin::Col-->

        </div>
        <!--end::Row-->
        <div class="row g-5 g-xl-9 mb-5 mb-xl-9 mt-9">
            {!! $plantas->links() !!}

        </div>
    </div>

    <!--end::Card body-->
</div>
<!--end::Player widget 1-->
