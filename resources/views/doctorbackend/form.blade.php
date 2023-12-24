
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
{{-- {{ dd($currentUserInfo) }} --}}
{{-- Latitude: {{ $currentUserInfo->latitude }} --}}

              {{-- {{$currentUserInfo}} --}}
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a class="dropdown-item lang" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <span class="align-middle">{{ $properties['native'] }}</span>
                            </a>
                        </li>
                    @endforeach
                    {{-- {{ $currentUserInfo->countryName }} --}}
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
                                        {{-- <button class="btn btn-default btn-prev" type="button"
                                        aria-controls="step-2">
                                        <span>Prev Step </span>
                                    </button> --}}
                                      
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
                                        <select class="form-control multiSelect2 for" name="nationality_id">
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
                                            <select class="form-control multiSelect2 for" name="categories[]" multiple>
                                                {{-- @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" 
                                                      >
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Col for Treatments -->
                                    <div class="col-md-6">
                                        <h3>{{__('cp.categories')}}</h3>
                                        <div class="form-group">
                                            <label for="child_categories"> {{__('cp.sub_categories')}} </label>
                                            <select class="form-control multiSelect2 for" name="child_categories[]" multiple>
                                                {{-- @foreach($child_categories as $child_category)
                                                <option value="{{ $category->id }}" 
                                                 >
                                                {{ $category->name }}
                                            </option>
                                                @endforeach --}}
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
                                            <select class="form-control multiSelect2 for" name="treatments[]" multiple>
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
                                            <select class="form-control multiSelect2 for" name="cases[]" multiple>
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
                                            <select class="form-control multiSelect2 for" name="insurances[]" multiple>
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
                                        <button class="btn btn-default btn-prev" type="button"
                                        aria-controls="step-2">
                                        <span>Prev Step </span>
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
                                        <select class="form-control multiSelect2 for" name="city_id">
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
                                        <select class="form-control multiSelect2 for" name="area_id">
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
                                        <button class="btn btn-default btn-prev" type="button"
                                        aria-controls="step-2">
                                        <span>Prev Step </span>
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
                                    <button class="btn btn-default btn-prev" type="button"
                                    aria-controls="step-2">
                                    <span>Prev Step </span>
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
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>





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
//  console.log('formData',formData);



$(document).ready(function() {
    // Function to make the AJAX request
    $.noConflict();
    $(".multiSelect2").select2({
    placeholder: "Select",
    allowClear: false,
    minimumResultsForSearch: 5
});
    function fetchData() {
        $.ajax({
            type: 'GET',
            url: '/api/doctor/create-api',
            success: function(data) {
                console.log('ss', data);

                // Populate Categories dropdown
                var categoriesDropdown = $('select[name="categories[]"]');
                categoriesDropdown.empty();
                categoriesDropdown.append('<option value="disabled">{{__('cp.select_category')}}</option>');

                if (data.categories && data.categories.length > 0) {
                    $.each(data.categories, function(index, category) {
                        // Assuming each category has an 'id' and 'name' property
                        var categoryName = category.name['en']; // Use 'ar' for Arabic
                        categoriesDropdown.append('<option value="' + category.id + '">' + categoryName + '</option>');
                    });
                }
                  // Populate Child Categories dropdown
                  var childCategoriesDropdown = $('select[name="child_categories[]"]');
                    childCategoriesDropdown.empty();
                    childCategoriesDropdown.append('<option value="disabled">{{__('cp.select_sub_category')}}</option>');

                    if (data.child_categories && data.child_categories.length > 0) {
                        $.each(data.child_categories, function(index, childCategory) {
                            // Assuming each child category has an 'id' and 'name' property
                            var childCategoryName = childCategory.name['en']; // Use 'ar' for Arabic
                            childCategoriesDropdown.append('<option value="' + childCategory.id + '">' + childCategoryName + '</option>');
                        });
                    }
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Call the function when the page is loaded
    fetchData();
});


</script>
 
   
   
<style>
    /*
* demo.css
* File include item demo only specific css only
******************************************************************************/

.light-style .menu .app-brand.demo {
  height: 64px;
}

.dark-style .menu .app-brand.demo {
  height: 64px;
}

.app-brand-logo.demo {
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: center;
  justify-content: center;
  display: -ms-flexbox;
  display: flex;
  width: 34px;
  height: 24px;
}

.app-brand-logo.demo svg {
  width: 35px;
  height: 24px;
}

.app-brand-text.demo {
  font-size: 1.375rem;
}

/* ! For .layout-navbar-fixed added fix padding top tpo .layout-page */
.layout-navbar-fixed .layout-wrapper:not(.layout-without-menu) .layout-page {
  padding-top: 64px !important;
}
.layout-navbar-fixed .layout-wrapper:not(.layout-horizontal):not(.layout-without-menu) .layout-page {
  padding-top: 78px !important;
}
/* Navbar page z-index issue solution */
.content-wrapper .navbar {
  z-index: auto;
}

/*
* Content
******************************************************************************/

.demo-blocks > * {
  display: block !important;
}

.demo-inline-spacing > * {
  margin: 1rem 0.375rem 0 0 !important;
}

/* ? .demo-vertical-spacing class is used to have vertical margins between elements. To remove margin-top from the first-child, use .demo-only-element class with .demo-vertical-spacing class. For example, we have used this class in forms-input-groups.html file. */
.demo-vertical-spacing > * {
  margin-top: 1rem !important;
  margin-bottom: 0 !important;
}
.demo-vertical-spacing.demo-only-element > :first-child {
  margin-top: 0 !important;
}

.demo-vertical-spacing-lg > * {
  margin-top: 1.875rem !important;
  margin-bottom: 0 !important;
}
.demo-vertical-spacing-lg.demo-only-element > :first-child {
  margin-top: 0 !important;
}

.demo-vertical-spacing-xl > * {
  margin-top: 5rem !important;
  margin-bottom: 0 !important;
}
.demo-vertical-spacing-xl.demo-only-element > :first-child {
  margin-top: 0 !important;
}

.rtl-only {
  display: none !important;
  text-align: left !important;
  direction: ltr !important;
}

[dir='rtl'] .rtl-only {
  display: block !important;
}

/* Dropdown buttons going out of small screens */
@media (max-width: 576px) {
  #dropdown-variation-demo .btn-group .text-truncate {
    width: 254px;
    position: relative;
  }
  #dropdown-variation-demo .btn-group .text-truncate::after {
    position: absolute;
    top: 45%;
    right: 0.65rem;
  }
}

/*
* Layout demo
******************************************************************************/

.layout-demo-wrapper {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  margin-top: 1rem;
}
.layout-demo-placeholder img {
  width: 900px;
}
.layout-demo-info {
  text-align: center;
  margin-top: 1rem;
}

div#template-customizer {
  display: none !important;
}



.no-js .multi-step-form fieldset button,
.no-js .multi-step-form h2,
.multi-step-form.edit-form fieldset button,
.multi-step-form.edit-form h2 {
    display: none !important;
}

.no-js .multi-step-form fieldset,
.multi-step-form.edit-form fieldset {
    display: block !important;
}

.no-js .multi-step-form [type=submit],
.no-js .multi-step-form [type=reset],
.multi-step-form.edit-form [type=submit],
.multi-step-form.edit-form [type=reset] {
    display: inline-block !important;
}

.no-js .multi-step-form .steps,
.multi-step-form.edit-form .steps {
    display: none;
}

.multi-step-form fieldset {
    display: none;
}

.multi-step-form fieldset:first-of-type {
    display: block;
}

.multi-step-form fieldset.hidden {
    display: none;
}

.multi-step-form fieldset.visible {
    display: block;
}

.multi-step-form .steps button {
    border: 0;
}

.multi-step-form .steps [disabled] {
    background: none;
}

.multi-step-form .steps .active {
    background: #eee;
}

.steps {
    display: flex;
    justify-content: center;
    position: relative;
    flex: 0 1;
    margin: 0 0 64px;
    z-index: 2;
}

.steps button {
    width: 33.33%;
    flex: 0 0 33.33%;
    padding: 0;
    background: transparent !important;
    position: relative;
}

.steps button .icon {
    width: 68px;
    height: 68px;
    background: #fff;
    border: 2px solid #FE6521;
    display: block;
    margin: 0 auto;
    border-radius: 50%;
    font-size: 34px;
    line-height: 68px;
    color: #000000;
    /* padding: 12px; */
}

.steps button .icon img {
    max-height: 44px;
}

.steps button:nth-child(2) .icon img {
    max-width: 27px;
}

.steps button.active .icon {
    background: var(--main-color);
    color: #fff;
}

.steps button.active .icon img {
    filter: brightness(0) invert(1);
}

.steps button:nth-child(1) .icon {
    line-height: 58px;
}

.steps button h6 {
    margin: 11px 0 0;
    color: #030202;
    font-weight: bold;
    font-size: 20px;
}

.payment-inner .steps::after {
    content: "";
    position: absolute;
    width: 200%;
    right: -50%;
    left: 0;
    border-bottom: 1px dashed #707070;
    top: 36px;
    z-index: -2;
}

.payment-page.multi-step-form.body-inner {
    overflow: hidden;
}

.multi-step-form .steps button:last-child::after {
    display: none;
}

.multi-step-form .steps button::after {
    content: "";
    position: absolute;
    left: -55%;
    width: 100%;
    height: 2px;
    background: var(--main-color);
    top: 35px;
    z-index: -1;
}

.form-group {
  margin: 0 0 1rem;
}

span.error-text {
  display: inline-block;
  color: red;
  font-size: 13px;
  margin: 10px 0 0;
}



.avatar-upload {
  position: relative;
  max-width: 140px;
  margin: 0 auto 13px;
}

.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}

.avatar-upload .avatar-edit input {
  display: none;
}

.avatar-upload .avatar-edit input+label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
  line-height: 34px;
  padding: 0;
}

.avatar-upload .avatar-edit input+label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}

.avatar-upload .avatar-edit input+label:after {
  content: "\eb04";
  font-family: 'tabler-icons';
  color: #757575;
  position: absolute;
  /* top: 10px; */
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
  line-height: 34px;
  font-size: 22px;
}

.avatar-upload .avatar-preview {
  width: 140px;
  height: 140px;
  position: relative;
  border-radius: 100%;
  border: 4px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}

.avatar-upload .avatar-preview>div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

.form-group label input {
  width: 20px;
  height: 20px;
  margin-inline-end: 10px;
}

.form-group label {
  display: inline-flex;
  align-items: center;
  -webkit-align-items: center;
}

</style>
{{-- @endpush --}}