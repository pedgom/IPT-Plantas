<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-chat-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __('Procurar Planta') }}
                <small>sub title</small>
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-sm btn-success font-weight-bold">
                <i class="flaticon2-cube"></i> Reports
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <!-- Client Id Field -->
                <div class="mb-10">

                    {!! Form::select('id', [], old('id'),
                        [
                            'id' => 'planta_id_select',
                            'class' => 'form-select form-select-solid '.($errors->has('planta_id') ? 'is-invalid' : ''),
                            'required' => true,
                        ]) !!}
                    @error('planta_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @push('scripts')
                    <script>
                        jQuery(document).ready(function () {
                            $("#planta_id_select").select2({
                                width: '100%',
                                placeholder: '{{ __('Procure a sua planta....') }}',
                                //placeholderOption: "first",
                                allowClear: true,
                                minimumInputLength: 3,
                                ajax: {
                                    url: "{{ route('plantas.get_plantas') }}",
                                    dataType: 'json',
                                    delay: 250,
                                    data: function (params) {
                                        return {
                                            q: params.term,

                                        };
                                    },
                                    cache: true,
                                    /*
                                    success: function (response) {
                                        console.log(response);
                                    }
                                    */
                                },
                                escapeMarkup: function (markup) {
                                    return markup;
                                }, // let our custom formatter work
                                templateResult: function (data) {
                                    return data.text;
                                },
                                templateSelection: function (data) {
                                    return data.text;
                                }// omitted for brevity, see the source of this page
                            });
                        });

                        $("#planta_id_select").on('select2:select', function (e) {
                            let data = e.params.data;
                            /*$("input[name='planta_name']").val(data.name);
                            $("select[name='breed']").val(data.breed);
                            $("#planta_gender").val((data.gender === true ? '1' : '0')).trigger('change');
                            $("input[name='planta_birthday']").val(data.birthday);
                            $("input[name='number_registration_book_gen']").val(data.number_registration_book_gen);
                            $("input[name='number_registration_die']").val(data.number_registration_die);
                            $("input[name='breeder']").val(data.breeder);
                            $("input[name='address']").val(data.address);
                            $("input[name='location']").val(data.location);
                            $("input[name='zip']").val(data.zip);
                            $("input[name='country']").val(data.country);
                            $("input[name='region']").val(data.region);
                            $("input[name='father_name']").val(data.father_name);
                            $("input[name='father_breeder_name']").val(data.father_breeder_name);
                            $("input[name='father_father_name']").val(data.father_father_name);
                            $("input[name='father_father_breeder_name']").val(data.father_father_breeder_name);
                            $("input[name='father_mother_name']").val(data.father_mother_name);
                            $("input[name='father_mother_breeder_name']").val(data.father_mother_breeder_name);
                            $("input[name='mother_name']").val(data.mother_name);
                            $("input[name='mother_breeder_name']").val(data.mother_breeder_name);
                            $("input[name='mother_father_name']").val(data.mother_father_name);
                            $("input[name='mother_father_breeder_name']").val(data.mother_father_breeder_name);
                            $("input[name='mother_mother_name']").val(data.mother_mother_name);
                            $("input[name='mother_mother_breeder_name']").val(data.mother_mother_breeder_name);
                            $("input[name='exploitation_mark']").val(data.exploitation_mark);
                            $("select[name='coat']").val(data.coat);
                            $("input[name='microchip']").val(data.microchip);
                            $("input[name='marks']").val(data.marks);
                            $("input[name='owner']").val(data.owner);
                            $("textarea[name='notes']").val(data.notes);
                            if($("textarea[name='planta_admin_notes']").length){
                                $("textarea[name='planta_admin_notes']").val(data.admin_notes);
                            }
                            $('#insurance').val('');
                            $('#insurance_policy').val('');
                            $('#client_id').val(data.client_id);
                            $('#client_name').val(data.client_name);
                            $('#client_vat').val(data.client_vat);
                            $('#client_premium').prop('checked', true);*/
                        });

                        $("#planta_id_select").on('select2:clear', function (e) {
                            let data = e.params.data;
                            /*$("input[name='planta_id']").val('');
                            $("input[name='planta_name']").val('');
                            $("select[name='breed']").val('');
                            $("input[name='planta_gender']").val('');
                            $("input[name='planta_birthday']").val('');
                            $("input[name='number_registration_book_gen']").val('');
                            $("input[name='number_registration_die']").val('');
                            $("input[name='breeder']").val('');
                            $("input[name='address']").val('');
                            $("input[name='location']").val('');
                            $("input[name='zip']").val('');
                            $("input[name='country']").val('');
                            $("input[name='region']").val('');
                            $("input[name='father_name']").val('');
                            $("input[name='father_breeder_name']").val('');
                            $("input[name='father_father_name']").val('');
                            $("input[name='father_father_breeder_name']").val('');
                            $("input[name='father_mother_name']").val('');
                            $("input[name='father_mother_breeder_name']").val('');
                            $("input[name='mother_name']").val('');
                            $("input[name='mother_breeder_name']").val('');
                            $("input[name='mother_father_name']").val('');
                            $("input[name='mother_father_breeder_name']").val('');
                            $("input[name='mother_mother_name']").val('');
                            $("input[name='mother_mother_breeder_name']").val('');
                            $("input[name='exploitation_mark']").val('');
                            $("select[name='coat']").val('');
                            $("input[name='microchip']").val('');
                            $("input[name='marks']").val('');
                            $("input[name='owner']").val('');
                            $("textarea[name='notes']").val('');
                            if($("textarea[name='planta_admin_notes']").length){
                                $("textarea[name='planta_admin_notes']").val('');
                            }
                            $('#insurance').val('');
                            $('#insurance_policy').val('');
                            $('#insurance').val('');
                            $('#insurance_policy').val('');
                            $('#client_id').val('');
                            $('#client_name').val('');
                            $('#client_vat').val('');
                            $('#client_premium').prop('checked', false);*/
                        });

                        $("#planta_id_select").on('select2:unselect', function (e) {
                            let data = e.params.data;
                            /*$("input[name='planta_id']").val('');
                            $("input[name='planta_name']").val('');
                            $("select[name='breed']").val('');
                            $("input[name='planta_gender']").val('');
                            $("input[name='planta_birthday']").val('');
                            $("input[name='number_registration_book_gen']").val('');
                            $("input[name='number_registration_die']").val('');
                            $("input[name='breeder']").val('');
                            $("input[name='address']").val('');
                            $("input[name='location']").val('');
                            $("input[name='zip']").val('');
                            $("input[name='country']").val('');
                            $("input[name='region']").val('');
                            $("input[name='father_name']").val('');
                            $("input[name='father_breeder_name']").val('');
                            $("input[name='father_father_name']").val('');
                            $("input[name='father_father_breeder_name']").val('');
                            $("input[name='father_mother_name']").val('');
                            $("input[name='father_mother_breeder_name']").val('');
                            $("input[name='mother_name']").val('');
                            $("input[name='mother_breeder_name']").val('');
                            $("input[name='mother_father_name']").val('');
                            $("input[name='mother_father_breeder_name']").val('');
                            $("input[name='mother_mother_name']").val('');
                            $("input[name='mother_mother_breeder_name']").val('');
                            $("input[name='exploitation_mark']").val('');
                            $("select[name='coat']").val('');
                            $("input[name='microchip']").val('');
                            $("input[name='marks']").val('');
                            $("input[name='owner']").val('');
                            $("textarea[name='notes']").val('');
                            if($("textarea[name='planta_admin_notes']").length){
                                $("textarea[name='planta_admin_notes']").val('');
                            }
                            $('#insurance').val('');
                            $('#insurance_policy').val('');
                            $('#client_id').val('');
                            $('#client_name').val('');
                            $('#client_vat').val('');
                            $('#client_premium').prop('checked', false);*/
                        });

                    </script>
                @endpush
            </div>
        </div>

    </div>
    <div class="card-footer d-flex justify-content-between">
        <a href="#" class="btn btn-light-primary font-weight-bold">Manage</a>
        <a href="#" class="btn btn-outline-secondary font-weight-bold">Learn more</a>
    </div>
</div>


