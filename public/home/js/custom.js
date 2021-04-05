$('.banner').owlCarousel({
    loop: true,
    margin: 20,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    nav: true,
    dots: true,
    items: 1,
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    smartSpeed: 1000,
});

// $('.latest').owlCarousel({
//     loop:true,
//     margin:14,
//     // autoplay:true,
//     center: true,
//     nav:true,
//     dots:false,
//     navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
//     smartSpeed: 1000,
//     responsive: {
//         0: {
//             items: 1,
//         },
//         640: {
//             items: 2,
//         },
//         978: {
//             items: 4,
//         },
//         1200: {
//             items: 6,
//         },
//     },
// });

// Can also be used with $(document).ready()
$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
    });
});

$(".image-popup").magnificPopup({
    type: "image",
    removalDelay: 300,
    mainClass: "mfp-with-zoom",
    gallery: {
        enabled: true,
    },
    zoom: {
        enabled: true, // By default it's false, so don't forget to enable it

        duration: 300, // duration of the effect, in milliseconds
        easing: "ease-in-out", // CSS transition easing function

        opener: function (openerElement) {
            return openerElement.is("img")
                ? openerElement
                : openerElement.find("img");
        },
    },
});

//Pre-loader
$(window).on('load', function () {
    if ($('.nnc-preloader').length > 0) {
        $('.lds-facebook').fadeOut();
        $('.nnc-preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({ 'overflow': 'visible' });
    }
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$('.center').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 5,
    arrows: false,
    responsive: [
        {
            breakpoint: 993,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 4
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }
    ]
});