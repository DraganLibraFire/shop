jQuery(function($){

    $('.ubermenu-target').each(function(){
        var _this = $(this).find('.ubermenu-target-text');

        if( $(_this).find("i").length <= 0 )
            $(_this).html($(_this).html().replace(/-/g, ' '));

        $(this).animate({ opacity: 1});
    });

    $('#breadcrumbs span a, .breadcrumb_last').each(function(){
        var _this = $(this);

        $(_this).html($(_this).html().replace(/-/g, ' '));

        $('#breadcrumbs').animate({ opacity: 1});
    });
    function equal(){

        var heights = {
            'full' : {}
        };

        $("[data-equal]").css('height', 'auto');
        $("[class*='data-equal-']").css('height', 'auto');

        if(!$("body").hasClass("class")){

            $("[data-equal], [class*='data-equal-']").each(function(){

                var data_type = $(this).is("[class*='data-equal-']") ? 'class' : 'data';

                if( data_type == 'data' ){
                    var $elem = $(this).attr('data-equal');
                    var size = $(this).attr('data-equal-width');
                } else{
                    var classes = this.className.split(/\s+/);

                    for( var i = 0; i < classes.length; i++ ){

                        var class_name = classes[ i ];

                        if( class_name.indexOf( 'data-equal-') > -1 ){
                            $elem = class_name.replace('data-equal-', '');
                        }
                        if( class_name.indexOf( 'data-equal-width-') > -1 ){
                            size = class_name.replace('data-equal-width-', '');
                        }
                    }
                }

                if( size == undefined )
                    size = 'full';

                if( heights[ size ] == undefined ){
                    heights[ size ] = {}
                }

                if( heights[ size ][ $elem ] == undefined ){
                    heights[ size ][ $elem ] = 0;
                }

                var this_height = jQuery(this).outerHeight();

                if( this_height > heights[ size ][ $elem ] ){
                    heights[ size ][ $elem ] = this_height;
                }
            });
        }
        var $window_width = $(window).outerWidth();

        for( var breakpoint in heights){
            var element_data_value = heights[ breakpoint ];

            for( var element in element_data_value ){
                if( $window_width > parseInt(breakpoint) || breakpoint == 'full' ){
                    $("[data-equal='"+element+"'], [class*='data-equal-"+element+"']").css('height', element_data_value[ element ]).addClass('equaled');
                    $("[data-equal='"+element+"'], [class*='data-equal-"+element+"']").animate({
                        opacity: 1
                    }, 200);
                }
            }
        }
    }
    $(window).on('resize load', equal);
    $(document).on('sf:ajaxfinish', function(){
        var timeout = setTimeout(function(){
            equal();
        }, 500);
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', equal);


    var button_color = $(".woocommerce a.button.add_to_cart_button").css('background-color');

    var h2 = $(".related.products > h2");
    if( $(h2).length > 0 ){
        var h2_html = $(h2).html();

        var h2_html_array = h2_html.split(' ');

        h2_html_array[1] = '<span class="purple-text">' + h2_html_array[1] + '</span>';

        $(h2).html(h2_html_array.join( ' ' ));

    }

    $(".share-buttons a").on('click', function(e){
        e.preventDefault();
        PopupCenter( $(this).attr('href'), $(this).attr('title'), 500, 300 );
    })

    function PopupCenter(url, title, w, h) {
        // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        // Puts focus on the newWindow
        if (window.focus) {
            newWindow.focus();
        }
    }

    $( 'body' ).on( 'updated_wc_div', function(){
        $("input[type='number']").stepper();
    } );
    $("input[type='number']").stepper();

    //$('form.searchandfilter li li label').append('<span class="search-check"><i class="fa fa-square-o" aria-hidden="true"></i></span>');
    $(document).on("sf:init", ".searchandfilter", function(){

        //var ch = jQuery(".postform").detach();
        //jQuery(".woocommerce-ordering").prepend( ch );
    });

    var $sort_select = jQuery(".sf-field-sort_order select").clone(true);
    $sort_select.on('change', function(){
        jQuery(".searchandfilter .sf-field-sort_order select").val( $(this).val()).trigger('change');
    });

    $sort_select.prependTo( jQuery(".sort-filter-wrapper-lf") );
    $('.postform, .product-order-wrapper .orderby,.product-order-wrapper select').select2({
        minimumResultsForSearch: Infinity
    });
    $('.product-order-wrapper  .select2-selection__arrow').append('<i class="fa fa-angle-down"></i>');
    $('.header-small-toggle-wrapper span').on('click',function(){
        $('.header-small').slideToggle('slow');
        $(this).toggleClass('expand');
    });
    $('.more-filters').on('click',function(){
        $('.widget.widget_search_filter_register_widget form').slideToggle('slow');
        $('.widget.woocommerce.widget_product_categories').slideToggle('slow');
        $(this).toggleClass('expand');
    });

    $('.sf-field-taxonomy-product_cat > ul  li input').on('click', filterToggleSlide);

    function filterToggleSlide(){
        $(".searchandfilter ul li input").each(function(){
            if( $(this).is(":checked") ){
                $(this).parents('li').eq(0).find(' > .children').slideDown();
                $(this).parents('li').eq(0).find(' > label').css({'color':'#856BC8'});
                $(this).parents('li').eq(0).find(' > .expand-icon').removeClass('fa-chevron-down').addClass('fa-chevron-up');
            }
            else{
                if( $(this).parents('li').eq(0).find(' > .children input:checked').length == 0 ){
                    $(this).parents('li').eq(0).find(' > .children').slideUp();
                    $(this).parents('li').eq(0).find(' > label').css({'color':'#303030'});
                    $(this).parents('li').eq(0).find(' > .expand-icon').removeClass('fa-chevron-up').addClass('fa-chevron-down');
                }
            }
        })
    }

    filterToggleSlide();

    $('.thumbnails.columns-1 a').featherlightGallery({
        previousIcon: "<span class='slick-prev-lf slick-arrows'><i class='fa fa-angle-left' aria-hidden='true'></i></span>",     /* Code that is used as previous icon */
        nextIcon: "<span class='slick-prev-lf slick-arrows'><i class='fa fa-angle-right' aria-hidden='true'></i></span>",         /* Code that is used as next icon */
        galleryFadeIn: 100,          /* fadeIn speed when slide is loaded */
        galleryFadeOut: 300 ,         /* fadeOut speed before slide is loaded */
        closeIcon: "<span><i class='fa fa-times' aria-hidden='true'></i></span>"
    });

    var menu_height = $( '.site-header' ).height();
    var menu_height2 = $( '.site-header' ).height();
    if($('body').hasClass('logged-in')){
        menu_height = menu_height+46;
    }
    if ($(window).width() < 767) {
        $('.mobile-menu, .widget_shopping_mini_cart_content .dropdown').css({'top': menu_height});
        $('.mobile-menu ').css({'top': menu_height});
        $('body > .site').css({'margin-top': menu_height2});
    }

    var timeout = setInterval(function(){
        $(".wp_autosearch_suggestions ul li, .wp_autosearch_suggestions ul li a").off('click');
    }, 500);

    $(document.body).on('added_to_cart', function(cart_contents, amount){
        $('body .free-shipping-wrapper .text-message').empty().append(amount['span.free_shipping_notice']);
    });

    $(document.body).on('wc_fragment_refresh', function(cart_contents, amount){

        console.log(cart_contents, amount);
        $('body .free-shipping-wrapper .text-message').empty().append(amount['span.free_shipping_notice']);
    });
});