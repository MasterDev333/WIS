(function ($){
	var theme = {
		cache: {},
		handlers: {},
		init: function () {
			this.cacheElements();
			this.bindEvents();
		},
		cacheElements: function () {
			this.cache = {
				$window: $(window),
				$document: $(document)
			};
		},
		bindEvents: function () {
			var self = this;
			self.cache.$document.ready(function () {
				self.getSvg();
				self.initMenu();
				self.initMarquee();
				self.initAccordion();
				self.initTabs();
				self.initSplash();
				self.arrangeCards()
				self.initAnimation();
				self.registrationPage();
				self.createFullPage();
				self.initCards();
				self.initsliders();

				new WOW().init();
				objectFitImages();

				$('.preview-screen .scroll-btn').on('click', function(e){
					e.preventDefault();
					var id = $(this).closest('.preview-screen').next('.content');
					$('html, body').animate({
						scrollTop: $(id).offset().top 
					}, 1000);
				});

				$('input[id*="date_of_birth"]').mask('00/00/0000');

				$('body').on('click', '.send-player-mail', function(e){
					e.preventDefault();
					$('#modal-email').modal('show');
					$('#modal-email .modal-title span').text($(this).data('name'));
					$('[name="member-input"]').val($(this).data('id'));
				});

				$('body').on('click', '.um-search-filter h5', function(e){
					$(this).parent().toggleClass('active');
				})

				$('body').on('click', '.btn-modal-submit', function(e){
					e.preventDefault();
					var fields = $('#message-form .form-control'), valid = 0;
					_.each(fields, function(el){
						if((el.value.length < 1 || el.value === "_blank") && $(el).hasClass('required')){
							$(el).addClass('not-valid')
						}else{
							$(el).removeClass('not-valid');
							valid++;
						}
					});
					if (fields.length === valid) {
						var request = $.ajax({
							type: "POST",
							url: wis_data.ajaxurl,
							data: {
								action : 'send_message',
								nonce: wis_data.nonce,
								name: $('[name="email-input"]').val(),
								message: $('[name="message-input"]').val(),
								member: $('[name="member-input"]').val()
							}
						});
						request.done(function(response){
							console.log(response);
							$('#modal-email').modal('hide');
							$('#message-form .form-control').val('');
						});
					}
				})
			});
		},
		initsliders: function(){
			$('.spotlight-box .owl-carousel').owlCarousel({
				margin:40,
				nav:true,
				navText: ['<span></span>', '<span></span>'],
				dots: false,
				loop:true,
				autoWidth:true,
				items:4,
				autoplay:true,
				autoplayTimeout:5000,
				autoplayHoverPause:true,
				responsive : {
					0: {
						margin: 20
					},
					768: {
						margin: 40
					},
					992:{
						margin: 60
					}
				}
			});
			$('.posts-box .owl-carousel').owlCarousel({
				margin:0,
				nav:true,
				navText: ['<span></span>', '<span></span>'],
				loop:false,
				items:1,
				autoplay:false,
				autoplayTimeout:5000,
				autoplayHoverPause:true,
				responsive : {
					0: {
						items: 1
					},
					768: {
						autoWidth: true,
					},
					992:{
						autoWidth: true,
					}
				}
			});
		},
		initCards: function() {
			$('body').on('click', '.playercard-item:not(.opened)', function(e){
				e.preventDefault();
				$(this).addClass('opened');
				$('body').addClass('no-scroll');
			});
			$('body').on('click', '.playercard-item.opened .playercard-front', function(e){
				e.preventDefault();
				$(this).closest('.playercard').stop(true, true).toggleClass('active');
			});
			$('body').on('click', '.playercard-item.opened .playercard-back .card-body', function(e){
				e.preventDefault();
				$(this).closest('.playercard').stop(true, true).removeClass('active');
			});
			$('body').on('click', '.playercard-item.opened .close-btn', function(e){
				e.preventDefault();
				$('.playercard-item.opened').removeClass('opened');
				$('body').removeClass('no-scroll');
			});
		},
		createFullPage: function() {
			if($(window).width() >= 992){
				$("#fullpage").fullpage({
					licenseKey:"B80EC24D-66D9477B-B16E7559-B4301A50",
					scrollingSpeed: 700,
					navigation: false,
					scrollBar: true,
					responsiveWidth: 992,
					animateAnchor: false,
					afterLoad : function(origin, destination) {
						var loadedSection = $(this);
						if (destination.index == 2) {
							fullpage_api.setAutoScrolling(false);
							fullpage_api.destroy();
						}
					}
				});
			}
			$('.scroll-links a').on('click', function(e){
				e.preventDefault();
				fullpage_api.setAutoScrolling(false);
				fullpage_api.destroy();
				$('.page-slide').addClass('active');
				var id = $(this).attr('href');
				$('html, body').animate({
					scrollTop: $(id).offset().top 
				}, 1000, function(){
					$(id).find('.accordion-item-header').addClass('active').next().slideDown();
				});
			})
		},
		registrationPage: function () {
			var allPanels = $('.registration-box .item-content').hide();
			var subscription = 0;
			$('.registration-box .item-header').on('click', function(e){
				e.preventDefault();
				var panel = $(this).parent();
				var content = $(this).next();
				if(panel.hasClass('active')){
					panel.removeClass('active');
					content.slideUp();
					subscription = 0
				}else{
					$('.registration-box .item').removeClass('active');
					allPanels.slideUp();
					panel.addClass('active');
					content.slideDown();
					subscription = panel.data('subscription');
				}
			});
			$('.registration-btn .btn').on('click', function(e){
				e.preventDefault();
				if(subscription){
					window.location.href="?member=" + subscription;
				}
			});
		},
		arrangeCards: function (){
			var card = $('.stack-item');
			var lastCard = $(".stack .stack-item").length - 1;
			$('.stacked-wrapper').on('click', function(e){
				e.preventDefault();
				var prependList = function() {
					if( card.hasClass('activeNow') ) {
						var slicedCard = $('.stack-item').slice(lastCard).removeClass('transformThis activeNow');
						$('.stack').prepend(slicedCard);
					}
				}
				$('.stack-item').last().addClass('transformThis').prev().addClass('activeNow');
				setTimeout(function(){prependList(); }, 150);
			})
		},
		initAnimation: function (){
			let icon_a = bodymovin.loadAnimation({
				container: document.querySelector('#icon_c'),
				renderer: 'svg',
				loop: false,
				autoplay: false,
				path: wis_data.url + '/assets/js/icons/a.json'
			});
			let icon_b = bodymovin.loadAnimation({
				container: document.querySelector('#icon_b'),
				renderer: 'svg',
				loop: false,
				autoplay: false,
				path: wis_data.url + '/assets/js/icons/b.json'
			});
			let icon_c = bodymovin.loadAnimation({
				container: document.querySelector('#icon_a'),
				renderer: 'svg',
				loop: false,
				autoplay: false,
				path: wis_data.url + '/assets/js/icons/c.json'
			});
			setInterval(function(){
				icon_a.stop(); icon_b.stop(); icon_c.stop();
				icon_c.play();
				setTimeout(function(){ icon_b.play(); }, 1000);
				setTimeout(function(){ icon_a.play(); }, 2000);
			}, 3000)
			var navAnimation = bodymovin.loadAnimation({
				container: document.querySelector('#nav_animation'),
				renderer: 'svg',
				loop: true,
				autoplay: true,
				path: wis_data.url + '/assets/js/nav/data.json'
			});
		},
		getSvg: function () {
			$('img.render-svg').each(function () {
				var $img = $(this);
				var imgID = $img.attr('id');
				var imgClass = $img.attr('class');
				var imgURL = $img.attr('src');
				$.get(imgURL, function (data) {
					var $svg = jQuery(data).find('svg');

					if (typeof imgID !== 'undefined') {
						$svg = $svg.attr('id', imgID);
					}
					if (typeof imgClass !== 'undefined') {
						$svg = $svg.attr('class', imgClass + ' replaced-svg');
					}
					$svg = $svg.removeAttr('xmlns:a');
					if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
						$svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
					}
					$img.replaceWith($svg);
				}, 'xml');
			});
		},
		initMenu: function () {
			$('.navigation-btn').on('click', function (e) {
				e.preventDefault();
				var btn = $(this);
				var nav = $(this).closest('.site-header');
				$(this).blur();
				nav.toggleClass('menu-opened');
			})
		},
		initMarquee: function () {
			$('.marquee').scrollForever();
		},
		initAccordion: function () {
			var allPanels = $('.accordion-item-content').hide();
			$('.accordion-item-header').on('click', function(e){
				e.preventDefault();
				var panel = $(this).parent();
				var content = $(this).next();
				if(panel.hasClass('active')){
					panel.removeClass('active');
					content.slideUp();
				}else{
					$('.accordion-item').removeClass('active');
					allPanels.slideUp();
					panel.addClass('active');
					content.slideDown();
				}
			})
		},
		initTabs: function(){
			$(window).on('load', function(e){
				var highestBox = 0;
					$('.tab-item').each(function(){  
						if($(this).outerHeight() > highestBox){  
						highestBox = $(this).outerHeight();  
					}
				});
				$('.tabs-box').height(highestBox);

				var allPanels = $('.tab-item .tab-content').hide();
				$('.tab-item:first-child .tab-content').show();
				$('.tab-header').on('mouseenter', function(e){
					e.preventDefault();
					var panel = $(this).parent();
					var content = $(this).next();
					if(!panel.hasClass('active')){
						$('.tab-item').removeClass('active');
						allPanels.stop(true, false).slideUp();
						panel.addClass('active');
						content.stop(true, false).slideDown();
					}
				});
			})
		},
		initSplash: function () {
			if($('body').hasClass('home')){
				$(window).on('scroll', function () {
					var top = jQuery(window).scrollTop(),
							divBottom = jQuery('.landing-wrap').offset().top + $('.landing-wrap').outerHeight();
					if (divBottom > top) {
						$('body').removeClass('out-of-view');
					} else {
						$('body').addClass('out-of-view');
					}
				});
			}else{
				$('body').addClass('out-of-view');
			}
		}
	}
	theme.init(theme);
})(jQuery);