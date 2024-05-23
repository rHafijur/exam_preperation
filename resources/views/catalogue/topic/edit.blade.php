@extends('src.master')
@section('title', 'Edit Topic')

@section('content')
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Topic</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('topic.update', ['topic' => $topic->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <x-forms.select name="subject_id" :select2="true" label="Subject" :required="true"
                            :options="$subjects" valueKey="id" labelKey="name" :value="$topic->chapter->subject_id" />
                        <div id="chapterField">
                            <x-forms.select name="chapter_id" :select2="true" label="Chapter" :required="true"
                                :options="$chapters" valueKey="id" labelKey="name" :value="$topic->chapter_id" />
                        </div>
                        <x-forms.input name="topic_no" label="Topic No." :required="true" type="text"
                            :value="$topic->topic_no" />
                        <x-forms.input name="name" label="Name" :required="true" type="text" :value="$topic->name" />
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
                        <label>Cahpter <span style="color:red; display:inline">*</span></label>
                        <select class="form-control chapterInput select2" name="chapter_id" required>
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
