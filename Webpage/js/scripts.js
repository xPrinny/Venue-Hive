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

    $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-success").slideUp(200);
    });

    $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-danger").slideUp(200);
    });
});

// Carousel side text
$('.carousel').on('slid.bs.carousel', function () {
    $('#carouselSideText').html($('.active > .carousel-review').html());
});

// Setting page
$('.card-body a').click(function(event) {
    $('.card-body .list-group-item').removeClass('active');
    if (event.target.id === "item1") {
        $('.col-lg-9 .card-body').hide();
        $('.card-body #item1.list-group-item').addClass('active');
        $('.col-lg-9 #updateAccount.card-body').show();
        $('#itemListings.card-body').show();
        $('#card-body-text.card-body').show();
    } else if (event.target.id === "item2") {
        $('.col-lg-9 .card-body').hide();
        $('.card-body #item2.list-group-item').addClass('active');
        $('.col-lg-9 #accountSettings.card-body').show();
        $('.col-lg-9 #reviewListings.card-body').show();
    }
});

$('#editProfileName .card-header').on('click', '[data-editable]', function() {
  var $ele = $(this);
  var $input = $('<input class="card-title text-center"/>').val($ele.text().replace('*', ''));
  $ele.replaceWith($input);
  var save = function() {
    var $p = $('<h5 data-editable class="card-title text-center" />').text($input.val() + '*').append('<i class="bi bi-pencil-square fs-6 ms-1"></i>');
    document.querySelector('input[id="username"]').value = $input.val();
    $input.replaceWith($p);
  };

  $input.one('blur', save).focus();
});

// Checkout page
$("input[name='paymentRadio']").change(function(event) {
    if (event.target.id === "creditCard") {
        $('#creditCardInfo').show();
        $('#paymentFormBtn').attr("form", "ccForm");
    } else if (event.target.id === "cashOnDelivery") {
        $('#creditCardInfo').hide();
        $('#paymentFormBtn').attr("form", "codForm");
    }
});