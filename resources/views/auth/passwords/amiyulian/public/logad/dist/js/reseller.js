 /*
   Project: Olshop
   Author: Aezo27
   Start: 08 Juni 2020
   https://aezo27.github.io/
*/

 /*//////////////////////////////////////////////////////////////////
[ Slidenav JS ]*/
$('[data-toggle="slide-collapse"]').on('click', function() {
  $navMenuCont = $($(this).data('target'));
  $navMenuCont.animate({
    'width': 'toggle'
  }, 350);
  $(".menu-overlay").fadeIn(500);

});
$(".menu-overlay").click(function(event) {
  $(".navbar-toggle").trigger("click");
  $(".menu-overlay").fadeOut(500);
});
$(".tutup").click(function(event) {
  $(".navbar-toggle").trigger("click");
  $(".menu-overlay").fadeOut(500);
});
