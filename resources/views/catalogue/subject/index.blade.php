@extends('src.master')
@section('title', 'Subjects')
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
                                        <div class="form-group">
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
                    <h3 class="card-title">Subject</h3>
                    <div class="float-right">
                        <x-add-action-button module="subject" />
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Display Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <thead>
                        @forelse ($subjects as $subject)
                            <tr>
                                <td>{{ $loop->iteration + $subjects->perPage() * ($subjects->currentPage() - 1) }}
                                </td>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $subject->display_name }}</td>
                                <td>{{ $subject->display_order }}</td>
                                <td>
                                    <x-edit-action-button :id="$subject->id" module="subject" />
                                    {{-- <x-delete-action-button :id="$subject->id" module="subject" /> --}}
                                    {{-- <a href="{{ route('subject.employees', $subject->id) }}">
                                        <button class="btn btn-sm btn-success"><i class="fa fa-users"></i></button>
                                    </a> --}}
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
                    {!! $subjects->links() !!}
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection
