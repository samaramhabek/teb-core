
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
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/title.png" />
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
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-1 col-md-6">
                                                <div class="form-group">
                                                    <div class="form-control flagstrap" data-input-name="country"
                                                        data-selected-country="DE" data-button-size="btn-md"
                                                        data-button-type="button" data-scrollable="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="form-group">
                                                    <label><i class="far fa-capsules"></i></label>
                                                    <select name="" id="" class="form-control select-2">
                                                        <option value="" selected disabled>العلاج</option>
                                                        <option value="1">اسم العلاج </option>
                                                        <option value="2">اسم العلاج </option>
                                                        <option value="3">اسم العلاج </option>
                                                        <option value="4">اسم العلاج </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fal fa-city"></i></label>
                                                    <select name="" id="" class="form-control select-2">
                                                        <option value="" selected disabled>المنطقه</option>
                                                        <option value="1">اسم المنطقه </option>
                                                        <option value="2">اسم المنطقه </option>
                                                        <option value="3">اسم المنطقه </option>
                                                        <option value="4">اسم المنطقه </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fal fa-file-lines"></i></label>
                                                    <select name="" id="" class="form-control select-2">
                                                        <option value="" selected disabled>التامين</option>
                                                        <option value="1">اسم التامين </option>
                                                        <option value="2">اسم التامين </option>
                                                        <option value="3">اسم التامين </option>
                                                        <option value="4">اسم التامين </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fal fa-file-lines"></i></label>
                                                    <select name="" id="" class="form-control select-2">
                                                        <option value="" selected disabled>نوع الاستشارة</option>
                                                        <option value="1">استشارة عيادة</option>
                                                        <option value="2">استشارة عبر الانترنت</option>
                                                        <option value="3">زيارة منزلية</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-6">
                                                <div class="form-group">
                                                    <label><i class="far fa-user-doctor-hair-long"></i></label>
                                                    <input type="text" class="form-control" placeholder="اسم الطبيبه" />
                                                </div>
                                            </div>

                                            <button type="submit">
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

        <!-- Start Single-doctor -->
        <section class="search-body-h single-doctor body-inner">
            <div class="container">
                <div class="row">
                    <!-- Col -->
                    <div class="col-md-12">
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
                                                استشاري في جراحة العظام والكسور، استشاري في جراحة العظام للأطفال واعاقات
                                                الاطراف
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
                                                عمان، شارع الجامعة، مجمع مفيد أبو شيخة - بجانب عيادات مستشفى الإسراء
                                                -الطابق الراب
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

                        <div class="more-details-doctor">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#info-1">
                                        البيانات
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#info-2">
                                        شركات التأمين
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#info-3">
                                        العلاجات
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#info-4">
                                        آراء المرضى
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#info-5">
                                        معرض الصور
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <!-- Tab1 -->
                                <div class="tab-pane fade show active" id="info-1">
                                    <div class="doctor-info">
                                        <h3>
                                            الخبرة المهنية
                                        </h3>

                                        <p>
                                            الدكتور إبراهيم السعودي هو استشاري جراحة العظام والمفاصل. حاصل على
                                            شهادة البورد الأردني في جراحة العظام والبورد العربي.
                                        </p>

                                        <p>
                                            الدكتور إبراهيم السعودي هو استشاري جراحة العظام والمفاصل. حاصل على
                                            شهادة البورد الأردني في جراحة العظام والبورد العربي.
                                        </p>
                                        <h3>
                                            الخبرة المهنية
                                        </h3>

                                        <p>
                                            الدكتور إبراهيم السعودي هو استشاري جراحة العظام والمفاصل. حاصل على
                                            شهادة البورد الأردني في جراحة العظام والبورد العربي.
                                        </p>
                                    </div>
                                </div>
                                <!-- /Tab1 -->
                                
                                <!-- Tab2 -->
                                <div class="tab-pane fade" id="info-2">
                                    <div class="doctor-info">
                                        <ul>
                                            <li>
                                                شركة الاسمدة أليابانية نات هيلث
                                            </li>
                                            <li>
                                                شركة الاسمدة أليابانية نات هيلث
                                            </li>
                                            <li>
                                                شركة الاسمدة أليابانية نات هيلث
                                            </li>
                                            <li>
                                                شركة الاسمدة أليابانية نات هيلث
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Tab2 -->
                                
                                <!-- Tab3 -->
                                <div class="tab-pane fade" id="info-3">
                                    <div class="doctor-info">
                                        <h3>
                                            علاجات أخرى
                                        </h3>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    دمج فقرات العمود الفقري
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    دمج فقرات العمود الفقري
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    دمج فقرات العمود الفقري
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Tab3 -->
                                
                                <!-- Tab4 -->
                                <div class="tab-pane fade" id="info-4">
                                    <div class="doctor-info">
                                        <div class="allComments">
                                            <div class="allComments-inner">
                                                <!-- Item -->
                                                <div class="item">
                                                    <div class="img">
                                                        <img src="{{asset('assets/assets/images/avatar.jpg')}}" alt="#" />
                                                    </div>
                                                    <div class="details">
                                                        <div class="name-user">
                                                            <h3>
                                                                اسم المستخدم
                                                            </h3>
                                                            <span class="date-h">
                                                                منذ 3 ساعات
                                                            </span>
                                                        </div>
                                                        <p>
                                                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- /Item -->
                                                
                                                <!-- Item -->
                                                <div class="item">
                                                    <div class="img">
                                                        <img src="{{asset('assets/assets/images/avatar.jpg')}}" alt="#" />
                                                    </div>
                                                    <div class="details">
                                                        <div class="name-user">
                                                            <h3>
                                                                اسم المستخدم
                                                            </h3>
                                                            <span class="date-h">
                                                                منذ 3 ساعات
                                                            </span>
                                                        </div>
                                                        <p>
                                                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- /Item -->
                                                
                                                <!-- Item -->
                                                <div class="item">
                                                    <div class="img">
                                                        <img src="{{asset('assets/assets/images/avatar.jpg')}}" alt="#" />
                                                    </div>
                                                    <div class="details">
                                                        <div class="name-user">
                                                            <h3>
                                                                اسم المستخدم
                                                            </h3>
                                                            <span class="date-h">
                                                                منذ 3 ساعات
                                                            </span>
                                                        </div>
                                                        <p>
                                                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- /Item -->
                                            </div>
                                            
                                            <div class="addComment">
                                                <div class="title">
                                                    <h3>
                                                        Leave A Comment
                                                    </h3>
                                                </div>
                                                <form action="#" class="row">
                                                    <!-- Col -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="Name" placeholder="اسمك" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <!-- /Col -->
                                                    
                                                    <!-- Col -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" name="Name" placeholder="البريد الإلكتروني" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <!-- /Col -->
                                                    
                                                    <!-- Col -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea name="Name" placeholder="الرسالة" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- /Col -->
                                                    
                                                    <!-- Col -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-form">
                                                                <span>Send</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /Col -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Tab4 -->
                                
                                <!-- Tab5 -->
                                <div class="tab-pane fade" id="info-5">
                                    <div class="doctor-info">
                                        <div class="swiper gallery-info-slider">
                                            <div class="swiper-wrapper">
                                                <!-- Swiper-slide -->
                                                <div class="swiper-slide">
                                                    <div class="img">
                                                        <img src="{{asset('assets/assets/images/slider.jpg')}}" alt="#" />
                                                    </div>
                                                </div>
                                                <!-- /Swiper-slide -->
                                                <!-- Swiper-slide -->
                                                <div class="swiper-slide">
                                                    <div class="img">
                                                        <img src="{{asset('assets/assets/images/slider.jpg')}}" alt="#" />
                                                    </div>
                                                </div>
                                                <!-- /Swiper-slide -->
                                                <!-- Swiper-slide -->
                                                <div class="swiper-slide">
                                                    <div class="img">
                                                        <img src="{{asset('assets/assets/images/slider.jpg')}}" alt="#" />
                                                    </div>
                                                </div>
                                                <!-- /Swiper-slide -->
                                            </div>
                                        </div>
                                        <div class="nav-slider">
                                            <div class="swiper-button-next gallery-nav">
                                                <i class="fal fa-angle-left"></i>
                                            </div>
                                            <div class="swiper-button-prev gallery-nav">
                                                <i class="fal fa-angle-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Tab5 -->
                            </div>
                            
                        </div>
                    </div>
                    <!-- /Col -->
                </div>
            </div>
        </section>
        <!-- End single-doctor -->
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