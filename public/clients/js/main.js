(function($) {

	"use strict";

	$(window).stellar({
    responsive: true,
    parallaxBackgrounds: true,
    parallaxElements: true,
    horizontalScrolling: false,
    hideDistantElements: false,
    scrollProperty: 'scroll'
  });


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	// loader
	var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	// Scrollax
   $.Scrollax();

	var carousel = function() {
		$('.carousel-testimony').owlCarousel({
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 2
				},
				1000:{
					items: 3
				}
			}
		});
		$('.carousel-destination').owlCarousel({
			center: false,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 2
				},
				1000:{
					items: 4
				}
			}
		});

	};
	carousel();

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});


	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
	});

	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');	
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	var counter = function() {
		
		$('#section-counter, .hero-wrap, .ftco-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();


	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();


	// magnific popup
	$('.image-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });


  $('.checkin_date, .checkout_date').datepicker({
	  'format': 'm/d/yyyy',
	  'autoclose': true
	});




})(jQuery);


 
 
 
 
 

const selectElement = document.getElementById('mySelect');
        const searchInput = document.getElementById('searchInput');
        const selectDropdown = document.getElementById('selectDropdown');
        // Hiển thị dropdown khi ô tìm kiếm được click vào
        searchInput.addEventListener('click', function(event) {
          event.stopPropagation();
          selectDropdown.style.display = 'block';
        });
    
        // Xử lý tìm kiếm và hiển thị tùy chọn phù hợp
        searchInput.addEventListener('input', function() {
          const searchTerm = searchInput.value.toLowerCase();
          selectDropdown.innerHTML = '';
    
          for (let i = 0; i < selectElement.options.length; i++) {
            const optionText = selectElement.options[i].text.toLowerCase();
            if (optionText.includes(searchTerm)) {
              const optionValue = selectElement.options[i].value;
              const optionDisplayText = selectElement.options[i].text;
              const optionItem = document.createElement('div');
              optionItem.textContent = optionDisplayText;
              optionItem.addEventListener('click', function() {
                selectElement.value = optionValue;
                searchInput.value = optionDisplayText;
                selectDropdown.style.display = 'none';
              });
              selectDropdown.appendChild(optionItem);
            }
          }
        });
    
        // Đóng dropdown khi click ra ngoài
        document.addEventListener('click', function() {
          selectDropdown.style.display = 'none';
        });


		  const selectElementCountry = document.getElementById('countrySelect');
        const searchInputCountry = document.getElementById('searchInputCountry');
        const selectDropdownCountry = document.getElementById('selectDropdownCountry');
    
        // Hiển thị dropdown khi ô tìm kiếm được click vào
        searchInputCountry.addEventListener('click', function(event) {
          event.stopPropagation();
          selectDropdownCountry.style.display = 'block';
        });
    
        // Xử lý tìm kiếm và hiển thị tùy chọn phù hợp
        searchInputCountry.addEventListener('input', function() {
          const searchTerm = searchInputCountry.value.toLowerCase();
          selectDropdownCountry.innerHTML = '';
    
          for (let i = 0; i < selectElementCountry.options.length; i++) {
            const optionText = selectElementCountry.options[i].text.toLowerCase();
            if (optionText.includes(searchTerm)) {
              const optionValue = selectElementCountry.options[i].value;
              const optionDisplayText = selectElementCountry.options[i].text;
              const optionItem = document.createElement('div');
              optionItem.textContent = optionDisplayText;
              optionItem.addEventListener('click', function() {
                selectElementCountry.value = optionValue;
                searchInputCountry.value = optionDisplayText;
                selectDropdownCountry.style.display = 'none';
              });
              selectDropdownCountry.appendChild(optionItem);
            }
          }
        });
    
        // Đóng dropdown khi click ra ngoài
        document.addEventListener('click', function() {
          selectDropdownCountry.style.display = 'none';
        });



		  var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; // Tháng tính từ 0 đến 11
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        var todayFormatted = yyyy + '-' + mm + '-' + dd;

        // Đặt thuộc tính min cho ngày hiện tại
        document.getElementById("checkoutDateInput").setAttribute("min", todayFormatted);



	// 	  document.addEventListener("DOMContentLoaded", function () {
	// 		var searchButton = document.getElementById("searchButton");
	// 		var originInput = document.getElementById("searchInput");
	// 		var originSelect = document.getElementById("mySelect");
	// 		var passengerInput = document.querySelector(".form-field input[type='text']");
	// 		var departureDateInput = document.getElementById("checkoutDateInput");
 
	// 		searchButton.addEventListener("click", function (event) {
	// 			 var validOrigin = Array.from(originSelect.options).some(function (option) {
	// 				  return option.value === originInput.value;
	// 			 });
 
	// 			 if (!validOrigin) {
	// 				  event.preventDefault();
	// 				  alert("Vui lòng chọn giá trị phù hợp từ danh sách.");
	// 			 } else if (!originInput.value || !passengerInput.value || !departureDateInput.value) {
	// 				  event.preventDefault();
	// 				  alert("Vui lòng nhập đầy đủ thông tin trước khi tìm kiếm.");
	// 			 }
	// 		});
	//   });


	document.addEventListener("DOMContentLoaded", function () {
		var searchButton = document.getElementById("searchButton");
		var originInput = document.getElementById("searchInput");
		var destinationInput = document.getElementById("searchInputCountry");
		var passengerInput = document.querySelector(".form-field input[type='text']");
		var departureDateInput = document.getElementById("checkoutDateInput");
		var originSelect = document.getElementById("mySelect");
		var destinationSelect = document.getElementById("countrySelect");
		var originOptions = Array.from(originSelect.options).map(function (option) {
			 return option.value.trim();
		});
		var destinationOptions = Array.from(destinationSelect.options).map(function (option) {
			 return option.value.trim();
		});

		searchButton.addEventListener("click", function (event) {
			 var userInputOrigin = originInput.value.trim();
			 var userInputDestination = destinationInput.value.trim();

			 var validOrigin = originOptions.includes(userInputOrigin);
			 var validDestination = destinationOptions.includes(userInputDestination);

			 if (!userInputOrigin || !userInputDestination || !passengerInput.value || !departureDateInput.value) {
				  event.preventDefault();
				
			 } else if (!validOrigin) {
				  event.preventDefault();
				 
			 } else if (!validDestination) {
				  event.preventDefault();
				 
			 }
		});
  });




  $(document).ready(function() {
	$('.toggle-details').click(function(e) {
		 e.preventDefault();
		 var flightId = $(this).data('flight-id');
		 var type = $(this).data('type');

		 window.location.href = $(this).attr('href'); // Chuyển hướng đến trang chi tiết
	});
});