
<!DOCTYPE html>
<html  dir="{{session()->get('locale') == 'ar' ? 'rtl' : ''}}"
    lang="{{session()->get('locale')}}"
     data-framework="laravel"
    class="light-style layout-navbar-fixed layout-menu-fixed {{session()->get('locale') == 'ar' ? 'rtl' : ''}}"
    data-theme="theme-default"
    data-assets-path="{{asset('backend')}}/"
    data-template="vertical-menu-template">

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

<body>
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
                                            تواصل معنا
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="menu-right">
                                
                                <a href="#" class="lang">
                                    <i class="far fa-earth-asia"></i>
                                    Engilsh
                                </a>

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

        <!-- Start Banner-h -->
        <div class="banner-h search-page">
            <div class="main-banner-item">
                <div class="overlay-img">
                    <img src="{{asset('assets/assets/images/slider.jpg')}}" alt="#" />
                </div>
                <div class="banner-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-banner-content">
                                    <h1>احجز موعدك مع أفضل دكتور عظام في الأردن بنقرة</h1>
                                </div>
        
                                <div class="main-banner-search-form">
                                    <form id="search">
                                        <div class="row">
                                            <div class="col-lg-1 col-md-6">
                                                <div class="form-group">
                                                    <div class="form-control flagstrap"
                                                        data-input-name="country"
                                                        data-selected-country="DE"
                                                        data-button-size="btn-md"
                                                        data-button-type="button"
                                                        data-scrollable="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-2 col-md-6">
                                                <div class="form-group">
                                                    <label><i class="far fa-capsules"></i></label>
                                                    <select name="treatments" id="" class="form-control select-2">
                                                        <option value="" selected disabled>العلاج</option>
                                                        @foreach ($treatments as $treatment) 
                                                            
                                                       
                                                        <option value="{{$treatment->id}}"> {{$treatment->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-2 col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fal fa-city"></i></label>
                                                    <select name="Areas" id="" class="form-control select-2">
                                                        <option value="" selected disabled>المنطقه</option>
                                                        @foreach($Areas as $Area)
                                                        <option value="{{$Area->id}}">{{$Area->name}}</option>
                                                     @endforeach
                                                    </select>
                                                </div>
                                            </div>
        
                                            <div class="col-lg-2 col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fal fa-file-lines"></i></label>
                                                    <select name="insurances" id="" class="form-control select-2">
                                                        <option value="" selected disabled>التامين</option>
                                                      @foreach($insurances as $insurance)
                                                        <option value="{{$insurance->id}}">{{$insurance->name}} </option>
                                                      @endforeach
                                                    </select>
                                                </div>
                                            </div>
        
                                            <div class="col-lg-2 col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fal fa-file-lines"></i></label>
                                                    <select name="services" id="" class="form-control select-2">
                                                        <option value="" selected disabled>نوع الاستشارة</option>
                                                        @foreach($services as $service)
                                                        <option value="{{$service->id}}"> {{$service->name}}</option>
                                                     @endforeach
                                                    </select>
                                                </div>
                                            </div>
        
                                            <div class="col-lg-2 col-md-6">
                                                <div class="form-group">
                                                    <label><i class="far fa-user-doctor-hair-long"></i></label>
                                                    <input type="text" class="form-control" name="name" placeholder="اسم الطبيبه" />
                                                </div>
                                            </div>
        
                                            <button type="button" onclick="formSubmit()">
                                                <i class="fal fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner-h -->

        <!-- Start Search-body-h -->
        
        <section class="search-body-h body-inner">
            <div class="container">
                <div class="row">
                    <!-- Col -->
                    <div class="col-md-3">
                        <div class="sidebar-search">
                            <div class="title-sidebar">
                                <h3>
                                    تصفية
                                </h3>
                            </div>
                            <div class="accordion" id="accordionSearch">
                                <!-- accordion -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1"
                                            aria-expanded="true" aria-controls="collapse-1">
                                            <i class="fal fa-calendar-alt"></i>
                                            مواعيد متاحة
                                        </button>
                                    </h2>
                                    <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1"
                                        data-bs-parent="#accordionSearch">
                                        <div class="accordion-body">
                                            <div class="chooseItem">
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio" id="" />
                                                    <span>أي يوم</span>
                                                </div>
                                                <!-- /Item -->

                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio" id="" />
                                                    <span>اليـوم</span>
                                                </div>
                                                <!-- /Item -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /accordion -->
                                
                                <!-- accordion -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-2">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2"
                                            aria-expanded="true" aria-controls="collapse-2">
                                            <i class="fal fa-clock"></i>
                                            مواعيد غير اعتيادية
                                        </button>
                                    </h2>
                                    <div id="collapse-2" class="accordion-collapse collapse show" aria-labelledby="heading-2"
                                        data-bs-parent="#accordionSearch">
                                        <div class="accordion-body">
                                            <div class="chooseItem">
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio2" id="" />
                                                    <span>قبل الساعة 10 صباحاً</span>
                                                </div>
                                                <!-- /Item -->
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio2" id="" />
                                                    <span>قبل الساعة 10 صباحاً</span>
                                                </div>
                                                <!-- /Item -->
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio2" id="" />
                                                    <span>قبل الساعة 10 صباحاً</span>
                                                </div>
                                                <!-- /Item -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /accordion -->
                                
                                <!-- accordion -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-3">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3"
                                            aria-expanded="true" aria-controls="collapse-3">
                                            <i class="fas fa-money-bill-wave"></i>
                                            الكشفية
                                        </button>
                                    </h2>
                                    <div id="collapse-3" class="accordion-collapse collapse show" aria-labelledby="heading-3"
                                        data-bs-parent="#accordionSearch">
                                        <div class="accordion-body">
                                            <div class="chooseItem">
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio3" id="" />
                                                    <span>الكل</span>
                                                </div>
                                                <!-- /Item -->
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio3" id="" />
                                                    <span>الكل</span>
                                                </div>
                                                <!-- /Item -->
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio3" id="" />
                                                    <span>الكل</span>
                                                </div>
                                                <!-- /Item -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /accordion -->
                                
                                <!-- accordion -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-4">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4"
                                            aria-expanded="true" aria-controls="collapse-4">
                                            <i class="fas fa-stethoscope"></i>
                                            التخصصات الغرعية
                                        </button>
                                    </h2>
                                    <div id="collapse-4" class="accordion-collapse collapse show" aria-labelledby="heading-4"
                                        data-bs-parent="#accordionSearch">
                                        <div class="accordion-body">
                                            <div class="chooseItem">
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio4" id="" />
                                                    <span>الكل</span>
                                                </div>
                                                <!-- /Item -->
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio4" id="" />
                                                    <span>الكل</span>
                                                </div>
                                                <!-- /Item -->
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio4" id="" />
                                                    <span>الكل</span>
                                                </div>
                                                <!-- /Item -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /accordion -->
                                
                                <!-- accordion -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-5">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5"
                                            aria-expanded="true" aria-controls="collapse-5">
                                            <i class="faق fa-venus-mars"></i>
                                            النوع
                                        </button>
                                    </h2>
                                    <div id="collapse-5" class="accordion-collapse collapse show" aria-labelledby="heading-5"
                                        data-bs-parent="#accordionSearch">
                                        <div class="accordion-body">
                                            <div class="chooseItem">
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio5" id="" />
                                                    <span>انثي</span>
                                                </div>
                                                <!-- /Item -->
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio5" id="" />
                                                    <span>ذكر</span>
                                                </div>
                                                <!-- /Item -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /accordion -->
                                
                                <!-- accordion -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-6">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-6"
                                            aria-expanded="true" aria-controls="collapse-6">
                                            <i class="far fa-circle-h"></i>
                                            المستشفي
                                        </button>
                                    </h2>
                                    <div id="collapse-6" class="accordion-collapse collapse show" aria-labelledby="heading-6"
                                        data-bs-parent="#accordionSearch">
                                        <div class="accordion-body">
                                            <div class="chooseItem">
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio6" id="" />
                                                    <span>المستشفي</span>
                                                </div>
                                                <!-- /Item -->
                                                <!-- Item -->
                                                <div class="item">
                                                    <input type="radio" name="radio6" id="" />
                                                    <span>المستشفي</span>
                                                </div>
                                                <!-- /Item -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /accordion -->
                            </div>
                        </div>
                    </div>
                    <!-- /Col -->

                    <!-- Col -->
                    <div class="col-md-9">
                        <div class="all-doctors">
                            <!-- Item -->
                            <div class="item">
                                <div class="item-doctor">
                                    <div class="img">
                                        <img src="{{asset('assets/assets/images/avatar.jpg')}}" alt="#" />
                                    </div>
                                    <div class="details">
                                        <div class="doctor-name">
                                            <h3>
                                                دكتور حاتم فلاح الرواشدة
                                            </h3>
                                            <span>
                                                استشاري في جراحة العظام والكسور، استشاري في جراحة العظام للأطفال واعاقات الاطراف
                                            </span>
                                        </div>
                                        <div class="rateing-h">
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span>
                                                من 612 حجزوا عند الدكتور
                                            </span>
                                        </div>
                                        <div class="doctor-skills">
                                            <p>
                                                متخصص في 
                                                <a href="#">عظام كبار,</a>
                                                <a href="#">عظام اطفال</a>
                                            </p>
                                            <p>
                                                عمان، شارع الجامعة، مجمع مفيد أبو شيخة - بجانب عيادات مستشفى الإسراء -الطابق الراب
                                            </p>
                                            <p>
                                                وقت الانتظار: 15 - 30 دقيقة
                                            </p>
                                        </div>
                                        <div class="foot-block">
                                            <div class="item">
                                                <span>
                                                    <i class="fal fa-eye"></i>
                                                    1043 مشاهدة
                                                </span>
                                            </div>
                                            <div class="item">
                                                <i class="fal fa-money-bill-wave"></i>
                                                الكشفية: 30 دينار أردني
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bokking-time">
                                        <div class="title-booking">
                                            <h3>
                                                اختر لحجز موعد في العيادة
                                            </h3>
                                            <span>
                                                احجز أونلاين برقم موبايلك، بدون الحاجة للتسجيل!
                                            </span>
                                        </div>
                                        <div class="swiper booking-slider">
                                            <div class="swiper-wrapper">
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                            </div>
                                            <div class="nav-slider">
                                                <div class="swiper-button-next booking-nav">
                                                    <i class="fal fa-angle-right"></i>
                                                </div>
                                                <div class="swiper-button-prev booking-nav">
                                                    <i class="fal fa-angle-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Item -->
                            
                            <!-- Item -->
                            <div class="item">
                                <div class="item-doctor">
                                    <div class="img">
                                        <img src="{{asset('assets/assets/images/avatar.jpg')}}" alt="#" />
                                    </div>
                                    <div class="details">
                                        <div class="doctor-name">
                                            <h3>
                                                دكتور حاتم فلاح الرواشدة
                                            </h3>
                                            <span>
                                                استشاري في جراحة العظام والكسور، استشاري في جراحة العظام للأطفال واعاقات الاطراف
                                            </span>
                                        </div>
                                        <div class="rateing-h">
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span>
                                                من 612 حجزوا عند الدكتور
                                            </span>
                                        </div>
                                        <div class="doctor-skills">
                                            <p>
                                                متخصص في 
                                                <a href="#">عظام كبار,</a>
                                                <a href="#">عظام اطفال</a>
                                            </p>
                                            <p>
                                                عمان، شارع الجامعة، مجمع مفيد أبو شيخة - بجانب عيادات مستشفى الإسراء -الطابق الراب
                                            </p>
                                            <p>
                                                وقت الانتظار: 15 - 30 دقيقة
                                            </p>
                                        </div>
                                        <div class="foot-block">
                                            <div class="item">
                                                <span>
                                                    <i class="fal fa-eye"></i>
                                                    1043 مشاهدة
                                                </span>
                                            </div>
                                            <div class="item">
                                                <i class="fal fa-money-bill-wave"></i>
                                                الكشفية: 30 دينار أردني
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bokking-time">
                                        <div class="title-booking">
                                            <h3>
                                                اختر لحجز موعد في العيادة
                                            </h3>
                                            <span>
                                                احجز أونلاين برقم موبايلك، بدون الحاجة للتسجيل!
                                            </span>
                                        </div>
                                        <div class="swiper booking-slider">
                                            <div class="swiper-wrapper">
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                            </div>
                                            <div class="nav-slider">
                                                <div class="swiper-button-next booking-nav">
                                                    <i class="fal fa-angle-right"></i>
                                                </div>
                                                <div class="swiper-button-prev booking-nav">
                                                    <i class="fal fa-angle-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Item -->
                            
                            <!-- Item -->
                            <div class="item">
                                <div class="item-doctor">
                                    <div class="img">
                                        <img src="{{asset('assets/assets/images/avatar.jpg')}}" alt="#" />
                                    </div>
                                    <div class="details">
                                        <div class="doctor-name">
                                            <h3>
                                                دكتور حاتم فلاح الرواشدة
                                            </h3>
                                            <span>
                                                استشاري في جراحة العظام والكسور، استشاري في جراحة العظام للأطفال واعاقات الاطراف
                                            </span>
                                        </div>
                                        <div class="rateing-h">
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span>
                                                من 612 حجزوا عند الدكتور
                                            </span>
                                        </div>
                                        <div class="doctor-skills">
                                            <p>
                                                متخصص في 
                                                <a href="#">عظام كبار,</a>
                                                <a href="#">عظام اطفال</a>
                                            </p>
                                            <p>
                                                عمان، شارع الجامعة، مجمع مفيد أبو شيخة - بجانب عيادات مستشفى الإسراء -الطابق الراب
                                            </p>
                                            <p>
                                                وقت الانتظار: 15 - 30 دقيقة
                                            </p>
                                        </div>
                                        <div class="foot-block">
                                            <div class="item">
                                                <span>
                                                    <i class="fal fa-eye"></i>
                                                    1043 مشاهدة
                                                </span>
                                            </div>
                                            <div class="item">
                                                <i class="fal fa-money-bill-wave"></i>
                                                الكشفية: 30 دينار أردني
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bokking-time">
                                        <div class="title-booking">
                                            <h3>
                                                اختر لحجز موعد في العيادة
                                            </h3>
                                            <span>
                                                احجز أونلاين برقم موبايلك، بدون الحاجة للتسجيل!
                                            </span>
                                        </div>
                                        <div class="swiper booking-slider">
                                            <div class="swiper-wrapper">
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                            </div>
                                            <div class="nav-slider">
                                                <div class="swiper-button-next booking-nav">
                                                    <i class="fal fa-angle-right"></i>
                                                </div>
                                                <div class="swiper-button-prev booking-nav">
                                                    <i class="fal fa-angle-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Item -->
                            
                            <!-- Item -->
                            <div class="item">
                                <div class="item-doctor">
                                    <div class="img">
                                        <img src="{{asset('assets/assets/images/avatar.jpg')}}" alt="#" />
                                    </div>
                                    <div class="details">
                                        <div class="doctor-name">
                                            <h3>
                                                دكتور حاتم فلاح الرواشدة
                                            </h3>
                                            <span>
                                                استشاري في جراحة العظام والكسور، استشاري في جراحة العظام للأطفال واعاقات الاطراف
                                            </span>
                                        </div>
                                        <div class="rateing-h">
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span>
                                                من 612 حجزوا عند الدكتور
                                            </span>
                                        </div>
                                        <div class="doctor-skills">
                                            <p>
                                                متخصص في 
                                                <a href="#">عظام كبار,</a>
                                                <a href="#">عظام اطفال</a>
                                            </p>
                                            <p>
                                                عمان، شارع الجامعة، مجمع مفيد أبو شيخة - بجانب عيادات مستشفى الإسراء -الطابق الراب
                                            </p>
                                            <p>
                                                وقت الانتظار: 15 - 30 دقيقة
                                            </p>
                                        </div>
                                        <div class="foot-block">
                                            <div class="item">
                                                <span>
                                                    <i class="fal fa-eye"></i>
                                                    1043 مشاهدة
                                                </span>
                                            </div>
                                            <div class="item">
                                                <i class="fal fa-money-bill-wave"></i>
                                                الكشفية: 30 دينار أردني
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bokking-time">
                                        <div class="title-booking">
                                            <h3>
                                                اختر لحجز موعد في العيادة
                                            </h3>
                                            <span>
                                                احجز أونلاين برقم موبايلك، بدون الحاجة للتسجيل!
                                            </span>
                                        </div>
                                        <div class="swiper booking-slider">
                                            <div class="swiper-wrapper">
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                            </div>
                                            <div class="nav-slider">
                                                <div class="swiper-button-next booking-nav">
                                                    <i class="fal fa-angle-right"></i>
                                                </div>
                                                <div class="swiper-button-prev booking-nav">
                                                    <i class="fal fa-angle-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Item -->
                            
                            <!-- Item -->
                            <div class="item">
                                <div class="item-doctor">
                                    <div class="img">
                                        <img src="{{asset('assets/assets/images/avatar.jpg')}}" alt="#" />
                                    </div>
                                    <div class="details">
                                        <div class="doctor-name">
                                            <h3>
                                                دكتور حاتم فلاح الرواشدة
                                            </h3>
                                            <span>
                                                استشاري في جراحة العظام والكسور، استشاري في جراحة العظام للأطفال واعاقات الاطراف
                                            </span>
                                        </div>
                                        <div class="rateing-h">
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span>
                                                من 612 حجزوا عند الدكتور
                                            </span>
                                        </div>
                                        <div class="doctor-skills">
                                            <p>
                                                متخصص في 
                                                <a href="#">عظام كبار,</a>
                                                <a href="#">عظام اطفال</a>
                                            </p>
                                            <p>
                                                عمان، شارع الجامعة، مجمع مفيد أبو شيخة - بجانب عيادات مستشفى الإسراء -الطابق الراب
                                            </p>
                                            <p>
                                                وقت الانتظار: 15 - 30 دقيقة
                                            </p>
                                        </div>
                                        <div class="foot-block">
                                            <div class="item">
                                                <span>
                                                    <i class="fal fa-eye"></i>
                                                    1043 مشاهدة
                                                </span>
                                            </div>
                                            <div class="item">
                                                <i class="fal fa-money-bill-wave"></i>
                                                الكشفية: 30 دينار أردني
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bokking-time">
                                        <div class="title-booking">
                                            <h3>
                                                اختر لحجز موعد في العيادة
                                            </h3>
                                            <span>
                                                احجز أونلاين برقم موبايلك، بدون الحاجة للتسجيل!
                                            </span>
                                        </div>
                                        <div class="swiper booking-slider">
                                            <div class="swiper-wrapper">
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                                <!-- Swiper -->
                                                <div class="swiper-slide">
                                                    <div class="colum-booking">
                                                        <div class="title-colum">
                                                            <h4>اليـوم</h4>
                                                        </div>
                                                        <div class="all-time">
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                            <a href="#">
                                                                02:00 م
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Swiper -->
                                            </div>
                                            <div class="nav-slider">
                                                <div class="swiper-button-next booking-nav">
                                                    <i class="fal fa-angle-right"></i>
                                                </div>
                                                <div class="swiper-button-prev booking-nav">
                                                    <i class="fal fa-angle-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Item -->
                        </div>
                    </div>
                    <!-- /Col -->
                </div>
            </div>
        </section>
        <!-- End Search-body-h -->
    </main>

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
    


   <script>
   function formSubmit() {
    // Prevent default form submission behavior
    event.preventDefault();

    // Collect form data
    var formData = new FormData(document.getElementById("search"));
console.log('lkj')
    // Construct the URL with query parameters based on form data
    var action = '{{ route('doctor.search') }}';
    var url = action + '?' + new URLSearchParams(formData).toString();

    // Send GET request
    fetch(url, {
        method: 'GET',
    })
    .then(response => response.json())
    .then(data => {
        console.log('ppp',response.data);
        if (data.message === 'success') {
            // Redirect or show a message as needed
            alert(data.message);
        } else {
            alert('Form submission failed');
        }
    })
    .catch(error => {
        console.error('Error sending request:', error);
        alert('An error occurred while submitting the form.');
    });
}
</script>
    <script src="{{asset('assets/assets/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('assets/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('assets/assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/assets/js/odometer.min.js')}}"></script>
    <script src="{{asset('assets/assets/js/viewport.jquery.js')}}"></script>
    <script src="{{asset('assets/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/assets/js/intlTelInput-jquery.min.js')}}"></script>
    <script src="{{asset('assets/assets/js/jquery.flagstrap.js')}}"></script>
    <script src="{{asset('assets/assets/js/java.js')}}"></script>
</body>

</html>