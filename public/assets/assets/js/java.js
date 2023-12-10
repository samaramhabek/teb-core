$(document).ready(function () {
    setTimeout(function () {
        $('body').addClass('loaded');

    }, 1000);
});

new WOW().init();
wow = new WOW({
    boxClass: 'wow', // default
    animateClass: 'animated', // default
    animateClass: 'animH', // default
    offset: 0, // default
    mobile: true, // default
    live: true // default
})
wow.init();


// All Sliader
$(document).ready(function () {
    "use strict";

    // Join Slider
    var swiperJoin = new Swiper(".join-slider", {
        loop: false,
        autoplay: {
            delay: 5000,
        },
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 15,
        grabCursor: true,
        navigation: {
            nextEl: ".swiper-button-next.join-nav",
            prevEl: ".swiper-button-prev.join-nav",
        },
    });

    // Gallery Slider
    var swiperJoin = new Swiper(".gallery-info-slider", {
        loop: false,
        autoplay: {
            delay: 5000,
        },
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 15,
        grabCursor: true,
        navigation: {
            nextEl: ".swiper-button-next.gallery-nav",
            prevEl: ".swiper-button-prev.gallery-nav",
        },
    });


    // Courses Slider
    var swiperCourses = new Swiper(".courses-slider", {
        loop: false,
        autoplay: {
            delay: 5000,
        },
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 15,
        grabCursor: true,
        navigation: {
            nextEl: ".swiper-button-next.courses-nav",
            prevEl: ".swiper-button-prev.courses-nav",
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
                spaceBetween: 8
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 8
            },
            1180: {
                slidesPerView: 4,
                spaceBetween: 24,
            }
        },
    });

    // Blogs Slider
    var swiperBlogs = new Swiper(".blogs-slider", {
        loop: false,
        autoplay: {
            delay: 5000,
        },
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 15,
        grabCursor: true,
        navigation: {
            nextEl: ".swiper-button-next.blogs-nav",
            prevEl: ".swiper-button-prev.blogs-nav",
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
                spaceBetween: 8
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 8
            },
            1180: {
                slidesPerView: 4,
                spaceBetween: 24,
            }
        },
    });

    var TopSwiper = new Swiper(".top-slider", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchOverflow: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        direction: "vertical",
        navigation: {
            nextEl: ".swiper-button-next.top-nav",
            prevEl: ".swiper-button-prev.top-nav",
        },
        breakpoints: {
            480: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            767: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            1180: {
                spaceBetween: 10,
                slidesPerView: 5,
            }
        },
    });

    var Relswiper = new Swiper('.rel-slider', {
        loop: 2,
        slidesPerView: 2,
        grid: {
            rows: 2,
        },
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next.rel-nav",
            prevEl: ".swiper-button-prev.rel-nav",
        },
    });

    // Test Slider
    var swiperTest = new Swiper(".test-slider", {
        loop: false,
        autoplay: {
            delay: 5000,
        },
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 15,
        grabCursor: true,
        navigation: {
            nextEl: ".swiper-button-next.test-nav",
            prevEl: ".swiper-button-prev.test-nav",
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
                spaceBetween: 8
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 8
            },
            1180: {
                slidesPerView: 3,
                spaceBetween: 24,
            }
        },
    });


    // Twiiter Slider
    var swiperProjects = new Swiper(".twitter-slider", {
        loop: true,
        autoplay: {
            delay: 5000,
        },
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 8,
        grabCursor: true,
        centeredSlides: true,
        navigation: {
            nextEl: ".swiper-button-next.twitter-nav",
            prevEl: ".swiper-button-prev.twitter-nav",
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
                spaceBetween: 8
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 8
            },
            1180: {
                slidesPerView: 3,
                spaceBetween: 24,
            }
        },
    });


    // Centers Slider
    var swiperProjects = new Swiper(".centers-slider", {
        loop: true,
        // autoplay: {
        //     delay: 5000,
        // },
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 8,
        grabCursor: true,
        navigation: {
            nextEl: ".swiper-button-next.centers-nav",
            prevEl: ".swiper-button-prev.centers-nav",
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
                spaceBetween: 8
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 8
            },
            1180: {
                slidesPerView: 4,
                spaceBetween: 24,
            }
        },
    });

    // Clients Slider
    var swiperClients = new Swiper(".clients-slider", {
        loop: true,
        autoplay: {
            delay: 2000,
        },
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 10,
        freeMode: true,
        grabCursor: true,
        centeredSlides: false,
        navigation: {
            nextEl: ".swiper-button-next.clients-nav",
            prevEl: ".swiper-button-prev.clients-nav",
        },
        breakpoints: {
            480: {
                slidesPerView: 2,
                spaceBetween: 0
            },
            767: {
                slidesPerView: 3,
                spaceBetween: 0
            },
            1180: {
                slidesPerView: 5,
                spaceBetween: 17
            }
        },
    });
    
    // Booking Slider
    var swiperBooking = new Swiper(".booking-slider", {
        // loop: true,
        // autoplay: {
        //     delay: 2000,
        // },
        speed: 500,
        slidesPerView: 3,
        spaceBetween: 10,
        freeMode: true,
        grabCursor: true,
        centeredSlides: false,
        navigation: {
            nextEl: ".swiper-button-next.booking-nav",
            prevEl: ".swiper-button-prev.booking-nav",
        },
        breakpoints: {
            480: {
                slidesPerView: 3,
                spaceBetween: 0
            },
            767: {
                slidesPerView: 3,
                spaceBetween: 0
            },
            1180: {
                slidesPerView: 3,
                spaceBetween: 17
            }
        },
    });

    var galleryThumbs = new Swiper(".single-thumb", {
        centeredSlides: false,
        loop: true,
        centeredSlidesBounds: true,
        spaceBetween: 10,
        slidesPerView: 4,
        watchOverflow: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        direction: 'horizontal',
        breakpoints: {
            480: {
                slidesPerView: 4,
                spaceBetween: 10,
                direction: 'horizontal',
            },
            767: {
                slidesPerView: 4,
                spaceBetween: 10,
                direction: 'horizontal',
            },
            1180: {
                slidesPerView: 6,
                spaceBetween: 12,
                watchOverflow: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                direction: 'vertical',
            }
        },
    });

    var galleryMain = new Swiper(".single-slider", {
        watchOverflow: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        preventInteractionOnTransition: true,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        thumbs: {
            swiper: galleryThumbs
        }
    });


    //Nav
    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 50) {
            $(".sticky").addClass("active");
        } else {
            $(".sticky").removeClass("active");
        }
    });

    //Header Search
    if ($('.search-box-outer').length) {
        $('.search-box-outer').on('click', function () {
            $('body').addClass('search-active');
        });
        $('.close-search').on('click', function () {
            $('body').removeClass('search-active');
        });
    }

    // HAMBURGER MENU
    $('.hamburger').on('click', function (e) {
        if ($(".navigation-menu").hasClass("active")) {
            $(".hamburger").toggleClass("open");
            $("body").toggleClass("overflow");
            $(".navigation-menu").removeClass("active");
            $(".navigation-menu .inner .menu").css("transition-delay", "0s");
            $(".navigation-menu .inner blockquote").css("transition-delay", "0s");
            $(".navigation-menu .bg-layers span").css("transition-delay", "0.3s");
        } else {
            $(".navigation-menu").addClass('active');
            $(".hamburger").toggleClass("open");
            $("body").toggleClass("overflow");
            $(".navigation-menu.active .inner .menu").css("transition-delay", "0.45s");
            $(".navigation-menu.active .inner blockquote").css("transition-delay", "0.50s");
            $(".navigation-menu .bg-layers span").css("transition-delay", "0s");
        }
        $(this).toggleClass("active");
    });

    $(".mobile-menu .sub-menu").hide();
    $(".mobile-menu .menu-item-has-children .link").click(function (e) {
        // Close all open windows
        $(".sub-menu").stop().slideUp(300);
        // Toggle this window open/close
        $(this).next(".sub-menu").stop().animate({
            width: "toggle"
        });
        e.stopPropagation();
        e.preventDefault();
    });

    // FancyBox
    $('[data-fancybox="galleryPhoto"], [data-fancybox="galleryVideo"], [data-fancybox], [data-fancybox="gallerySingle]').fancybox();

    //Odometer
    $(".counter-item").each(function () {
        $(this).isInViewport(function (status) {
            if (status === "entered") {
                for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
                    var el = document.querySelectorAll('.odometer')[i];
                    el.innerHTML = el.getAttribute("data-odometer-final");
                }
            }
        });
    });

    $(".select-2").select2({
        // placeholder: "Select a programming language",
        allowClear: true
    });

    // Phone
    $(".phone").intlTelInput({
        preferredCountries: ["sa", "gb"],
        separateDialCode: true,
        hiddenInput: "full",
    });

    // Flags
    $('.flagstrap').flagStrap({
        inputName: "country",
        buttonSize: "btn-md",
        buttonType: "button",
        selectedCountry: "DE",
        scrollable: true
    });
});


// for upload file
$(document).on('change', ':file', function () {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});
$(':file').on('fileselect', function (event, numFiles, label) {
    var input = $(this).parents('.input-group').find(':text'),
        log = numFiles > 1 ? numFiles + ' files selected' : label;
    if (input.length) {
        input.val(log);
    } else {
        //            if (log) alert(log);
    }
});
$('.form-control').focus(function () {
    $(this).parents('.form-group').addClass('focused');
});
$('.form-control').blur(function () {
    var inputValue = $(this).val();
    if (inputValue == "") {
        $(this).removeClass('filled');
        $(this).parents('.form-group').removeClass('focused');
    } else {
        $(this).addClass('filled');
    }
});
$(document).on('change', '.btn-file :file', function () {
    var fileName = $('#uploadfile').val();
    $('.filename').val(fileName);
});



$('.file-upload').on('change', function (event) {
    var name = event.target.files[0].name;
    $('.file-name').text(name);
})




function readURL(input) {
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
    readURL(this);
});