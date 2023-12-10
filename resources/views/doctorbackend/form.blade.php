
<!DOCTYPE html>
<html>

<head>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="Arboon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0D3558">
    <title>teb-core</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/assets/images/title.png')}}" />
    <link href="{{asset('assets/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link href="assets/css/style-en.css" rel="stylesheet" type="text/css" /> -->
    <link href="{{asset('assets/assets/css/mobile.css')}}" rel="stylesheet" type="text/css" />
</head>

<body class="">
    <!-- Start Header -->
    <header class="sticky">
        <div class="top-bar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="top-bar-information">
                            <li>
                                <a href="#">
                                    خصم علي خصم دوره تدريبيه <span>20%</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Header-med -->
        <div class="header-med">
            <div class="container">
                <div class="row">
                    <!-- Col -->
                    <div class="col-md-12">
                        <div class="head-inner">
                            <div class="logo">
                                <a href="#">
                                    <img src="{{asset('assets/assets/images/logo.png')}}" />
                                </a>
                            </div>

                            <div class="nav-menu">
                                <ul>
                                    <li class="current-menu-item">
                                        <a href="#">
                                            الرئيسية
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            الدورات التدريبه
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            المقالات العلاجيه
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            فريق طب كور
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                           {{__('cp.contact_us')}}
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="menu-right">
                                  <!-- Language -->
            {{-- <li class="nav-item dropdown-language dropdown me-2 me-xl-0"> --}}
                {{-- <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="ti ti-language rounded-circle ti-md"></i>
                </a> --}}
                {{-- <ul class="dropdown-menu dropdown-menu-end"> --}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="javascript:void(0);" data-language="en">--}}
{{--                            <span class="align-middle">English</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a class="dropdown-item lang" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <span class="align-middle">{{ $properties['native'] }}</span>
                            </a>
                        </li>
                    @endforeach
                {{-- </ul> --}}
            {{-- </li> --}}
            <!--/ Language -->
            {{-- <ul > --}}
            {{-- @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="lang">
                                    <i class="far fa-earth-asia"></i>
                                    <span class="align-middle">{{ $properties['native'] }}</span>
                                </a>
                            </li>
                            @endforeach --}}
                        {{-- </ul> --}}
                                <div class="hamburger-menu">
                                    <div class="hamburger" id="hamburger-menu">
                                        <span></span> 
                                        <span></span> 
                                        <span></span> 
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->
                </div>
            </div>
        </div>
        <!-- End Header-Med -->
    </header>

    <!-- Start Mobile-menu -->
    <div class="navigation-menu">
        <div class="bg-layers"> <span></span> <span></span> <span></span> <span></span> </div>
        <!-- end bg-layers -->
        <div class="inner" data-tilt data-tilt-perspective="2000">
            <div class="hamburger-menu">
                <div class="hamburger" id="hamburger-menu">
                     <span></span> 
                     <span></span> 
                     <span></span> 
                </div>
            </div>
            <div class="menu">
                <ul>
                    <li class="current-menu-item">
                        <a href="#">
                            الرئيسية
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            الدورات التدريبه
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            المقالات العلاجيه
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            فريق طب كور
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            تواصل معنا
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end inner -->
    </div>
    <!-- End Mobile-menu -->


    <main class="main-content">
    <section class="req-page multi-step-form">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-6">
                    <form id="addNewDoctorForm"  enctype="multipart/form-data" >
                        @csrf
                     
                        <input type="hidden" name="id" >
                    
                        <fieldset aria-label="Step One" id="step-1">
                            <div class="title-step">
                                <h3>{{__('cp.name_and_title')}}</h3>
                            </div>

                            <div class="form-h row">
                                <!-- Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{__('cp.first_name_ar')}}" name="first_name_ar"
                                           required />
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{__('cp.first_name_en')}}"
                                            name="first_name_en"   required />
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{__('cp.last_name_ar')}}" name="last_name_ar"
                                              required />
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{__('cp.last_name_en')}}"
                                              name="last_name_en" required />
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{__('cp.title_ar')}}"
                                               name="title_ar" required />
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{__('cp.title_en')}}"
                                             name="title_en" required />
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-12">
                                    <div class="title-step title-step-center">
                                        <h3> {{__('cp.experience_work')}}</h3>
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{__('cp.description_ar')}}" name="description_ar"
                                              required />
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{__('cp.description_en')}}"
                                              name="description_en" required />
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-default btn-next" type="button"
                                            aria-controls="step-2">
                                            <span> {{__('cp.next_step')}}</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- /Col -->
                            </div>
                        </fieldset>

                        <fieldset aria-label="Step Two" id="step-2">
                            <div class="title-step">
                                <h3> {{__('cp.presonal_informations')}}</h3>
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
                                                style="background-image: url('asset('assets/img/avatar.jpg') }}')">
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
                                           
                                               
                                                <option value="0">{{__('cp.fmale')}}</option>
                                                <option value="1">{{__('cp.male')}}</option>
                                          
                                        </select>
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="nationality_id">
                                            <option value="" >{{__('cp.nationality')}}</option>
                                            @foreach($nationalities as $nationality)
                                                <option value="">
                                                    {{ $nationality->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        
                                        
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control phone"
                                            placeholder="{{__('cp.number_phone')}}" name="Phone" required  value="" />
                                          
                                    </div>
                                </div>
                                    <!-- Col -->
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" class="form-control email"
                                    placeholder="{{__('cp.email')}}" name="email" required value="" />
                                    </div> 
                                  
                                </div>



                                
                                
                                <!-- /Col -->
                              
                                 
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{__('cp.lat')}}" name="lat" required value="" />
                                          
                                    </div>
                                </div>
                                    <!-- Col -->
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" class="form-control lang"
                                    placeholder="{{__('cp.lang')}}" name="lang" required value="" />
                                    </div> 
                                  
                                </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="check">
                                            {{__('cp.trainer')}}:
                                            <input type="checkbox" name="is_trainer"  />
                                          
                                        </label>
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
                                        <h3>{{__('cp.categories')}}</h3>
                                        <div class="form-group">
                                            <label for="categories"> {{__('cp.main_categories')}}</label>
                                            <select class="form-control" name="categories[]" multiple>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" 
                                                      >
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Col for Treatments -->
                                    <div class="col-md-6">
                                        <h3>{{__('cp.categories')}}</h3>
                                        <div class="form-group">
                                            <label for="child_categories"> {{__('cp.sub_categories')}} </label>
                                            <select class="form-control" name="child_categories[]" multiple>
                                                @foreach($child_categories as $child_category)
                                                <option value="{{ $category->id }}" 
                                                 >
                                                {{ $category->name }}
                                            </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <div class="row">
                                    <!-- Col for Categories -->
                                    
                                    {{-- <div class="col-md-6">
                                        <h3>{{__('cp.hospitals')}}</h3>
                                        <div class="form-group">
                                            <label for="hospitals"> {{__('cp.hospitals')}} </label>
                                            <select class="form-control" name="hospital_id"  id="hospitalSelect">
                                             
                                                @foreach($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}" @if(optional($doctor)->hospital_id == $hospital->id) selected @endif>
                                                    {{ $hospital->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                    
                                    <!-- Col for Treatments -->
                                    <div class="col-md-6">
                                        <h3>{{__('cp.treatments')}}</h3>
                                        <div class="form-group">
                                            <label for="treatments">{{__('cp.treatments')}}</label>
                                            <select class="form-control" name="treatments[]" multiple>
                                                @foreach($treatments as $treatment)
                                                <option value="{{ $treatment->id }}" 
                                                   
                                                   >
                                                    {{ $treatment->name }}
                                                </option>
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
                                            <h3>{{__('cp.cases')}}</h3>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="cases[]" multiple>
                                                <option value="disabled">{{__('cp.select_case')}}</option>
                                                @foreach($cases as $case)
                                                <option value="{{ $case->id }}" 
                                                  
                                                  >
                                                    {{ $case->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                
                                    <!-- Col for Insurances -->
                                    <div class="col-md-6">
                                        <div class="title-step title-step-center">
                                            <h3>{{__('cp.insurances')}} </h3>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="insurances[]" multiple>
                                                <option value="disabled">{{__('cp.select_insurance')}}</option>
                                                @foreach($insurances as $insurance)
                                                <option value="{{ $insurance->id }}" 
                                                  
                                                    >
                                                    {{ $insurance->name }}
                                                </option>
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
                                            <span>{{__('cp.next_step')}} </span>
                                        </button>
                                    </div>
                                </div>
                                <!-- /Col -->
                            </div>
                        </fieldset>

                        <fieldset aria-label="Step Two" id="step-3">
                            <div class="title-step">
                                <h3>{{__('cp.address')}}</h3>
                            </div>

                            <div class="form-h row">
                                <!-- Col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="city_id">
                                            <option value="" disabled>{{__('cp.select_city')}} </option>
                                            @foreach($cities as $city)
                                            <option value="{{ $city->id }}">
                                                {{ $city->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="form-control" name="area_id">
                                            <option value="" disabled>{{__('cp.region_en')}} </option>
                                            @foreach($areas as $area)
                                            <option value="{{ $area->id }}" >
                                                {{ $area->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{__('cp.region_en')}}"
                                            value="{{ optional($doctor)->getTranslation('region', 'en') }}"    name="region_en" required />
                                    </div>
                                </div> --}}
                                <!-- /Col -->


                                <!-- Col -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{__('cp.address_ar')}}"
                                            value=""     name="address_ar" required />
                                    </div>
                                </div>
                                <!-- /Col -->

                                <!-- Col -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="{{__('cp.address_en')}}"
                                            value=""     name="address_en" required />
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
                                        {{-- <h3>رسوم الكشفيه</h3> --}}
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
                                            <span>{{__('cp.next_step')}} </span>
                                        </button>
                                    </div>
                                </div>
                                <!-- /Col -->
                            </div>
                        </fieldset>

                        <fieldset aria-label="Step Two" id="step-4">
                            <div class="title-step">
                                <h3>{{__('cp.upload_documents')}} </h3>
                            </div>

                            <div class="form-h row">

                                <!-- Col -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="upload1">{{__('cp.Download_the_practice_certificate')}}  </label>
                                        <input type="file" class="form-control" name="upload1" />
                                        {{-- @if($doctor->upload1->original_url ) --}}
                                            <p>{{__('cp.existing_file')}}: <a href="" target="_blank"></a></p>
                                        {{-- @endif --}}
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="upload2">  {{__('cp.download_university_certificate')}}</label>
                                        <input type="file" class="form-control" name="upload2" />
                                        {{-- @if(optional($doctor->upload2)->original_url) --}}
                                            <p>{{__('cp.existing_file')}}: <a href="" target="_blank"></a></p>
                                        {{-- @endif --}}
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="upload3">{{__('cp.download_your_personal_iD')}}</label>
                                        <input type="file" class="form-control" name="upload3" />
                                        {{-- @if(optional($doctor->upload3)->original_url) --}}
                                            {{-- <p>{{__('cp.existing_file')}}: <a href="{{ $doctor->upload3->original_url ?? null }}" target="_blank">{{ $doctor->upload3->file_name ?? null }}</a></p> --}}
                                        {{-- @endif --}}
                                    </div>
                                </div>
                                
                                
                                <!-- /Col -->

                                <!-- Col -->
                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-done" type="submit">
                                            <span>إرسال</span>
                                        </button>
                                    </div>
                                </div> --}}
                                <!-- /Col -->
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-default btn-next" type="button"
                                        aria-controls="step-5">
                                        <span>{{__('cp.next_step')}} </span>
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset aria-label="Step Five" id="step-5">
                            <div class="title-step">
                                <h3>{{__('cp.services')}}</h3>
                            </div>
                            {{-- @foreach( $services as $service) --}}
                        
                            


                            <div class="form-h row">

                                @foreach ($services as $service)
                                    <div class="col-md-2  service-checkbox" data-hospital="{{ $service->name }}">
                                        <div class="form-group">
                                            <label for="check{{ $service->id }}">
                                                <input type="checkbox" id="check{{ $service->id }}" name="services[]" value="{{ $service->id }}"  />
                                                {{ $service->name }}
                                            </label>
                                        </div>
                                    
                                    </div>
                            
                                    <div class="col-md-10  service-checkbox">
                                            <div class="form-group">
                                             
                                                    <input type="text" class="form-control" placeholder="{{ $service->name }}" name="prices[]" />
                                                
                                            </div>
                                        
                                    </div>
                                @endforeach
                              
                            </div>
                           
                                <!-- /Col -->
                                
                                <!-- Col -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-done" type="button" onclick="formSubmit()">
                                            <span>{{__('cp.submit')}}</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- /Col -->
                          
                        </fieldset>
                       
                    </form>
                </div>
                <!-- /Col -->

                <!-- Col -->
                <div class="col-md-6">
                    <div class="img-login">
                        <img src="{{asset('assets/assets/images/slider.jpg')}}" alt="#" />
                    </div>
                </div>
                <!-- /Col -->
            </div>
        </div>
    </section>
<!-- Start Footer -->
<footer>
    <!-- Start Footer-top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-4">
                    <div class="item-foot">
                        <a href="#" class="logo-f">
                            <img src="{{asset('assets/assets/images/logo.png')}}" alt="#" />
                        </a>
                        <div class="s-f">
                            <a href="http://" target="_blank" rel="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="http://" target="_blank" rel="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="http://" target="_blank" rel="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="http://" target="_blank" rel="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                        <div class="app-btn">
                            <a href="http://" target="_blank" rel="#">
                                <i class="fa-brands fa-apple"></i>
                                <span>app store</span>
                            </a>
                            <a href="http://" target="_blank" rel="#">
                                <i class="fa-brands fa-google-play"></i>
                                <span>google play</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Col -->
                
                <!-- Col -->
                <div class="col-md-2">
                    <div class="item-foot">
                        <h3>اخر التخصصات</h3>
                        <ul class="link-f">
                            <li>
                                <a href="#">
                                    اسم التخصص
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    اسم التخصص
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    اسم التخصص
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    اسم التخصص
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    اسم التخصص
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Col -->
                
                <!-- Col -->
                <div class="col-md-2">
                    <div class="item-foot">
                        <h3>اخر الدورات التدريبه</h3>
                        <ul class="link-f">
                            <li>
                                <a href="#">
                                    اسم الدوره
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    اسم الدوره
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    اسم الدوره
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    اسم الدوره
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    اسم الدوره
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Col -->
                
                <!-- Col -->
                <div class="col-md-4">
                    <div class="item-foot">
                        <h3>اخر المقالات العلاجيه</h3>
                        <ul class="link-f links-blog">
                            <li>
                                <a href="#" class="link-blog">
                                    <div class="img">
                                        <img src="{{asset('assets/assets/images/slider.jpg')}}" alt="#" />
                                    </div>
                                    <div class="details">
                                        <span>تصنيف</span>
                                        <h3>يوضع اسم المقاله هنا</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="link-blog">
                                    <div class="img">
                                        <img src="{{asset('assets/assets/images/slider.jpg')}}" alt="#" />
                                    </div>
                                    <div class="details">
                                        <span>تصنيف</span>
                                        <h3>يوضع اسم المقاله هنا</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="link-blog">
                                    <div class="img">
                                        <img src="{{asset('assets/assets/images/slider.jpg')}}" alt="#" />
                                    </div>
                                    <div class="details">
                                        <span>تصنيف</span>
                                        <h3>يوضع اسم المقاله هنا</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="link-blog">
                                    <div class="img">
                                        <img src="{{asset('assets/assets/images/slider.jpg')}}" alt="#" />
                                    </div>
                                    <div class="details">
                                        <span>تصنيف</span>
                                        <h3>يوضع اسم المقاله هنا</h3>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Col -->
            </div>
        </div>
    </div>
    <!-- End Footer-top -->

    <!-- Start Footer-bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <!-- Col -->
                <div class="col-md-6">
                    <div class="copyRight">
                        <p>
                            &copy; جميع الحقوق محفوظه لدى طب كور ذ.م.م 2023
                        </p>
                    </div>
                </div>
                <!-- /Col -->
                <!-- Col -->
                <div class="col-md-6">
                    <div class="links-bottom">
                        <a href="#">
                            من نحن
                        </a>
                        <a href="#">
                            انضم كمدرب
                        </a>
                        <a href="#">
                            انضم كطبيب 
                        </a>
                        <a href="#">
                            سياسه الخصوصية
                        </a>
                        <a href="#">
                            الشروط والاحكام
                        </a>
                    </div>
                </div>
                <!-- /Col -->
            </div>
        </div>
    </div>
    <!-- End Footer-bottom -->
</footer>
<!-- End Footer -->


<script src="{{asset('assets/assets/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('assets/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/assets/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('assets/assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/assets/js/odometer.min.js')}}"></script>
<script src="{{asset('assets/assets/js/viewport.jquery.js')}}"></script>
<script src="{{asset('assets/assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/assets/js/select2.min.js')}}"></script>
<script src="{{asset('assets/assets/js/intlTelInput-jquery.min.js')}}"></script>
<script src="{{asset('assets/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/assets/js/wizard.js')}}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  {{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJfzOqR9u2eyXv6OaiuExD3jzoBGGIVKY&libraries=geometry,places&v=weekly"></script> --}}
<script src="{{asset('assets/assets/js/java.js')}}"></script>


</body>

</html>
{{-- @push('js') --}}

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

  
function formSubmit()
{
console.log('formData');
var formData = new FormData(document.getElementById("addNewDoctorForm"));
    var action='{{ route('doctor.store') }}';

   fetch(action, {
        method: 'POST',
        body: formData,
    }).then(response => response.json()).then(data => {
            if (data.message === 'success') {
           // window.location.href = "{{ route('admin.tables') }}";
           alert(data.message);
            }
            else {
            alert('Form submission failed');
        }
    })

}
 console.log('formData',formData);






</script>

{{-- @endpush --}}