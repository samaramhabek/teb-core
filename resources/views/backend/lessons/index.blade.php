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
                               <label class="form-label" for="course_id">{{__('cp.course')}}</label>
                               <select id="course_id" name="course_id" class="select2 form-select">
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

            // $('#category_id').on('change', function () {
            //     var getCategoryId = $(this).val();
            //     if (getCategoryId) {
            //         $.ajax({
            //             url: '/admin/get-sub-category-by-category/' + getCategoryId,
            //             type: "GET",
            //             dataType: "json",
            //             success: function (data) {
            //                 if (data) {

            //                     $('#child_category_id').empty();
            //                     $('#child_category_id').focus;

            //                     $('#child_category_id').append('<option value="">Select</option>');
            //                     $.each(data, function (key, value) {
            //                         $('#child_category_id').append('<option value="' + value.id + '">' + value.name + '</option>');
            //                     });
            //                 } else {
            //                     $('#child_category_id').empty();
            //                 }
            //             }
            //         });
            //     } else {
            //         $('#child_category_id').empty();
            //     }
            // });

            $(document).on('click', '.edit-record', function () {
                var treatment_id = $(this).data('id'),
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
                    $('#add-lesson-name-ar').val(data.name.ar);
                    $('#add-lesson-name-en').val(data.name.en);
                //     $('#course_id').val(data.course_id);


                //         var getCourseId = data.course_id;
                //         if (getCourseId) {
                //             $.ajax({
                //                 url: '/admin/get-sub-category-by-category/' + getCategoryId,
                //                 type: "GET",
                //                 dataType: "json",
                //                 success: function (subCategoryData) {
                //                     if (subCategoryData) {
                //                         var childCategoryDropdown = $('#child_category_id');
                //                         childCategoryDropdown.empty();
                //                         childCategoryDropdown.focus();

                //                         childCategoryDropdown.append('<option value="">+select+</option>');
                //                         $.each(subCategoryData, function (key, value) {
                //                             childCategoryDropdown.append('<option value="' + value.id + '">' + value.name + '</option>');
                //                         });

                //                         // Set the selected value in child_category_id dropdown
                //                         childCategoryDropdown.val(data.child_category_id);
                //                     } else {
                //                         $('#child_category_id').empty();
                //                     }
                //                 }
                //             });
                //         } else {
                //             $('#child_category_id').empty();
                //         }
                });
            });

        });




    </script>
@endpush
