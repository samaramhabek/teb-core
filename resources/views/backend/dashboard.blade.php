@extends('layouts.admin')
@section('title', 'Dashboard')
{{--@section('title',"$page_title")--}}
@section('admin')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
             <!-- Line Chart -->
             <div class="col-12 mb-4">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <div>
                      <h5 class="card-title mb-0">Balance</h5>
                      <small class="text-muted">Commercial networks & enterprises</small>
                    </div>
                    <div class="d-sm-flex d-none align-items-center">
                      <h5 class="mb-0 me-3">$ 100,000</h5>
                      <span class="badge bg-label-secondary">
                        <i class="ti ti-arrow-big-down ti-xs text-danger"></i>
                        <span class="align-middle">20%</span>
                      </span>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="lineChart"></div>
                  </div>
                </div>
              </div>


              <!-- Row grouping -->
              <div class="card">
                <h5 class="card-header">{{__('cp.doctors')}}</h5>
                <div class="card-datatable table-responsive">
                  <table class="datatables-doctors  table">
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
                        {{-- <th data-priority="1">{{__('cp.action')}}</th> --}}
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
                        {{-- <th data-priority="1">{{__('cp.action')}}</th> --}}
                      </tr>
                    </tfoot>
                  </table>
                </div>


                
              </div>
              <!--/ Row grouping -->
        </div>
    </div>
        <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    {{-- <script src="../../assets/vendor/libs/jquery/jquery.js"></script> --}}
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    {{-- <script src="../../assets/vendor/js/bootstrap.js"></script> --}}
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script> --}}

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/charts-apex.js"></script>

@endsection
@push('js')
    <script src="{{asset('backend/datatables/js/project-management.js')}}"></script>
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
@endpush
