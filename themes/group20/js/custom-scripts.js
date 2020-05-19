
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

  // Get the offset position of the navbar - now hardcoded in case user starts in mobile 
  var sticky = 150;
  


  window.onresize, window.onscroll = function() {
    sticky_function()
  };  

  // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
  function sticky_function() { 

    if (window.pageYOffset >= sticky) {

      var mobile_check = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
      if (mobile_check < mobile_stitch_point) { 
        
        if(this.oldScroll > this.scrollY) {
          add_mobile_sticky_tags();
        } else if (this.oldScroll < this.scrollY) {
          remove_mobile_sticky_tags();
        }
        this.oldScroll = this.scrollY;
        this.oldScroll = this.scrollY;

      } else {
        add_sticky_tags()
      }


    } else {
      if (mobile_check < mobile_stitch_point) { 
        
      } else {
        remove_sticky_tags()
      }
    }
    }

    function add_mobile_sticky_tags() {
      mobile_nav_icon.classList.add("mobileMenu");
    }

    function remove_mobile_sticky_tags() {
      mobile_nav_icon.classList.remove("mobileMenu");
      mobile_nav_icon.classList.remove("open");
      navbar.classList.remove("mobileMenu");
    }

    function remove_sticky_tags() {
      navbar.classList.remove("sticky");
      music_player.classList.remove("sticky");
      music_player.classList.remove("music-sticky-padding-fix");
      primary_area.classList.remove("sticky-padding-fix");
    }

    function add_sticky_tags() {
      navbar.classList.add("sticky");
      music_player.classList.add("sticky");
      music_player.classList.add("music-sticky-padding-fix");
      primary_area.classList.add("sticky-padding-fix");
    }

    
});