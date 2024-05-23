@extends('src.master')
@section('title', 'Topics')
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
                                        @php

                                            if (request()->chapter_id) {
                                                $subject_id = \App\Models\Chapter::find(request()->chapter_id)
                                                    ->subject_id;
                                            } else {
                                                $sujbect_id = request()->subject_id;
                                            }
                                        @endphp
                                        <x-forms.select name="subject_id" :select2="true" label="Subject"
                                            :options="$subjects" valueKey="id" labelKey="name" :value="$subject_id" />
                                    </div>
                                    <div class="col-md-4">
                                        <div id="chapterField">
                                            @if ($subject_id)
                                                <x-forms.select name="chapter_id" :select2="true" label="Chapter"
                                                    :required="false" :options="\App\Models\Chapter::where(
                                                        'subject_id',
                                                        $subject_id,
                                                    )->get()" valueKey="id" labelKey="name"
                                                    :value="request()->chapter_id" />
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name"
                                                value="{{ request()->name }}">
                                        </div>
                                    </div>
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
                    <h3 class="card-title">Topic</h3>
                    <div class="float-right">
                        <x-add-action-button module="topic" />
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Topic No</th>
                            <th>Name</th>
                            <th>Chapter</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <thead>
                        @forelse ($topics as $topic)
                            <tr>
                                <td>{{ $loop->iteration + $topics->perPage() * ($topics->currentPage() - 1) }}
                                </td>
                                <td>{{ $topic->topic_no }}</td>
                                <td>{{ $topic->name }}</td>
                                <td>{{ $topic->chapter->name }}</td>
                                <td>{{ $topic->chapter->subject->name }}</td>
                                <td>
                                    <x-edit-action-button :id="$topic->id" module="topic" />
                                    {{-- <x-delete-action-button :id="$topic->id" module="topic" /> --}}
                                    {{-- <a href="{{ route('topic.employees', $topic->id) }}">
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
                    {!! $topics->links() !!}
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection
@push('js')
    <script>
        var subjects = JSON.parse(`{!! $subjects !!}`);

        function getChapters(list, id) {
            console.log(list, id);
            for (const item of list) {
                if (item.id == id) {
                    return item.chapters;
                }
            }
            return [];
        }

        function generateChapters(chapters) {
            var options = "";
            for (const chapter of chapters) {
                options += `<option value="` + chapter.id + `">` + chapter.name + `</option>`;
            }
            return `
            <div class="form-group">
                        <label>Cahpter</label>
                        <select class="form-control chapterInput select2" name="chapter_id">
                                <option value="">-- Select Chapter --</option>
                                ` + options + `
                            </select>
                    </div>
            `;
        }
        $("#subject_id").on('change.select2', function(ev) {
            var id = ev.target.value;
            $("#chapterField").html(generateChapters(getChapters(subjects, id)));
            $(".chapterInput").select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endpush
