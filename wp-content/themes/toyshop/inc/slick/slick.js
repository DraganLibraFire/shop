jQuery( document ).ready(function($) {



    $('.slick-slider-init').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        //autoplay: true,
        //autoplaySpeed: 2000,
        dots: true,
        adaptiveHeight: true,
        prevArrow: "<span class='slick-prev-lf'><i class='fa fa-angle-left' aria-hidden='true'></i></span>",
        nextArrow: "<span class='slick-next-lf'><i class='fa fa-angle-right' aria-hidden='true'></i></span>",

    });
    $('.related > ul.products').slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        dots: false,
        arrows: true,
        adaptiveHeight: true,
        prevArrow: "<span class='slick-prev-lf slick-arrows'><i class='fa fa-angle-left' aria-hidden='true'></i></span>",
        nextArrow: "<span class='slick-next-lf slick-arrows'><i class='fa fa-angle-right' aria-hidden='true'></i></span>",
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 620,
                settings: {
                    slidesToShow: 1,
                }
            }
        ],
    });

    $('.product .images .thumbnails.columns-3 ').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplaySpeed: 2000,
        adaptiveHeight: false,
        asNavFor: '.product .images .thumbnails.columns-1 ',
        prevArrow: "<span class='slick-prev-lf'><i class='fa fa-angle-left' aria-hidden='true'></i></span>",
        nextArrow: "<span class='slick-next-lf'><i class='fa fa-angle-right' aria-hidden='true'></i></span>",

    });

    $('.product .images .thumbnails.columns-1 ').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 2000,
        adaptiveHeight: false,
        arrows: false,
        asNavFor: '.product .images .thumbnails.columns-3'

    });


});