jQuery(document).ready(function ($) {
  let resizeId; // for resize timer
  const w = $(window);
  let wWidth = $(window).width(); // for resize

  function disableScrolling() {
    if ($(document).height() > $(window).height()) {
      var scrollTop = $("html").scrollTop()
        ? $("html").scrollTop()
        : $("body").scrollTop(); // Works for Chrome, Firefox, IE...
      $("html").addClass("disable-scrolling").css("top", -scrollTop);
    }
  }
  function enableScrolling() {
    var scrollTop = parseInt($("html").css("top"));
    $("html").removeClass("disable-scrolling");
    $("html,body").scrollTop(-scrollTop);
  }

  function isMobile() {
    if ($(".is-mobile").css("display") === "block") {
      return true;
    } else {
      return false;
    }
  }

  /* Init object fit polyfill */
  /* To make it work, add 'font-family: 'object-fit: cover;';' to image */
  if (window.objectFitImages) {
    window.objectFitImages();
  }

  if (window.ScrollReveal) {
    let sr = window.ScrollReveal();

    let slideUp = {
      distance: "30px",
      origin: "bottom",
      opacity: 0,
      duration: 1200,
    };

    let slideUpInterval = {
      distance: "30px",
      origin: "bottom",
      opacity: 0,
      duration: 1200,
      interval: 300,
    };

    let fadeIn = {
      opacity: 0,
      duration: 1200,
      debug: true,
    };

    let fadeInInterval = {
      opacity: 0,
      duration: 1200,
      interval: 300,
    };

    sr.reveal(".slideUp", slideUp);
    sr.reveal(".slideUpInterval", slideUpInterval);
    sr.reveal(".fadeIn", fadeIn);
    sr.reveal(".fadeInInterval", fadeInInterval);
  }

  $(".scroll-link").on("click", function (e) {
    e.preventDefault();
    let target = $(this).attr("href");
    $("html,body").animate(
      {
        scrollTop: $(target).offset().top,
      },
      1000
    );
  });

  let ballAnimation;

  function ballAnimationInit() {
    if (isMobile()) {
      ballAnimation = bodymovin.loadAnimation({
        container: document.querySelector("#floating-ball"), // the dom element that will contain the animation
        renderer: "svg",
        loop: true,
        autoplay: false,
        path: wis_data.url + "/assets/js/ball-animation-mob/data.json", // the path to the animation json
      });
    } else {
      ballAnimation = bodymovin.loadAnimation({
        container: document.querySelector("#floating-ball"), // the dom element that will contain the animation
        renderer: "svg",
        loop: true,
        autoplay: false,
        path: wis_data.url + "/assets/js/ball-animation/data.json", // the path to the animation json
      });
    }
  }

  $(document).on("click", ".landing-wrap", function (e) {
    const wrap = $(".landing-float");
    const list = $(".landing-float__img.is-hidden");
    const img = $(".landing-float__img");
    if (list.length > 0) {
      list.eq(0).removeClass("is-hidden");
      wrap.addClass("is-visible");
      if (list.eq(0).hasClass("landing-float__img-ball")) {
        setTimeout(function () {
          ballAnimation.play();
        }, 300);
      }
    } else {
      img.addClass("is-hidden");
      wrap.removeClass("is-visible");
    }
  });

  $(".landing-wrap").on("mouseleave", function () {
    $("#landing-cursor__float").css("opacity", "0");
    return false;
  });
  $(".landing-wrap").on("mouseenter", function () {
    $("#landing-cursor__float").css("opacity", "1");
    return false;
  });

  $(".landing-wrap").on("mousemove", function (e) {
    $("#landing-cursor__float")
      .css("left", e.clientX - 60)
      .css("top", e.clientY + w.scrollTop() - 60);
  });

  $(window).on("load", function (e) {
    $("#landing-cursor__float")
      .css("left", wWidth / 2 - 60)
      .css("top", 100);
  });

  //soccer pattern animation
  // const landingScene = document.getElementById('scene');
  // const parallaxInstance = new Parallax(landingScene,{
  //   relativeInput: true,
  //   hoverOnly: true,
  //   frictionX: 0.2,
  //   frictionY: 0.2,
  // });

  setTimeout(function () {
    $(".landing-main__item").addClass("is-animated");
  }, 200);
  setTimeout(function () {
    $(".pre-footer").addClass("is-visible");
  }, 1400);
  setTimeout(function () {
    $(".landing-wrap").addClass("cursor-active");
  }, 2500);

  //Function Calls
  ballAnimationInit();

  /* Trigger resize once */
  $(window).resize(function () {
    clearTimeout(resizeId);
    resizeId = setTimeout(doneResizing(wWidth), 500);

    function doneResizing() {
      let width = $(window).width();
      if (wWidth !== width) {
        wWidth = width;
      }

      ballAnimationInit();
    }
  });

  // Scroll to top
  $(".back-to-top").on("click", function () {
    $("html, body").animate({ scrollTop: 0 }, 1000);
  });
  $(".um-search-line").on("change", function (e) {
    let $btnCancel = $(".um-member-directory-search-line .btn-search-cancel");
    if ("" != this.value) {
      $btnCancel.addClass("active");
    } else {
      $btnCancel.removeClass("active");
    }
  });
  $(".um-member-directory-search-line .btn-search-cancel").on(
    "click",
    function () {
      let url = window.location.href;
      let regex = /(search_[^=]*)=[^&]*/;
      let name = url.match(regex);
      url = url.split(name[0])[0] + name[1] + url.split(name[0])[1];
      window.history.pushState("", "", url);
      location.href = url;
    }
  );
  
	// Jobs page Tab link
	$('.tab-link').on('click', function() {
		let target = $(this).attr('href');
		
		if (!$(this).hasClass('active') && $(this) != $('.tab-link.active')) {
			$('.tab-link.active').removeClass('active');
			$('.tab-content.active').removeClass('active');
		}
		$(this).toggleClass('active');
		$(target).toggleClass('active');
		$('.tab-content').each(function() {
			if ($(this).hasClass('active')) {
				$(this).css('display', 'flex').hide().fadeIn('300');
			}
			else $(this).fadeOut('300');	
		})
		return false;
	});
	
	// 	toggle jobs
	$('.btn-ajax-jobs').on('click', function() {
		let category = $(this).attr('data-category');
		$('.tab-link.active').removeClass('active');
		$.when($('.tab-content.active').fadeOut('300')).done(function() {
			$('.tab-content.active').removeClass('active');
			$([document.documentElement, document.body]).animate({
				scrollTop: $("#jobs_box").offset().top
			}, 1000);
		});
		// update label
		if (category == 'on') $('.jobs-box-title').html('Jobs on the field');
		else $('.jobs-box-title').html('Jobs off the field');
		
		$('.job-item a').each(function() {
			if ($(this).attr('data-type') == category) $(this).show();
			else $(this).hide();
		});
	});
}); 
