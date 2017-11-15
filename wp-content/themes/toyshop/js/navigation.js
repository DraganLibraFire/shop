/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
( function( $ ) {
	var container, button, menu, links, subMenus;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Set menu items with submenus to aria-haspopup="true".
	for ( var i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/*Responsive navigation sub-menu handle*/
	var _window;

	_window = {
		is_mobile: false,
		is_tablet: false,
		width: $(window).outerWidth(),
		height: $(window).outerHeight(),
		is_portable: function(){
			if( this.width <= 1280 && this.width > 768 ){
				this.is_tablet = true;
				this.is_mobile = false;
			}
			else if( this.width >= 1280 ){
				this.is_tablet = false;
				this.is_mobile = false;
			}
			else if( this.width < 768 ){
				this.is_tablet = false;
				this.is_mobile = true;
			}
		}
	};

	$(window).on('load', function(){
		_window.width = $(window).outerWidth();
		_window.height = $(window).outerHeight();
		_window.is_portable();

		/* Menu tablet & mobile */
		if( _window.is_mobile){

			$(".menu-toggle").on( 'click', function(){
				if($(this).hasClass('expanded')){
					$('.mobile-menu').animate({
						left: '-100%'
					}, 200, function(){
						$(".menu-toggle").removeClass('expanded');
					});
				}
				else{
					$('.mobile-menu').animate({
						left: '0%'
					}, 200, function(){
						$(".menu-toggle").addClass('expanded');
					});
				}

			});




			var back_btn_global = $(" <li style='padding-left: 0 !important; padding-right: 0 !important; text-indent: 5px;'><h4 class='back-menu-link-wrapper'><span class='back-menu-link'><i class='fa fa-close'></i></span> SLUIT</h4></li>");

			$(back_btn_global).on('click', function(){
				$('.mobile-menu').animate({
					left: '-100%'
				}, 200, function(){

					$(this).removeClass('expanded');
				});
			});

			$(".mobile-menu div > ul").prepend(back_btn_global);

			$(".mobile-menu li").each(function(){
				var _this = this;
				var expand_btn = $("<span class='expand-menu-link'><i class='fa fa-chevron-right'></i></span>");
				var back_btn = $("<li style='padding-left: 0 !important; padding-right: 0 !important; text-indent: 5px;'><h4 class='back-menu-link-wrapper'><span class='back-menu-link'><i class='fa fa-chevron-left'></i></span> TERUG</h4></li>");

				if( $(_this).find(' > ul').length > 0 ){

					$(_this).append( $(expand_btn) );

					$(_this).find(' > ul').prepend($(back_btn));

					$(expand_btn).on('click', function(e){
						e.preventDefault();
						$(_this).find(' > ul').animate({
							left: '0px'
						});
					});

					$(back_btn).on('click', function(){
						$(_this).find(' > ul').show(0).stop().animate({
							left: '105%'
						});
					});
				}
			})


		}

	});
} )(jQuery);
