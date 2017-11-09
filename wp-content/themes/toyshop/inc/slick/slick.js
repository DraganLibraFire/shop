jQuery( document ).ready(function($) {

    $('.slick-slider-init').on('init' , function(){
        $(this).css('opacity', '1');
        $(this).css('max-height', 'none');
    })


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
        slidesToShow: 5,
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
                breakpoint: 991,
                settings: {
                    slidesToShow: 4,
                }
            },{
                breakpoint: 800,
                settings: {
                slidesToShow: 2,
                }
            }
        ],
    });

    $('.product .images .thumbnails.columns-3 a').on('click',function(e){
        e.preventDefault();

        var parent_index = $(this).parents('div').eq(0).index();
        $('.product .images .thumbnails.columns-1').slick('goTo', parent_index);


    });

    $('.product .images .thumbnails.columns-3').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplaySpeed: 2000,
        adaptiveHeight: false,
        asNavFor: '.product .images .thumbnails.columns-1',
        prevArrow: "<span class='slick-prev-lf'><i class='fa fa-angle-left' aria-hidden='true'></i></span>",
        nextArrow: "<span class='slick-next-lf'><i class='fa fa-angle-right' aria-hidden='true'></i></span>",
        responsive: [
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 2,
                }
            }
        ],

    });

    $('.product .images .thumbnails.columns-1').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 2000,
        adaptiveHeight: false,
        arrows: false,
        asNavFor: '.product .images .thumbnails.columns-3'

    });


});