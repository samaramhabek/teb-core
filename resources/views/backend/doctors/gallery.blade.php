


@extends('layouts.admin')


@section('title', __('cp.doctors'))

@section('admin')






<body>
    {{$doctor}}
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
                                    <span class="bs-stepper-title">{{__('cp.doctor_gellary')}}</span>
                                    <span class="bs-stepper-subtitle">{{__('cp.doctor_gellary')}}</span>
                                </span>
                            </button>
                        </div>
                        {{-- <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div> --}}
                        {{-- <div class="step" data-target="#personal-info-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">{{__('cp.personal_info')}}</span>
                                    <span class="bs-stepper-subtitle">{{__('cp.add_personal_info')}}</span>
                                </span>
                            </button>
                        </div> --}}
                        {{-- <div class="line">
                            <i class="ti ti-chevron-right"></i>
                        </div> --}}
                        {{-- <div class="step" data-target="#social-links-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">{{__('cp.social_links')}}</span>
                                    <span class="bs-stepper-subtitle">{{__('cp.add_social_links')}}</span>
                                </span>
                            </button>
                        </div> --}}
                    </div>
{{--
                    <div id="map" style="height: 50vh;"></div>
                    <div class="col-md-6"></div> --}}

                    <div class="bs-stepper-content  multi-step-form">
                        <form id="addNewDoctorForm" enctype="multipart/form-data">
                            @csrf
                            @if($doctor_id)
                            <input type="hidden" name="id" value="{{$doctor_id}}">
                            @endif
                        
                            <fieldset aria-label="Step Two" id="step-4">
                                <div class="title-step">
                                    <h3>{{__('cp.upload_documents')}}</h3>
                                </div>
                        
                                <div class="form-h row">
                                    <!-- Video Upload -->
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="upload1">{{__('cp.Download_video')}}</label>
                                            <input type="file" class="form-control" name="video" id="videoUpload" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <video width="320" height="240" controls>
                                            <source src="path_to_your_uploaded_video.mp4" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="form-label" for="add-lesson-video_url">{{__('cp.video_url')}}</label>
                                        <input type="url" value= "{{ old('video_url', $doctor->video_url) }}" class="form-control" id="add-lessonvideo_url" placeholder="{{__('cp.video_url')}}" name="video_url" aria-label="{{__('cp.video_url')}}" />
                                        </div>
                                    </div>
                        
                                    <!-- Image Upload -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="imageUpload">{{__('cp.download_images')}}</label>
                                            <input type="file" class="form-control" name="imageUpload[]" id="imageUpload" multiple />
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="imageContainer">
                                        <!-- Images will be displayed here -->
                                        @foreach($doctor->media as $media)
                                        <img src="{{ $media->getUrl() }}" alt="Image">
                                    @endforeach
                                    </div>
                        
                                    <!-- Buttons -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-success btn-done" type="button" onclick="formSubmit()">
                                                <span>{{__('cp.submit')}}</span>
                                            </button>
                                            <button class="btn btn-default btn-prev" type="button" aria-controls="step-5">
                                                <span>Prev Step</span>
                                            </button>
                                        </div>
                                    </div>
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
   
    <script>
     

     let selectedFiles = []; // Array to hold selected files

document.getElementById('imageUpload').addEventListener('change', function (e) {
    selectedFiles = Array.from(e.target.files);
    renderImages();
});

function renderImages() {
    const imageContainer = document.getElementById('imageContainer');
    imageContainer.innerHTML = ''; // Clear previous images
    
    selectedFiles.forEach((file, index) => {
        const imageUrl = URL.createObjectURL(file);
        
        const img = document.createElement('img');
        img.src = imageUrl;
        img.alt = 'Uploaded Image';
        
        const deleteBtn = document.createElement('button');
        deleteBtn.innerText = 'Delete';
        
        deleteBtn.addEventListener('click', function() {
            // Remove the image container from the DOM
            container.remove();
            
            // Remove the file from the selectedFiles array
            selectedFiles.splice(index, 1);
            
            // Re-render images after removing the file
            renderImages();
        });
        
        const container = document.createElement('div');
        container.className = 'image-item';
        
        container.appendChild(img);
        container.appendChild(deleteBtn);
        
        imageContainer.appendChild(container);
    });
}



document.getElementById('videoUpload').addEventListener('change', function (e) {
    const file = e.target.files[0];
    const url = URL.createObjectURL(file);
    document.querySelector('video source').src = url;
    document.querySelector('video').load();
});

     $(document).ready(function() {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".customer_records"); //Fields wrapper
        var add_button = $(".extra-fields-customer"); //Add button ID

        var x = 0; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(`<div class="customer_records row"><div class="col-md-6"><div class="form-group"><input type="text" class="form-control"placeholder="first_name_ar" name="first_name_ar"value="" required /></div></div><div class="col-md-6"><div class="form-group"><input type="text" class="form-control"placeholder="last_name_en"name="last_name_en"  value="" required /></div></div><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div>`);
                console.log($(wrapper));
            }
            // getFF();
        });


        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });

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

        $(".multiSelect2").select2({
    placeholder: "Select",
    allowClear: false,
    minimumResultsForSearch: 5
});
        // $('#addNewDoctorForm')
//         $("#addNewDoctorForm").submit(function(event) {

//     event.preventDefault();

// });
function formSubmit()
{
    console.log('formData');
var formData = new FormData(document.getElementById("addNewDoctorForm"));

        var action='{{ route('admin.storegallery') }}';

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
.image-item {
    display: inline-block;
    margin: 10px;
    position: relative; /* For positioning the delete button */
}

.image-item img {
    width: 150px; /* Adjust as needed */
    height: auto;
    border: 1px solid #ddd;
    padding: 5px;
}

.image-item button {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: #ff0000; /* Red color for delete button */
    color: #fff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

</style>
