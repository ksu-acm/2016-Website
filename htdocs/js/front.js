(function($) {
  $(function() {
    $('.slider').slider();
    $('.scrollspy').scrollSpy(250);
    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      hover: true,
      belowOrigin: true,
      alignment: 'right'
    }
  );
  });
})(jQuery);
