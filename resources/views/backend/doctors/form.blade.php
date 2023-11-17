


@extends('layouts.admin')


@section('title', __('cp.doctors'))

@section('admin')
 





<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Form Wizard/</span> Numbered</h4>

            <!-- Validation Wizard -->
            <div class="col-12 mb-4">
                <small class="text-light fw-medium">Validation</small>
                <div id="wizard-validation" class="bs-stepper mt-2">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#account-details-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label mt-1">
                                    <span class="bs-stepper-title">Account Details</span>
                                    <span class="bs-stepper-subtitle">Setup Account Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div>
                        <div class="step" data-target="#personal-info-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Personal Info</span>
                                    <span class="bs-stepper-subtitle">Add personal info</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div>
                        <div class="step" data-target="#social-links-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Social Links</span>
                                    <span class="bs-stepper-subtitle">Add social links</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content  multi-step-form">
                        <form action="{{ route('admin.createDoctor') }}" method="post"  enctype="multipart/form-data">
                            @csrf
                            <fieldset aria-label="Step One" id="step-1">
                                <div class="title-step">
                                    <h3>الاسم واللقب</h3>
                                </div>

                                <div class="form-h row">
                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="الاسم الاول ( باللغه العربيه )" name="first_name_ar"
                                                required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="الاسم الاول ( باللغه الانجليزيه)"
                                                name="first_name_en" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="الاسم الثاني ( باللغه العربيه )" name="last_name_ar"
                                                required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="الاسم الثاني ( باللغه الانجليزيه)"
                                                name="last_name_en" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="لقب الدكتور ( باللغه العربيه ) مثال : استشاري نسائيه ، اخصائي طب نفسي"
                                                name="title_ar" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="لقب الدكتور ( باللغه الانجليزيه)"
                                                name="title_en" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="title-step title-step-center">
                                            <h3> {{__('cp.description2')}}</h3>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="الخبره المهنيه ( باللغه العربيه )" name="description_ar"
                                                required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="الخبره المهنيه ( باللغه الانجليزيه)"
                                                name="description_en" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-default btn-next" type="button"
                                                aria-controls="step-2">
                                                <span>المرحلة التاليه</span>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /Col -->
                                </div>
                            </fieldset>

                            <fieldset aria-label="Step Two" id="step-2">
                                <div class="title-step">
                                    <h3>معلومات شخصيه</h3>
                                </div>

                                <div class="form-h row">
                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload"
                                                        accept=".png, .jpg, .jpeg" name="image" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview"
                                                        style="background-image: url(assets/img/avatar.jpg);">
                                                    </div>
                                                    {{-- @if($item->hasMedia())
                                        <img src="{{ $item->getFirstMediaUrl() }}" alt="Image">
                                                      @else
                                                       <p>No image available</p >
                                                           @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="gender" required>
                                                <option value="" >الجنس</option>
                                                <option value="0">انثي</option>
                                                <option value="1">ذكر</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="nationality_id">
                                                <option value="" >الجنسيه</option>
                                                @foreach($nationalities as $nationality)
                                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control phone"
                                                placeholder="رقم الهاتف" name="Phone" required />
                                              
                                        </div>
                                    </div>
                                        <!-- Col -->
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="text" class="form-control email"
                                        placeholder="Email " name="email" required />
                                        </div> 
                                      
                                    </div>



                                    
                                    
                                    <!-- /Col -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control lat"
                                                placeholder="lat " name="lat" required />
                                              
                                        </div>
                                    </div>
                                        <!-- Col -->
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="text" class="form-control lang"
                                        placeholder="lang " name="lang" required />
                                        </div> 
                                      
                                    </div>

                                   
                                    {{-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="title-step title-step-center">
                                                <h3>التخصصات والعلاجات :</h3>
                                            </div>
                                        </div>
                                    </div> --}}
                                    
                                    <div class="row">
                                        <!-- Col for Categories -->
                                        
                                        <div class="col-md-6">
                                            <h3>التخصصات</h3>
                                            <div class="form-group">
                                                <label for="categories">التخصصات الرئيسية</label>
                                                <select class="form-control" name="categories[]" multiple>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <!-- Col for Treatments -->
                                        <div class="col-md-6">
                                            <h3>العلاجات</h3>
                                            <div class="form-group">
                                                <label for="treatments">العلاجات</label>
                                                <select class="form-control" name="treatments[]" multiple>
                                                    @foreach($treatments as $treatment)
                                                        <option value="{{$treatment->id}}">{{$treatment->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <!-- Col -->
                                    {{-- <div class="col-md-12">
                                        <div class="title-step title-step-center">
                                            <h3>الحالات</h3>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                         
                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="cases[]"  multiple>
                                                <option value="disabled">اختيار الحاله</option>
                                                @foreach($cases as $case)
                                                <option value="{{$case->id}}">{{$case->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="title-step title-step-center">
                                            <h3>التأمينات</h3>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="بحث"
                                                name="InsuranSearch" required />
                                        </div>
                                    </div> --}}
                                    <!-- /Col -->

                                    <!-- Col -->
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="insurances[]"  multiple>
                                                <option value="disabled">اختيار التأمين</option>
                                                @foreach($insurances as $insurance)
                                                 <option value="{{$insurance->id}}">{{$insurance->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>  --}}
                                    <!-- /Col -->
                                    <div class="row">
                                        <!-- Col for Cases -->
                                        <div class="col-md-6">
                                            <div class="title-step title-step-center">
                                                <h3>الحالات</h3>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="cases[]" multiple>
                                                    <option value="disabled">اختيار الحالة</option>
                                                    @foreach($cases as $case)
                                                    <option value="{{$case->id}}">{{$case->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <!-- Col for Insurances -->
                                        <div class="col-md-6">
                                            <div class="title-step title-step-center">
                                                <h3>التأمينات</h3>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="insurances[]" multiple>
                                                    <option value="disabled">اختيار التأمين</option>
                                                    @foreach($insurances as $insurance)
                                                        <option value="{{$insurance->id}}">{{$insurance->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-default btn-next" type="button"
                                                aria-controls="step-3">
                                                <span>المرحلة التاليه</span>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /Col -->
                                </div>
                            </fieldset>

                            <fieldset aria-label="Step Two" id="step-3">
                                <div class="title-step">
                                    <h3>العنوان</h3>
                                </div>

                                <div class="form-h row">
                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="city_id">
                                                <option value="" disabled>اختيار المدينه</option>
                                                @foreach($cities as $city)
                                                 <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="المنطقة  ( بالغه العربيه )"
                                                name="region_ar" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="المنطقة  ( بالغه الانجليزيه )"
                                                name="region_en" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->


                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="العنوان التفصيلي ( بالغه العربيه )"
                                                name="address_ar" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="العنوان التفصيلي ( بالغه الانجليزيه )"
                                                name="address_en" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="pac-input" class="form-control" type="text"
                                                placeholder="Search Box">
                                            <div id="map-canvas"></div>
                                        </div>
                                    </div> --}}
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="title-step title-step-center">
                                            <h3>رسوم الكشفيه</h3>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" placeholder="التاريخ" class="form-control" />
                                        </div>
                                    </div> --}}
                                    <!-- /Col -->

                                    <!-- Col -->
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="time" placeholder="الوقت" class="form-control" />
                                        </div>
                                    </div> --}}
                                    <!-- /Col -->

                                    <!-- Col -->
                                    {{-- <div class="col-md-23">
                                        <div class="form-group">
                                            <input type="text" placeholder="كشفيه العياده"
                                                class="form-control" />
                                        </div>
                                    </div> --}}
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-default btn-next" type="button"
                                                aria-controls="step-4">
                                                <span>المرحلة التاليه</span>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /Col -->
                                </div>
                            </fieldset>

                            <fieldset aria-label="Step Two" id="step-4">
                                <div class="title-step">
                                    <h3>تحميل الوثائق</h3>
                                </div>

                                <div class="form-h row">

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" class="form-control"
                                                placeholder="تحميل شهاده مزاولة" name="upload-1"  />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" class="form-control"
                                                placeholder="تحميل شهاده الجامعة" name="upload-2"
                                                 />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" class="form-control"
                                                placeholder="تحميل الهويه الشخصيه" name="upload-3"
                                                 />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-success btn-done" type="submit">
                                                <span>إرسال</span>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /Col -->
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Validation Wizard -->
        </div>

    </div>
        </div>
    </div>
    
<!-- Page JS -->

<script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/wizard.js')}}"></script> 
</body>
@endsection

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

  
     @push('js')
    {{-- <script src={{asset('{{asset('backend/datatables/js/doctor-management.js')}}"></script> --}} 
    <script>
  
        function readURL(input) {
            console.log('input');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function () {
            console.log('input');
            readURL(this);
        });
    </script>
    @endpush




