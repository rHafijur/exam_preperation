@extends('src.master')
@section('title', 'Edit Chapter')

@section('content')
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Chapter</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('chapter.update', ['chapter' => $chapter->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <x-forms.select name="subject_id" :select2="true" label="Subject" :required="true"
                            :options="$subjects" valueKey="id" labelKey="name" :value="$chapter->subject_id" />
                        <x-forms.input name="chapter_no" label="Chapter No." :required="true" type="text"
                            :value="$chapter->chapter_no" />
                        <x-forms.input name="name" label="Name" :required="true" type="text" :value="$chapter->name" />
                        <x-forms.input name="description" label="Description" :required="false" type="text"
                            :value="$chapter->description" />
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
