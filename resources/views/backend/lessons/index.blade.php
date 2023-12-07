@extends('layouts.admin')
 @section('title', __('cp.lessons'))
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
               <input type="hidden" value="{{ $course_id }}" name="course_id_filtering" id="course_id_filtering">
               <div class="card-datatable table-responsive">
                   <table class="datatables-lessons table">
                       <thead class="border-top">
                       <tr>
                           <th></th>
                           <th>#</th>
                           <th>{{__('cp.name')}}</th>
                           <th>{{__('cp.course')}}</th>
                           {{-- <th>{{__('cp.subcategory')}}</th> --}}
                           <th>{{__('cp.created')}}</th>
                           <th>{{__('cp.video_url')}}</th>
                           <th>{{__('cp.file')}}</th>
                           <th>{{__('cp.action')}}</th>
                       </tr>
                       </thead>
                   </table>
               </div>
               <!-- Offcanvas to add new user -->
               <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddLesson" aria-labelledby="offcanvasAddTreatmentLabel">
                   <div class="offcanvas-header">
                       <h5 id="offcanvasAddLessonLabel" class="offcanvas-title">Add Lesson</h5>
                       <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                   </div>
                   <div class="offcanvas-body mx-0 flex-grow-0">
                       <form class="add-new-lesson pt-0" id="addNewLessonForm" enctype="multipart/form-data">
                           <input type="hidden" name="id" id="lesson_id">
                           <div class="mb-3">
                               <label class="form-label" for="add-lesson-name">{{__('cp.name_ar')}}</label>
                               <input type="text" class="form-control" id="add-lesson-name-ar" placeholder="{{__('cp.name_ar')}}" name="name_ar" aria-label="{{__('cp.name_ar')}}" />
                           </div>
                           <div class="mb-3">
                               <label class="form-label" for="add-lesson-name">{{__('cp.name_en')}}</label>
                               <input type="text" class="form-control" id="add-lesson-name-en" placeholder="{{__('cp.name_en')}}" name="name_en" aria-label="{{__('cp.name_en')}}" />
                           </div>
                           <div class="mb-3">
                               <label class="form-label" for="add-lesson-video_url">{{__('cp.video_url')}}</label>
                               <input type="url" class="form-control" id="add-lessonvideo_url" placeholder="{{__('cp.video_url')}}" name="video_url" aria-label="{{__('cp.video_url')}}" />
                           </div>
                           <div class="mb-3">
                            <label for="upload1">تحميل الملف</label>
                            <input type="file" class="form-control" name="upload1" id="file1"/>
                                {{-- <p>Existing File: <a href="{{ $doctor->upload1->original_url  ?? null}}" target="_blank">{{ $doctor->upload1->file_name ?? null}}</a></p> --}}
                         <span id="fileInfo"></span>
                            </div>
                            @if($course_id!=0)
                            <div class="mb-3">
                                <label class="form-label" for="course_id">{{__('cp.course')}}</label>
                                <select id="course_id" name="course_id" class="select2 form-select">
                                    @foreach($courses as $course)
                                        @if($course->id == $course_id)
                                            <option selected value="{{$course->id}}">{{$course->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @else   
                            <div class="mb-3">
                                <label class="form-label" for="course_id">{{__('cp.course')}}</label>
                                <select id="course_id" name="course_id" class="select2 form-select">
                                    <option value="">Select</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                            </div>                   
                            @endif

                           <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">{{__('cp.save')}}</button>
                           <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">{{__('cp.cancel')}}</button>
                       </form>
                   </div>
               </div>
           </div>
       </div>
    </div>

    <div id="validation-messages" style="display: none;"
         data-add-new="{{ trans('cp.add_lessons') }}"
         data-edit="{{ trans('cp.edit') }}"
         data-name-en-required="{{ trans('cp.name_en_required') }}"
         data-name-ar-required="{{ trans('cp.name_ar_required') }}"
         data-country-id-required="{{ trans('cp.country_id_required') }}"
         data-category-id-required="{{ trans('cp.category_id_required') }}"
         data-child-category-id-required="{{ trans('cp.child_category_id_required') }}"
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
    <script src="{{asset('backend/datatables/js/lesson-management.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        var csrf = "{{csrf_token()}}";
        var DATA_URL = "{{ route('admin.lessons.api') }}";
        var baseUrl = '{{URL::to('')}}';
    </script>

    <script>
        $(document).ready(function () {

            $(document).on('click', '.edit-record', function () {
                var lesson_id = $(this).data('id'),
                    dtrModal = $('.dtr-bs-modal.show');

                // hide responsive modal in small screen
                if (dtrModal.length) {
                    dtrModal.modal('hide');
                }
                var edit = "{{__('edit')}}"
                var select = "{{__('select')}}"
                // changing the title of offcanvas
                $('#offcanvasAddLessonLabel').html(edit);

                // get data
                $.get(`${baseUrl}/admin/lessons\/${lesson_id}\/edit`, function (data) {
                    $('#lesson_id').val(data.id);
                    $('#course_id').val(data.course_id).trigger('change');
                   // $('#file1').val(data.file.file_name);
       // Check if data.media is an array and has at least one element
       if (Array.isArray(data.media) && data.media.length > 0 && data.media[0].file_name) {
        // If media is an array with at least one element, and it has file_name, display the file information
        $('#fileInfo').text(data.media[0].file_name);
    } else {
        // Handle the case where data.media or data.media[0].file_name is undefined
        console.warn('File information not available in the data object.');
        // You may set a default value or handle it in a way that makes sense for your application
    }
                  
                  
                    $('#add-lesson-name-ar').val(data.name.ar);
                    $('#add-lesson-name-en').val(data.name.en);
                    $('#add-lesson-video_url').val(data.video_url);
                });
            });

        });
        course_id=document.getElementById('course_id_filtering').value
        
    </script>
@endpush
