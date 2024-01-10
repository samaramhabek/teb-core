@extends('layouts.admin')
@section('title', __('cp.hospitals'))
@section('admin')

    <div class="container-xxl flex-grow-1 container-p-y">
       <div class="row">
           <div class="row g-4 mb-4">

           </div>
           <!-- Categories List Table -->
           <div class="card">
               <div class="card-header">
                   {{-- <h5 class="card-title mb-0">{{  __('cp.filter') }}</h5> --}}
               </div>
               <div class="card-datatable table-responsive">
                   <table class="datatables-hospitals table">
                       <thead class="border-top">
                       <tr>
                           <th></th>
                          
                           <th>id</th>
                           <th>{{__('cp.name')}}</th>
                          
                           <th>{{__('cp.waittime')}}</th>
                           <th>{{__('cp.price')}}</th>
                           <th>{{__('cp.address')}}</th>
                           <th>{{__('cp.service')}}</th>
                         
                           <th>{{__('cp.created')}}</th>
                           <th>{{__('cp.action')}}</th>
                       </tr>
                       </thead>
                   </table>
               </div>
               <!-- Offcanvas to add new user -->
               <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddHospitals" aria-labelledby="offcanvasAddHospitalsLabel">
                   <div class="offcanvas-header">
                       <h5 id="offcanvasAddHospitalsLabel" class="offcanvas-title">Add Hospitals</h5>
                       <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                   </div>
                   <div class="offcanvas-body mx-0 flex-grow-0">
                       <form class="add-new-hospitals pt-0" id="addNewHospitalsForm" enctype="multipart/form-data">
                           <input type="hidden" name="id" id="hospital_id">
                           <div class="mb-3">
                               <label class="form-label" for="add-hospital-name">{{__('cp.name_ar')}}</label>
                               <input type="text" class="form-control" id="add-hospital-name-ar" placeholder="{{__('cp.name_ar')}}" name="name_ar" aria-label="{{__('cp.name_ar')}}" />
                           </div>
                           <div class="mb-3">
                               <label class="form-label" for="add-hospital-name">{{__('cp.name_en')}}</label>
                               <input type="text" class="form-control" id="add-hospital-name-en" placeholder="{{__('cp.name_en')}}" name="name_en" aria-label="{{__('cp.name_en')}}" />
                           </div>
                           <div class="mb-3">
                            <label class="form-label" for="add-hospital-price">{{__('cp.price')}}</label>
                            <input type="number" class="form-control" id="add-hospital-price" placeholder="{{__('cp.price')}}" name="price" aria-label="{{__('cp.price')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-hospital-waittime">{{__('cp.waittime')}}</label>
                            <input type="number" class="form-control" id="add-hospital-waittime" placeholder="{{__('cp.waittime')}}" name="waittime" aria-label="{{__('cp.waittime')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-hospital-address">{{__('cp.address')}}</label>
                            <input type="text" class="form-control" id="add-hospital-address" placeholder="{{__('cp.address')}}" name="address" aria-label="{{__('cp.address')}}" />
                        </div>
                        {{-- {{$doctors}} --}}

                        <div class="mb-3">
                            <label class="form-label" for="doctor_id">{{__('cp.doctor')}}</label>
                            <select id="doctor_id" name="doctors[]" class="select2 form-select" multiple>
                                {{-- <option value="">Select</option> --}}
                                
                                @foreach($doctors as $doctor)
                                    {{-- @php
                                        $firstName = json_decode($doctor->first_name, true);
                                        $lastName = json_decode($doctor->last_name, true);
                                    @endphp --}}
                        
                                    <option value="{{ $doctor->id }}">
                                        {{ $doctor->first_name && isset($doctor->first_name) ? $doctor->first_name: '' }}
                                        {{-- {{ $lastName && isset($lastName['en']) ? $lastName['en'] : '' }} --}}
                                    </option>
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
         data-add-new="{{ trans('cp.add_Hospitals') }}"
         data-edit="{{ trans('cp.edit') }}"
         data-name-en-required="{{ trans('cp.name_en_required') }}"
         data-name-ar-required="{{ trans('cp.name_ar_required') }}"
     
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






    <script src="{{asset('backend/datatables/js/hospitals-management.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        var csrf = "{{csrf_token()}}";
        var DATA_URL = "{{ route('admin.hospitals.api') }}";
        var baseUrl = '{{URL::to('')}}';
    </script>
  <script>
    
    $(document).ready(function () {

        $(".multiSelect2").select2({
    placeholder: "Select",
    allowClear: false,
    minimumResultsForSearch: 5
});
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
            var hospital_id = $(this).data('id'),
                dtrModal = $('.dtr-bs-modal.show');

            // hide responsive modal in small screen
            if (dtrModal.length) {
                dtrModal.modal('hide');
            }
            var edit = "{{__('edit')}}"
            var select = "{{__('select')}}"
            // changing the title of offcanvas
            $('#offcanvasAddHospitalsLabel').html(edit);

            // get data
            $.get(`${baseUrl}/admin/hospitals\/${hospital_id}\/edit`, function (data) {
                console.log('l',data);
                $('#hospital_id').val(data.id);
                $('#add-hospital-name-ar').val(data.name.ar);
                $('#add-hospital-name-en').val(data.name.en);
                $('#add-hospital-price').val(data.price);
                $('#add-hospital-address').val(data.address);
                 $('#add-hospital-waittime').val(data.waittime);
                 var selectedDoctors = data.doctors.map(doctor => doctor.id);
    $('#doctor_id').val(selectedDoctors);
    $('#doctor_id').selectpicker('refresh');
                // $('#category_id').val(data.category_id);
                // $('#child_category_id').val(data.child_category_id);


        //             var getCategoryId = data.category_id;
        //             if (getCategoryId) {
        //                 $.ajax({
        //                     url: '/admin/get-sub-category-by-category/' + getCategoryId,
        //                     type: "GET",
        //                     dataType: "json",
        //                     success: function (subCategoryData) {
        //                         if (subCategoryData) {
        //                             var childCategoryDropdown = $('#child_category_id');
        //                             childCategoryDropdown.empty();
        //                             childCategoryDropdown.focus();

        //                             childCategoryDropdown.append('<option value="">+select+</option>');
        //                             $.each(subCategoryData, function (key, value) {
        //                                 childCategoryDropdown.append('<option value="' + value.id + '">' + value.name + '</option>');
        //                             });

        //                             // Set the selected value in child_category_id dropdown
        //                             childCategoryDropdown.val(data.child_category_id);
        //                         } else {
        //                             $('#child_category_id').empty();
        //                         }
        //                     }
        //                 });
        //             } else {
        //                 $('#child_category_id').empty();
        //             }
            });
         });

    });




</script>


@endpush
