function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
(function($) {
  $(".menu").click(function(){
    $("nav").slideToggle(500);
  })
})(jQuery);
