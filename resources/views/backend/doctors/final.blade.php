
@extends('layouts.admin')


@section('title', __('cp.doctors'))

@section('admin')
 
  <body>
  
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row g-4 mb-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Doctors</span>
                                    <div class="d-flex align-items-end mt-2">
                                        <h3 class="mb-0 me-2">100</h3>
                                        <small class="text-success">(100%)</small>
                                    </div>
                                    <small>Total Doctors</small>
                                </div>
                                <span class="badge bg-label-primary rounded p-2">
             <i class="ti ti-user ti-sm"></i>
           </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Verified Doctors</span>
                                    <div class="d-flex align-items-end mt-2">
                                        <h3 class="mb-0 me-2">10</h3>
                                        <small class="text-success">(+95%)</small>
                                    </div>
                                    <small>Recent analytics </small>
                                </div>
                                <span class="badge bg-label-success rounded p-2">
             <i class="ti ti-user-check ti-sm"></i>
           </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Duplicate Doctors</span>
                                    <div class="d-flex align-items-end mt-2">
                                        <h3 class="mb-0 me-2">20</h3>
                                        <small class="text-success">(0%)</small>
                                    </div>
                                    <small>Recent analytics</small>
                                </div>
                                <span class="badge bg-label-danger rounded p-2">
             <i class="ti ti-users ti-sm"></i>
           </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span>Verification Pending</span>
                                    <div class="d-flex align-items-end mt-2">
                                        <h3 class="mb-0 me-2">50</h3>
                                        <small class="text-danger">(+6%)</small>
                                    </div>
                                    <small>Recent analytics</small>
                                </div>
                                <span class="badge bg-label-warning rounded p-2">
             <i class="ti ti-user-circle ti-sm"></i>
           </span>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
                             <!-- Offcanvas to assign article -->
               <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAssignArticle" aria-labelledby="offcanvasAssignArticleLabel">
                   <div class="offcanvas-header">
                       <h5 id="offcanvasAssignArticleLabel" class="offcanvas-title">Assign Article</h5>
                       <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                   </div>
                   <div class="offcanvas-body mx-0 flex-grow-0">
                       <form class="add-new-hospitals pt-0" id="assignArticleForm" enctype="multipart/form-data">
                           <input type="hidden" name="id" id="doctor_id">

                           <div class="mb-3">
                            <label class="form-label" for="category_id">{{__('cp.maincategory')}}</label>
                            <select id="category_id" name="category_id" class="select2 form-select">
                                <option value="">Select</option>
                                @foreach($parent_categories as $category)
                                
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="child_category_id">{{__('cp.subcategory')}}</label>
                            <select id="child_category_id" name="child_category_id" class="select2_sub form-select">
                                <option value="">{{__('cp.select')}}</option>

                            </select>
                        </div>

                           <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">{{__('cp.save')}}</button>
                           <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">{{__('cp.cancel')}}</button>
                       </form>
                   </div>
               </div>

               <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddDoctor" aria-labelledby="offcanvasAddDoctorLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddDoctorLabel" class="offcanvas-title">Add Doctor</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                   
                  </div>
                <div class="offcanvas-body mx-0 flex-grow-0">
                    <form class="add-new-doctor pt-0" id="addNewDoctorForm" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="doctor_id">
                        <div class="mb-3">
                            <label class="form-label" for="add-doctor-name">{{__('cp.first_name_ar')}}</label>
                            <input type="text" class="form-control" id="add-doctor-name-ar" placeholder="{{__('cp.first_name_ar')}}" name="name_ar" aria-label="{{__('cp.name_ar')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-doctor-name">{{__('cp.first_name_en')}}</label>
                            <input type="text" class="form-control" id="add-doctor-name-en" placeholder="{{__('cp.first_name_en')}}" name="name_en" aria-label="{{__('cp.name_en')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="category_id">{{__('cp.maincategory')}}</label>
                            <select id="category_id" name="category_id" class="select2 form-select">
                                <option value="">Select</option>
                                @foreach($parent_categories as $category)
                                
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="child_category_id">{{__('cp.subcategory')}}</label>
                            <select id="child_category_id" name="child_category_id" class="select2_sub form-select">
                                <option value="">{{__('cp.select')}}</option>

                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">{{__('cp.save')}}</button>
                        <button type="button" class="btn btn-primary me-sm-3 me-1" id="addDoctorButton">kkk</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">{{__('cp.cancel')}}</button>
                    </form>
                </div>
            </div>

              <!-- Row grouping -->
              <div class="card">
                <h5 class="card-header">{{__('cp.doctors')}}</h5>
                <input type="hidden" value="{{ $hospital_id }}" name="hospital_id_filtering" id="hospital_id_filtering">
                <div class="card-datatable table-responsive">
                  <table class="datatables-doctors table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>{{__('cp.id')}}</th>
                        <th>{{__('cp.first_name')}}</th>
                        <th>{{__('cp.last_name')}}</th>
                        <th>{{__('cp.email')}}</th>
                        <th>{{__('cp.city')}}</th>
                        <th>{{__('cp.phone')}}</th>
                        <th>{{__('cp.gender')}}</th>
                        <th>{{__('cp.title')}}</th>
                        <th>{{__('cp.region')}}</th>
                        <th>{{__('cp.description')}}</th>
                        <th>{{__('cp.is_trainer')}}</th>
                        <th>{{__('cp.lat')}}</th>
                        <th>{{__('cp.lang')}}</th>
                        <th data-priority="1">{{__('cp.action')}}</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th>{{__('cp.id')}}</th>
                        <th>{{__('cp.first_name')}}</th>
                        <th>{{__('cp.last_name')}}</th>
                        <th>{{__('cp.email')}}</th>
                        <th>{{__('cp.city')}}</th>
                        <th>{{__('cp.phone')}}</th>
                        <th>{{__('cp.gender')}}</th>
                        <th>{{__('cp.title')}}</th>
                        <th>{{__('cp.region')}}</th>
                        <th>{{__('cp.description')}}</th>
                        <th>{{__('cp.is_trainer')}}</th>
                        <th>{{__('cp.lat')}}</th>
                        <th>{{__('cp.lang')}}</th>
                        <th data-priority="1">{{__('cp.action')}}</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>


                
              </div>
              <!--/ Row grouping -->
              

              <hr class="my-5" />

              <!-- Multilingual -->
              {{-- <div class="card">
                <h5 class="card-header">Multilingual</h5>
                <div class="card-datatable table-responsive">
                  <table class="dt-multilingual table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div> --}}
              <!--/ Multilingual -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                  {{-- <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-medium">Pixinvent</a>
                  </div> --}}
                  <div class="d-none d-lg-inline-block">
                    <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
                      >License</a
                    >
                    <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4"
                      >More Themes</a
                    >

                    <a
                      href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >

                    <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        {{-- </div> --}}
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js 'assets/vendor/js/core.js -->

    {{-- <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/node-waves/node-waves.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{asset('assets/vendor/js/menu.js')}}"></script> --}}

    <!-- endbuild -->

    <!-- Vendors JS -->
    {{-- <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
    <!-- Flat Picker -->
    <script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
    <!-- Form Validation -->
    <script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('assets/js/tables-datatables-basic.js')}}"></script> --}}
    <div id="validation-messages" style="display: none;"
         data-add-new="{{ trans('cp.add_doctors') }}"
         data-edit="{{ trans('cp.edit') }}"
         data-first_name-en-required="{{ trans('cp.first_name_en_required') }}"
         data-first_name-ar-required="{{ trans('cp.first__name_ar_required') }}"
         {{-- data-country-id-required="{{ trans('cp.country_id_required') }}"
         data-category-id-required="{{ trans('cp.category_id_required') }}"
         data-child-category-id-required="{{ trans('cp.child_category_id_required') }}" --}}
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
  </body>
  @endsection


  @push('js')
  <script src="{{asset('backend/datatables/js/doctor-management.js')}}"></script>
  <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': '{{csrf_token()}}'
          }
      });
      var csrf = "{{csrf_token()}}";
      var DATA_URL = "{{ route('admin.doctors.api') }}";
      var baseUrl = '{{URL::to('')}}';
  </script>

<script>

</script>
 
  <script>
    $(document).ready(function () {

        $('#category_id').on('change', function () {
            var getCategoryId = $(this).val();
            if (getCategoryId) {
                $.ajax({
                    url: '/admin/get-sub-category-by-category/' + getCategoryId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        if (data) {

                            $('#child_category_id').empty();
                            $('#child_category_id').focus;

                            $('#child_category_id').append('<option value="">Select</option>');
                            $.each(data, function (key, value) {
                                $('#child_category_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        } else {
                            $('#child_category_id').empty();
                        }
                    }
                });
            } else {
                $('#child_category_id').empty();
            }
        });

        $(document).on('click', '.edit-record', function () {
            var doctor_id = $(this).data('id'),
                dtrModal = $('.dtr-bs-modal.show');

            // hide responsive modal in small screen
            if (dtrModal.length) {
                dtrModal.modal('hide');
            }
            var edit = "{{__('edit')}}"
            var select = "{{__('select')}}"
            // changing the title of offcanvas
            $('#offcanvasAddDoctorLabel').html(edit);

            // get 
            
            $.get(`${baseUrl}/admin/doctors\/${doctor_id}\/edit`, function (data) {
                $('#doctor_id').val(data.id);
                $('#add-doctor-name-ar').val(data.name.ar);
                $('#add-doctor-name-en').val(data.name.en);
                $('#category_id').val(data.category_id);
                $('#child_category_id').val(data.child_category_id);


                    var getCategoryId = data.category_id;
                    if (getCategoryId) {
                        $.ajax({
                            url: '/admin/get-sub-category-by-category/' + getCategoryId,
                            type: "GET",
                            dataType: "json",
                            success: function (subCategoryData) {
                                if (subCategoryData) {
                                    var childCategoryDropdown = $('#child_category_id');
                                    childCategoryDropdown.empty();
                                    childCategoryDropdown.focus();

                                    childCategoryDropdown.append('<option value="">+select+</option>');
                                    $.each(subCategoryData, function (key, value) {
                                        childCategoryDropdown.append('<option value="' + value.id + '">' + value.name + '</option>');
                                    });

                                    // Set the selected value in child_category_id dropdown
                                    childCategoryDropdown.val(data.child_category_id);
                                } else {
                                    $('#child_category_id').empty();
                                }
                            }
                        });
                    } else {
                        $('#child_category_id').empty();
                    }
            });
        });

    });

    hospital_id=document.getElementById('hospital_id_filtering').value


</script>
@endpush