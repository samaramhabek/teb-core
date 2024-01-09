@extends('layouts.admin')
@section('title', __('cp.currencies'))
@push('style')



@endpush
@section('admin')

    <div class="container-xxl flex-grow-1 container-p-y">
    {{--        <h4 class="py-3 mb-4"><span class="text-muted fw-light">eCommerce /</span> Product List</h4>--}}

    <!-- Product List Widget -->

        <div class="card mb-4">

        </div>

        <!-- Product List Table -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{  __('cp.filter') }}</h5>
                {{--                <form>--}}
                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">

                    <div class="col-md-4 filter_country">

                    </div>
                    <div class="col-md-2 product_status">
{{--                        <button type="button" class="btn btn-primary" name="filter"--}}
{{--                                id="filterByCountryBtn">--}}
{{--                                        <span>--}}
{{--                                            <i class="la la-search"></i>--}}
{{--                                            <span>Filter</span>--}}
{{--                                        </span>--}}
{{--                        </button>--}}
                    </div>

                </div>
                {{--                </form>--}}
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-currencies table">
                    <thead class="border-top">
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddCurrency"
                 aria-labelledby="offcanvasAddCurrencyLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasAddCurrencyLabel" class="offcanvas-title">{{__('cp.add_currencies')}}</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0">
                    <form class="add-new-currency pt-0" id="addNewCurrencyForm">
                        <input type="hidden" name="id" id="currency_id">
                        <div class="mb-3">
                            <label class="form-label" for="add-currency-name">Name (ar)</label>
                            <input type="text" class="form-control" id="add-currency-name-ar"
                                   placeholder="Currency Name (ar)" name="name_ar" aria-label="Currency Name (ar)"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-currency-name">Name (en)</label>
                            <input type="text" class="form-control" id="add-currency-name-en"
                                   placeholder="Currency Name (en)" name="name_en" aria-label="Currency Name (en)"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="country_id">Country</label>
                            <select id="country_id" name="country_id" class="form-select">
                                <option value="">Select</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{--    <div id="list_countries" data-countries="{{json_encode($countries)}}"></div>--}}
    <div id="validation-messages" style="display: none;"
         data-name-en-required="{{ trans('cp.name_en_required') }}"
         data-name-ar-required="{{ trans('cp.name_ar_required') }}"
         data-country-id-required="{{ trans('cp.country_id_required') }}">
    </div>
@endsection

@push('js')
    <script src="{{asset('backend/datatables/js/currency-management.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        var csrf = "{{csrf_token()}}";
        var DATA_URL = "{{ route('admin.currencies.api') }}";
        var baseUrl = '{{URL::to('')}}';
        var filter_1 = -1;

    </script>

    <script>

    </script>
@endpush
