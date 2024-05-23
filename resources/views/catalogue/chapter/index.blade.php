@extends('src.master')
@section('title', 'Chapters')
@section('content')
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="row">
                <dov class="col-md-12">
                    <form action="" method="get">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    Filter
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-forms.select name="subject_id" :select2="true" label="Subject"
                                            :options="$subjects" valueKey="id" labelKey="name" :value="request()->subject_id" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name"
                                                value="{{ request()->name }}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="is_active" class="form-control" placeholder="Status">
                                                <option value="">Status</option>
                                                <option @if (request()->is_active === 1) selected @endif value="1">
                                                    Active</option>
                                                <option @if (request()->is_active === 0) selected @endif value="0">
                                                    Inactive</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info btn-sm float-right" type="submit">Apply Filter</button>
                            </div>
                        </div>
                    </form>
                </dov>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chapter</h3>
                    <div class="float-right">
                        <x-add-action-button module="chapter" />
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Chapter No</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <thead>
                        @forelse ($chapters as $chapter)
                            <tr>
                                <td>{{ $loop->iteration + $chapters->perPage() * ($chapters->currentPage() - 1) }}
                                </td>
                                <td>{{ $chapter->chapter_no }}</td>
                                <td>{{ $chapter->name }}</td>
                                <td>{{ $chapter->subject->name }}</td>
                                <td>{{ $chapter->description }}</td>
                                <td>
                                    <x-edit-action-button :id="$chapter->id" module="chapter" />
                                    {{-- <x-delete-action-button :id="$chapter->id" module="chapter" /> --}}
                                    <a href="{{ route('topic.index') }}?chapter_id={{ $chapter->id }}">
                                        <button class="btn btn-sm btn-success"><i class="fa fa-star"></i> Topics</button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Data Found</td>
                            </tr>
                        @endforelse
                    </thead>
                </table>
                <div class="card-footer clearfix">
                    {!! $chapters->links() !!}
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection
