@extends('src.master')

@section('content')
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Mother Vessel</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('ship.update', ['ship' => $ship->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <x-forms.input name="m_number" label="M Number" :required="true" type="text" :value="$ship->m_number" />
                        <x-forms.input name="name" label="Name" :required="true" type="text" :value="$ship->name" />
                        <x-forms.input name="owner_name" label="Owner Name" :required="true" type="text"
                            :value="$ship->owner_name" />
                        <x-forms.input name="owner_phone" label="Owner Phone" :required="true" type="text"
                            :value="$ship->owner_phone" />
                        <x-forms.select name="ownership_type" :select2="true" label="Ownership Type" :required="true"
                            :options="['Own', 'Chartered']" :value="$ship->owner_company_name ? 'Chartered' : 'Own'" />
                        <x-forms.input name="owner_company_name" label="Owner Company Name" :required="true"
                            type="text" :value="$ship->owner_company_name" />

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection

@push('js')
    <script>
        if ($("#ownership_type").val() == "Own") {
            $("#owner_company_name_div").hide();
        }
        $("#ownership_type_div").on('change', function(event) {
            if (event.target.value == "Chartered") {
                $("#owner_company_name_div").show();
            } else {
                $("#owner_company_name_div").hide();
            }
            // console.log(event);
        });
    </script>
@endpush
