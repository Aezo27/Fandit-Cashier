$(document).ready(function () {

  let repeat = 0,
    offset = '',
    counter = $('.counter');

/*//////////////////////////////////////////////////////////////////
[ Counter ]*/
  function doCounter() {
    if (counter.length > 0) {
      // if (repeat === 0) {
      counter.each(function () {
        if ($(this).offset().top < offset) {
          if ($(this).text() === '0') {
            let data = $(this).attr('data-counter');
            if (data % 1 == 0) {
              $(this).prop('Counter', 0).animate({
                Counter: data
              }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                  $(this).text(Math.ceil(now).toLocaleString('ID'));
                }
              });
            } else {
              $(this).prop('Counter', 0).animate({
                Counter: data
              }, {
                duration: 1000,
                easing: 'swing',
                progress: function () {
                  $(this).text(Math.ceil((this.Counter * 100) / 100).toLocaleString('ID'));
                }
              });
            }
          }
        }
      });
      // repeat += 1;
      // }
    }
  }
// End Counter ///////

  $(window).on('scroll', function () {
    offset = $(window).scrollTop() + $(window).height();
    doCounter();
  });
  $(window).trigger('scroll');

});

/*//////////////////////////////////////////////////////////////////
[ Swal ]*/
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    showCloseButton: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
// End Swall ///////