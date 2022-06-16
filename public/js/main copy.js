document.querySelector('.burger').addEventListener('click',function(){
  document.querySelector('.toggle-open').classList.toggle('open');
});
document.querySelector('.burger').addEventListener('click',function(){
  document.querySelector('.toggle-close').classList.toggle('close');
});

$(".owl-carousel").owlCarousel({
  autoplay: true,
  autoplayhoverpause: true,
  autoplaytimeout: 100,
  items: 4,
  nav: true,
  loop: true,
  animateOut:'fadeOut',
  responsive:{
    0:{
      items:1,
      dots: false,
    },
    485:{
      items:2,
      dots: false,
    },
    728:{
      items:3,
      dots: false,
    },
    960:{
      items:4,
      dots: false,
    },
    1200:{
      items:4,
      dots: true,
    }
  }

});





// // Burger
//     $('.burger').on('click', function (event) {
//         $('.navbar').slideToggle('200');
//         $('.toggle-open').toggleClass('open');
//         $('.toggle-close').toggleClass('close');
//     })

// // Scroll to TOP
// var btn = $('.scrollup');
// $(window).scroll(function() {
//   if ($(window).scrollTop() > 500) {
//     btn.addClass('show');
//   } else {
//     btn.removeClass('show');
//   }
// });
// btn.on('click', function(e) {
//   e.preventDefault();
//   $('html, body').animate({scrollTop:0}, '500');
// });