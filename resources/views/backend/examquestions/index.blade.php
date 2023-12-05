@extends('layouts.admin')
 @section('title', __('cp.exam_questions'))
   @section('admin')

    <div class="container-xxl flex-grow-1 container-p-y">
       <div class="row">
           <div class="row g-4 mb-4">

           </div>
           <!-- Categories List Table -->
           <div class="card">
               <div class="card-header">
{{--                   <h5 class="card-title mb-0">Search Filter</h5>--}}
               </div>
               <div class="card-datatable table-responsive">
                   <table class="datatables-exam-questions table">
                       <thead class="border-top">
                       <tr>
                           <th></th>
                           <th>#</th>
                           <th>{{__('cp.text')}}</th>
                           <th>{{__('cp.course')}}</th>
                           {{-- <th>{{__('cp.subcategory')}}</th> --}}
                           <th>{{__('cp.created')}}</th>
                           <th>{{__('cp.answer1')}}</th>
                           <th>{{__('cp.answer2')}}</th>
                           <th>{{__('cp.answer3')}}</th>
                           <th>{{__('cp.answer4')}}</th>
                           <th>{{__('cp.action')}}</th>
                       </tr>
                       </thead>
                   </table>
               </div>
               <!-- Offcanvas to add new user -->
               <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddQuestion" aria-labelledby="offcanvasAddQuestionLabel">
                   <div class="offcanvas-header">
                       <h5 id="offcanvasAddQuestionLabel" class="offcanvas-title">Add Question</h5>
                       <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                   </div>
                   <div class="offcanvas-body mx-0 flex-grow-0">
                       <form class="add-new-question pt-0" id="addNewQuestionForm" enctype="multipart/form-data">
                           <input type="hidden" name="id" id="question_id">
                           <div class="mb-3">
                               <label class="form-label" for="add-question-text">{{__('cp.text_ar')}}</label>
                               <input type="text" class="form-control" id="add-question-text-ar" placeholder="{{__('cp.question_ar')}}" name="text_ar" aria-label="{{__('cp.question_ar')}}" />
                           </div>
                           <div class="mb-3">
                               <label class="form-label" for="add-question-text">{{__('cp.text_en')}}</label>
                               <input type="text" class="form-control" id="add-question-text-en" placeholder="{{__('cp.question_en')}}" name="text_en" aria-label="{{__('cp.question_en')}}" />
                           </div>
                            <!-- Answers -->
                            <div class="form-group">
                                <label>{{__('cp.answers')}}</label>
                                <input type="text" class="form-control" id="answer1_ar"  name="answer1_ar" placeholder="{{__('cp.answer1_ar')}}" required>
                                <input type="text" class="form-control" id="answer1_en" name="answer1_en" placeholder="{{__('cp.answer1_en')}}" required>
                                <input type="text" class="form-control" id="answer2_ar" name="answer2_ar" placeholder="{{__('cp.answer2_ar')}}" required>
                                <input type="text" class="form-control" id="answer2_en" name="answer2_en" placeholder="{{__('cp.answer2_en')}}" required>
                                <input type="text" class="form-control" id="answer3_ar" name="answer3_ar" placeholder="{{__('cp.answer3_ar')}}" required>
                                <input type="text" class="form-control" id="answer3_en"name="answer3_en" placeholder="{{__('cp.answer3_en')}}" required>
                                <input type="text" class="form-control" id="answer4_ar" name="answer4_ar" placeholder="{{__('cp.answer4_ar')}}" required>
                                <input type="text" class="form-control" id="answer4_en" name="answer4_en" placeholder="{{__('cp.answer4_en')}}" required>
                          </div>

                            <!-- Correct Answer -->
                          <div class="form-group">
                                <label for="correctAnswer">{{__('cp.correct_answer')}}</label>
                                <select class="form-control" id="correct" name="correct" required>
                                    <option value="1">{{__('cp.answer1')}}</option>
                                    <option value="2">{{__('cp.answer2')}}</option>
                                    <option value="3">{{__('cp.answer3')}}</option>
                                    <option value="4">{{__('cp.answer4')}}</option>
                                </select>
                          </div>
                           <div class="mb-3">
                               <label class="form-label" for="course_id">{{__('cp.course')}}</label>
                               <select id="course_id" name="course_id" class="form-control">
                                   <option value="">Select</option>

                                   @foreach($courses as $course)
                                       <option value="{{$course->id}}">{{$course->name}}</option>
                                   @endforeach
                               </select>
                           </div>

                           <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">{{__('cp.save')}}</button>
                           <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">{{__('cp.cancel')}}</button>
                       </form>
                   </div>
               </div>
           </div>
       </div>
    </div>

    <div id="validation-messages" style="display: none;"
         data-add-new="{{ trans('cp.add_questions') }}"
         data-edit="{{ trans('cp.edit') }}"
         data-text-en-required="{{ trans('cp.text_en_required') }}"
         data-text-ar-required="{{ trans('cp.text_ar_required') }}"
         data-export="{{ trans('cp.export') }}"
         data-select="{{ trans('cp.select') }}"
         data-confirm="{{ trans('cp.confirm') }}"
         data-delete="{{ trans('cp.delete') }}"
         data-cancel="{{ trans('cp.cancel') }}"
         data-search="{{ trans('cp.search') }}"
         data-next="{{ trans('cp.next') }}"
         data-previous="{{ trans('cp.previous') }}"
         data-showing="{{ trans('cp.showing') }}"
         data-to="{{ trans('cp.to') }}"
         data-of="{{ trans('cp.of') }}"
         data-entries="{{ trans('cp.entries') }}"
         data-actions="{{ trans('cp.action') }}"
         data-lang="{{ app()->getLocale() }}"
         data-oky="{{ trans('cp.oky') }}"
         data-delete_done="{{ trans('cp.delete_done') }}">
    </div>
@endsection

@push('js')
    <script src="{{asset('backend/datatables/js/exam-question-management.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        var csrf = "{{csrf_token()}}";
        var DATA_URL = "{{ route('admin.exam_questions.api') }}";
        var baseUrl = '{{URL::to('')}}';
    </script>

    <script>
        $(document).ready(function () {

            $(document).on('click', '.edit-record', function () {
                var question_id = $(this).data('id'),
                    dtrModal = $('.dtr-bs-modal.show');

                // hide responsive modal in small screen
                if (dtrModal.length) {
                    dtrModal.modal('hide');
                }
                var edit = "{{__('edit')}}"
                var select = "{{__('select')}}"
                // changing the title of offcanvas
                $('#offcanvasAddQuestionLabel').html(edit);

                // get data
                $.get(`${baseUrl}/admin/exam_questions\/${question_id}\/edit`, function (data) {
                    console.log('data')
                    $('#question_id').val(data.id);
                    $('#course_id').val(data.course_id);
                    $('#correct').val(data.correct);
                    $('#add-question-text-ar').val(data.text.ar);
                    $('#add-question-text-en').val(data.text.en);
                    $('#answer1_ar').val(data.answer1.ar);
                    $('#answer1_en').val(data.answer1.en);
                    $('#answer2_ar').val(data.answer2.ar);
                    $('#answer2_en').val(data.answer2.en);
                    $('#answer3_ar').val(data.answer3.ar);
                    $('#answer3_en').val(data.answer3.en);
                    $('#answer4_ar').val(data.answer4.ar);
                    $('#answer4_en').val(data.answer4.en);
                });
            });

        });
    </script>
@endpush
