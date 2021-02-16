$('.banner').owlCarousel({
  loop:true,
  margin:20,
  // autoplay:true,
  nav:true,
  dots:false,
  items:1,
  navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
  smartSpeed: 1000,
});

$('.latest').owlCarousel({
    loop:true,
    items:6,
    margin:14,
    // autoplay:true,
    nav:true,
    dots:false,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    smartSpeed: 1000,
});

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
$(window).on('load', function() {
    if($('.nnc-preloader').length > 0) {
        $('.lds-facebook').fadeOut();
        $('.nnc-preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    }
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})