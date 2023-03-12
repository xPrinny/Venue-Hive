/*!
* Start Bootstrap - New Age v6.0.6 (https://startbootstrap.com/theme/new-age)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-new-age/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            offset: 74,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });
});

// On load
$(function() {
    $('#carouselSideText').html($('.active > .carousel-review').html());
});

// Carousel side text
$('.carousel').on('slid.bs.carousel', function () {
    $('#carouselSideText').html($('.active > .carousel-review').html());
});

// Setting page
$('.card-body a').click(function(event) {
    // event.target.id
});

$('.card-header').on('click', '[data-editable]', function(){
  var $ele = $(this);
  var $input = $('<input class="card-title text-center"/>').val($ele.text().replace('*', ''));
  $ele.replaceWith($input);
  var save = function(){;
    var $p = $('<h5 data-editable class="card-title text-center" />').text($input.val() + "*");
    document.getElementById("username").value = $input.val();
    $input.replaceWith($p);
  };

  $input.one('blur', save).focus();
});