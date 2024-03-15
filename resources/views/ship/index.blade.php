@extends('src.master')
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
                    <h3 class="card-title">Ship</h3>
                    <div class="float-right">
                        <x-add-action-button module="ship" />
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>M Number</th>
                            <th>Owner Name</th>
                            <th>Owner Phone</th>
                            <th>Owner Company</th>
                            <th>Type</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <thead>
                        @forelse ($ships as $ship)
                            <tr>
                                <td>{{ $loop->iteration + $ships->perPage() * ($ships->currentPage() - 1) }}
                                </td>
                                <td>{{ $ship->name }}</td>
                                <td>{{ $ship->m_number }}</td>
                                <td>{{ $ship->owner_name }}</td>
                                <td>{{ $ship->owner_phone }}</td>
                                <td>{{ $ship->owner_company_name ? $ship->owner_company_name : $ship->ownerCompany->name }}
                                </td>
                                <td>{{ $ship->owner_company_name ? 'Chartered' : 'Own' }}
                                </td>
                                <td>{{ $ship->createdBy->name }}</td>
                                <td>
                                    <x-edit-action-button :id="$ship->id" module="ship" />
                                    {{-- <x-delete-action-button :id="$ship->id" module="ship" /> --}}
                                    {{-- <a href="{{ route('ship.employees', $ship->id) }}">
                                        <button class="btn btn-sm btn-success"><i class="fa fa-users"></i></button>
                                    </a> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No Data Found</td>
                            </tr>
                        @endforelse
                    </thead>
                </table>
                <div class="card-footer clearfix">
                    {!! $ships->links() !!}
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection
