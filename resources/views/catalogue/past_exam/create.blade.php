@extends('src.master')
@section('title', 'Create Past Exam')

@section('content')
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Past Exam</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('past_exam.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <x-forms.input name="year" label="Year" :required="true" type="number" />


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
