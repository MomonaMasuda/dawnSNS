$(function () {
  $('#menu').click(function() {
    $(this).next('ul').slideToggle('fast');
    $(this).toggleClass("open");
  });
});
