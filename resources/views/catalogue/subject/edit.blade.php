@extends('src.master')
@section('title', 'Edit Subject')

@section('content')
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Subject</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('subject.update', ['subject' => $subject->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <x-forms.input name="name" label="Name" :required="true" type="text" :value="$subject->name" />
                        <x-forms.input name="display_name" label="Display Name" :required="true" type="text"
                            :value="$subject->display_name" />
                        <x-forms.input name="display_order" label="Display Order" :required="true" type="number"
                            :value="$subject->display_order" />
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
