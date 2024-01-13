
<!DOCTYPE html>

<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('backend')}}/"
    data-template="vertical-menu-template">
<head>
    <style>
        .custom-image-size {
        width: 300px; /* or whatever size you prefer */
        height: auto; /* this will maintain the aspect ratio */
    }
    
    </style>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login Cover - Pages | Vuexy - Bootstrap Admin Template</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('backend')}}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('backend')}}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/@form-validation/umd/styles/index.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="{{asset('backend')}}/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('backend')}}/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('backend')}}/js/config.js"></script>
</head>

<body>
<!-- Content -->

<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img
                    src="{{asset('backend')}}/img/pexels-karolina-grabowska-4021775 (1).jpg"
                    alt="auth-login-cover"
                    class="img-fluid my-5 auth-illustration"
                    data-app-light-img="download (3).jpg"
                    data-app-dark-img="download (3).jpg" />

                <img
                    src="{{asset('backend')}}/img/illustrations/bg-shape-image-light.png"
                    alt="auth-login-cover"
                    class="platform-bg"
                    data-app-light-img="illustrations/bg-shape-image-light.png"
                    data-app-dark-img="illustrations/bg-shape-image-dark.png" />
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-8 col-lg-5 align-items-center p-sm-5 p-4">
            <div class="w-px-900 mx-auto">
                <!-- Logo -->
                <div class="app-brand mb-4">
                    <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                    <img class="custom-image-size" src="{{asset('backend')}}/img/logo.png">

            
                </span>
                    </a>
                </div>
                <!-- /Logo -->
                <h3 class="mb-1 fw-bold">Welcome To Teb Core Dashboard! 👋</h3>
                <p class="mb-4">Please sign-in to your account and start the adventure</p>
                <p class="mb-4">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                </p>

                <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email or Username</label>
                        <input
                            type="text"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="Enter your email or username"
                            autofocus />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
{{--                            <a href="auth-forgot-password-cover.html">--}}
{{--                                <small>Forgot Password?</small>--}}
{{--                            </a>--}}
                        </div>
                        <div class="input-group input-group-merge">
                            <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-grid w-100">Sign in</button>
                    <a href="{{route('forget.password.get')}}">forget password</a>
                </form>


            </div>
        </div>
        <!-- /Login -->
    </div>
</div>

<!-- / Content -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="{{asset('backend')}}/vendor/libs/jquery/jquery.js"></script>
<script src="{{asset('backend')}}/vendor/libs/popper/popper.js"></script>
<script src="{{asset('backend')}}/vendor/js/bootstrap.js"></script>
<script src="{{asset('backend')}}/vendor/libs/node-waves/node-waves.js"></script>
<script src="{{asset('backend')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{asset('backend')}}/vendor/libs/hammer/hammer.js"></script>
<script src="{{asset('backend')}}/vendor/libs/i18n/i18n.js"></script>
<script src="{{asset('backend')}}/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="{{asset('backend')}}/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('backend')}}/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
<script src="{{asset('backend')}}/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
<script src="{{asset('backend')}}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>

<!-- Main JS -->
<script src="{{asset('backend')}}/js/main.js"></script>

<!-- Page JS -->
<script src="{{asset('backend')}}/js/pages-auth.js"></script>

</body>
</html>
<style>
    .img-fluid{
        width: inherit;
        height: 700px;
    }
    .app-brand-logo.demo{
width:314px;
height: 119px;
    }
    </style>