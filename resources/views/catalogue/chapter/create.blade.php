@extends('src.master')
@section('title', 'Create Chapter')

@section('content')
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Chapter</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('chapter.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <x-forms.select name="subject_id" :select2="true" label="Subject" :required="true"
                            :options="$subjects" valueKey="id" labelKey="name" />
                        <x-forms.input name="name" label="Name" :required="true" type="text" />
                        <x-forms.input name="chapter_no" label="Chapter No." :required="true" type="text" />
                        <x-forms.input name="description" label="Description" :required="false" type="text" />


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
