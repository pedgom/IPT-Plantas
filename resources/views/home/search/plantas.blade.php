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
                        <div class="bgi-position-center bgi-no-repeat bgi-size-cover h-200px card-rounded" @if($planta->hasMedia('imagem_principal')) style="background-image: url('{{ $planta->getFirstMediaUrl('imagem_principal') }}')" @else style="background-image: url('{{ asset('images/default-img.png') }}')" @endif></div>
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
                        <a href="/plantas/{{$planta->id}}" class="text-gray-800 text-hover-primary fs-3 fw-bolder d-block mb-2">{{$planta->nome_comum}}</a>
                        <!--end::Title-->
                        <span class="fw-bolder fs-6 text-gray-400 d-block lh-1">{{$planta->nome_botanico}}</span>
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
