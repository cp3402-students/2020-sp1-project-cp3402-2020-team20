
// Mobile menu 
jQuery(document).ready(function() {

    jQuery('#nav-icon1').click(function(){
        jQuery(this).toggleClass('open');
        jQuery(".main-navigation").toggleClass("mobileMenu");
	});
});

// Image slider
jQuery(document).ready(function() {
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
      slideIndex = 1
    }
    
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
  }
});

// sticky nav bar
document.addEventListener("DOMContentLoaded", function(event) { 

  // Setup variables for sticky functions
  // shared
  var navbar = document.getElementById("site-navigation");
  
  var mobile_stitch_point = 768;
  var music_player = document.getElementById('music_player');
    // non-mobile
  var primary_area = document.getElementById("primary");
  // mobile
  var mobile_nav_icon = document.getElementById("nav-icon1");

  // When the user scrolls the page, execute myFunction
  window.onscroll = function() {
    // detect whether we are in mobile mode
    var mobile_check = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    if (mobile_check < mobile_stitch_point) {  
      mobile_sticky_function();
    } else {
      sticky_function()
    }
    sticky_function()
    
  };

  window.onresize = function() {
    // check to see if we have resized to a mobile-menu displaying window size
    var mobile_check = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
      // if (mobile_check < mobile_stitch_point) {  
      //   mobile_sticky_function();
      // } else {
      //   sticky_function()
      // }
      sticky_function()
  };  

  function mobile_sticky_function() {  
      if (window.pageYOffset >= sticky) {
        music_player.classList.add("sticky");
        music_player.classList.add("music-sticky-padding-fix");
        primary_area.classList.add("sticky-padding-fix");
        mobile_nav_icon.classList.add("sticky");
      } else {
        music_player.classList.remove("sticky");
        music_player.classList.remove("music-sticky-padding-fix");
        primary_area.classList.remove("sticky-padding-fix");
        mobile_nav_icon.classList.remove("sticky"); 
      }
    }
  

  // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
  function sticky_function() { 
    console.log('why do i exist');
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky");
      music_player.classList.add("sticky");
      music_player.classList.add("music-sticky-padding-fix");
      primary_area.classList.add("sticky-padding-fix");
    } else {
      navbar.classList.remove("sticky");
      music_player.classList.remove("sticky");
      music_player.classList.remove("music-sticky-padding-fix");
      primary_area.classList.remove("sticky-padding-fix");
    }
    }
});