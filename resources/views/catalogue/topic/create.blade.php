@extends('src.master')
@section('title', 'Create Topic')

@section('content')
    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Topic</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('topic.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <x-forms.select name="subject_id" :select2="true" label="Subject" :required="true"
                            :options="$subjects" valueKey="id" labelKey="name" />
                        <div id="chapterField"></div>
                        <x-forms.input name="name" label="Name" :required="true" type="text" />
                        <x-forms.input name="topic_no" label="Topic No." :required="true" type="text" />


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
