


@extends('layouts.admin')


@section('title', __('cp.doctors'))

@section('admin')
 





<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{__('cp.form_doctor')}} </span></h4>

            <!-- Validation Wizard -->
            <div class="col-12 mb-4">
                {{-- <small class="text-light fw-medium">Validation</small> --}}
                <div id="wizard-validation" class="bs-stepper mt-2">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#account-details-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label mt-1">
                                    <span class="bs-stepper-title">{{__('cp.account_details')}}</span>
                                    <span class="bs-stepper-subtitle">{{__('cp.setup_account_details')}}</span>
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
                                    <span class="bs-stepper-title">{{__('cp.personal_info')}}</span>
                                    <span class="bs-stepper-subtitle">{{__('cp.add_personal_info')}}</span>
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
                                    <span class="bs-stepper-title">{{__('cp.social_links')}}</span>
                                    <span class="bs-stepper-subtitle">{{__('cp.add_social_links')}}</span>
                                </span>
                            </button>
                        </div>
                    </div>
{{-- 
                    <div id="map" style="height: 50vh;"></div>
                    <div class="col-md-6"></div> --}}

                    <div class="bs-stepper-content  multi-step-form">
                        <form id="addNewDoctorForm"  enctype="multipart/form-data" >
                            @csrf
                            @if($doctor)
                            <input type="hidden" name="id" value="{{optional($doctor)->id}}">
                            @endif
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
                                                value="{{ optional($doctor)->getTranslation('first_name', 'ar') }}" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="{{__('cp.first_name_en')}}"
                                                name="first_name_en"  value="{{ optional($doctor)->getTranslation('first_name', 'en') }}" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="{{__('cp.last_name_ar')}}" name="last_name_ar"
                                                value="{{ optional($doctor)->getTranslation('first_name', 'ar') }}"   required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="{{__('cp.last_name_en')}}"
                                                value="{{ optional($doctor)->getTranslation('last_name', 'en') }}"    name="last_name_en" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="{{__('cp.title_ar')}}"
                                                value="{{ optional($doctor)->getTranslation('title', 'ar') }}"   name="title_ar" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="{{__('cp.title_en')}}"
                                                value="{{ optional($doctor)->getTranslation('first_name', 'en') }}"  name="title_en" required />
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
                                                value="{{ optional($doctor)->getTranslation('description', 'ar') }}"  required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="{{__('cp.description_en')}}"
                                                value="{{ optional($doctor)->getTranslation('description', 'en') }}"   name="description_en" required />
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
                                                    style="background-image: url('{{ optional($doctor)->image->original_url ?? asset('assets/img/avatar.jpg') }}')">
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
                                               
                                                   
                                                    <option value="0" @if(optional($doctor)->gender === '0') selected @endif>{{__('cp.fmale')}}</option>
                                                    <option value="1" @if(optional($doctor)->gender === '1') selected @endif>{{__('cp.male')}}</option>
                                              
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="nationality_id">
                                                <option value="" @if(optional($doctor)->nationality_id === '')  @endif>{{__('cp.nationality')}}</option>
                                                @foreach($nationalities as $nationality)
                                                    <option value="{{ $nationality->id }}" @if(optional($doctor)->nationality_id == $nationality->id) selected @endif>
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
                                                placeholder="{{__('cp.number_phone')}}" name="Phone" required  value="{{optional($doctor)->Phone}}" />
                                              
                                        </div>
                                    </div>
                                        <!-- Col -->
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="text" class="form-control email"
                                        placeholder="{{__('cp.email')}}" name="email" required value="{{optional($doctor)->email}}" />
                                        </div> 
                                      
                                    </div>



                                    
                                    
                                    <!-- /Col -->
                                  
                                     
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="{{__('cp.lat')}}" name="lat" required value="{{optional($doctor)->lat}}" />
                                              
                                        </div>
                                    </div>
                                        <!-- Col -->
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="text" class="form-control lang"
                                        placeholder="{{__('cp.lang')}}" name="lang" required value="{{optional($doctor)->lang}}" />
                                        </div> 
                                      
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="check">
                                                {{__('cp.trainer')}}:
                                                <input type="checkbox" name="is_trainer" {{ optional($doctor)->is_trainer ? 'checked' : '' }} />
                                              
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
                                                            @if(optional($doctor)->category_parent && $doctor->category_parent->contains('id', $category->id)) selected @endif>
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
                                                        @if(optional($doctor)->category_child && $doctor->category_child->contains('id', $category->id)) selected @endif>
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
                                                       
                                                        @if(optional($doctor)->treatments && $doctor->treatments->contains('id', $treatment->id)) selected @endif>
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
                                                      
                                                        @if(optional($doctor)->cases && $doctor->cases->contains('id', $case->id)) selected @endif>
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
                                                      
                                                        @if(optional($doctor)->insurances && $doctor->insurances->contains('id', $insurance->id)) selected @endif>
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
                                                <option value="{{ $city->id }}" @if(optional($doctor)->city_id == $city->id) selected @endif>
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
                                                <option value="{{ $area->id }}" @if(optional($doctor)->area_id == $area->id) selected @endif>
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
                                                value="{{ optional($doctor)->getTranslation('address', 'ar') }}"      name="address_ar" required />
                                        </div>
                                    </div>
                                    <!-- /Col -->

                                    <!-- Col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="{{__('cp.address_en')}}"
                                                value="{{ optional($doctor)->getTranslation('address', 'ar') }}"     name="address_en" required />
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
                                                <p>{{__('cp.existing_file')}}: <a href="{{ $doctor->upload1->original_url  ?? null}}" target="_blank">{{ $doctor->upload1->file_name ?? null}}</a></p>
                                            {{-- @endif --}}
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="upload2">  {{__('cp.download_university_certificate')}}</label>
                                            <input type="file" class="form-control" name="upload2" />
                                            {{-- @if(optional($doctor->upload2)->original_url) --}}
                                                <p>{{__('cp.existing_file')}}: <a href="{{ $doctor->upload2->original_url ?? null }}" target="_blank">{{ $doctor->upload2->file_name ?? null }}</a></p>
                                            {{-- @endif --}}
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="upload3">{{__('cp.download_your_personal_iD')}}</label>
                                            <input type="file" class="form-control" name="upload3" />
                                            {{-- @if(optional($doctor->upload3)->original_url) --}}
                                                <p>{{__('cp.existing_file')}}: <a href="{{ $doctor->upload3->original_url ?? null }}" target="_blank">{{ $doctor->upload3->file_name ?? null }}</a></p>
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
                                @if($doctor)
                                <div class="form-h row">
                                    @foreach ($services as $service)
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="check{{ $service->id }}">
                                                    <input type="checkbox" id="check{{ $service->id }}" name="services[]" value="{{ $service->id }}" {{ $doctor->service->contains('id', $service->id) ? 'checked' : '' }} />
                                                    {{ $service->name }}
                                                </label>
                                            </div>
                                         
                                        </div>
                                
                                        <div class="col-md-10">
                                            
                                           
                                                <div class="form-group">
                                                    @php
                                                        $serviceData = $doctor->service->where('id', $service->id)->first();
                                                    @endphp
                                                    {{-- @if ($serviceData) --}}
                                                        <input type="text" class="form-control" placeholder="{{ $service->name }}" name="prices[]" value="{{ isset($serviceData->pivot->value) ? $serviceData->pivot->value : '' }}" />
                                                    {{-- @endif --}}
                                                </div>
                                        </div>
                                    @endforeach
                                  
                                </div>
                                @else


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
                                @endif
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
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initial state
            toggleServices();
    
            // Event listener for hospital selection change
            document.getElementById('hospitalSelect').addEventListener('click', function () {
                toggleServices();
                console.log('hospital selection change');
            });
        });
    
        function toggleServices() {
           // var selectedHospital = document.getElementById('hospitalSelect').value;
    
            // Hide all service checkboxes
            var serviceCheckboxes = document.querySelectorAll('.service-checkbox');
          //  console.log(serviceCheckboxes);
            serviceCheckboxes.forEach(function (checkbox) {
                checkbox.style.display = 'none';
            });
    
            // Show service checkboxes for the selected hospital
            var selectedHospitalServices = document.querySelectorAll('.service-checkbox[data-hospital="' + data + '"]');
           console.log(selectedHospitalServices);
            selectedHospitalServices.forEach(function (checkbox) {
                checkbox.style.display = 'block';
            });
        }
    </script> --}}
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

        // $('#addNewDoctorForm')
//         $("#addNewDoctorForm").submit(function(event) {

//     event.preventDefault();

// });
function formSubmit()
{
    console.log('formData');
var formData = new FormData(document.getElementById("addNewDoctorForm"));
        var action='{{ route('admin.createDoctor') }}';

       fetch(action, {
            method: 'POST',
            body: formData,
        }).then(response => response.json()).then(data => {
                if (data.message === 'success') {
                window.location.href = "{{ route('admin.tables') }}";
                }
                else {
                alert('Form submission failed');
            }
        })

}
     console.log('formData',formData);

  
 

// let map;

// function initMap() {
//   map = new google.maps.Map(document.getElementById("map"), {
//     center: { lat: -34.397, lng: 150.644 },
//     zoom: 8,
//   });
// }

// window.initMap = initMap;
// 
</script>
{{-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmbQF5P5h2VjGRv01mgsfS7RnOAMBhIDs&callback=initMap">
</script> --}}
{{-- <script async
src="https://maps.googleapis.com/maps/api/js?key=75168e1133a999ceb6837e318fd2ad8855ee1ddb&callback=initMap"></script>  --}}
{{-- <script>
    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",initMap+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
      key: "75168e1133a999ceb6837e318fd2ad8855ee1ddb",
      v: "weekly",
      // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
      // Add other bootstrap parameters as needed, using camel case.
    });
  </script> --}}
    @endpush




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