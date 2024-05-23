@extends('src.master')
@section('title', 'Create Subject')

@section('content')
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Subject</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('subject.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <x-forms.input name="name" label="Name" :required="true" type="text" />
                        <x-forms.input name="display_name" label="Display Name" :required="true" type="text" />
                        <x-forms.input name="display_order" label="Display Order" :required="true" type="number" />


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection
