
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
  var sticky;
  var mobile_stitch_point = 768;
  var music_player = document.getElementById('music_player');
    // non-mobile
  var primary_area = document.getElementById("primary");
  // mobile
  var mobile_nav_icon = document.getElementById("nav-icon1");
  var masthead = document.getElementById("masthead");

  

  // Get the offset position of the navbar - now hardcoded in case user starts in mobile 
  var mobile_check = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
      if (mobile_check < mobile_stitch_point) {         
        mobile_view = true;
        sticky = 1;
      } else {     
        sticky = 150;   
      }
  
  var old_horizontal_window_size = window.innerWidth;
  var prevent_onscroll = false;
  var mobile_view = false;

  mobile_movement_x();
  mobile_movement_y();
  large_movement_x();
  large_movement_y();

  window.onscroll = function() { 
    change_sticky();
    if (!prevent_onscroll) {
      if (window.pageYOffset >= sticky) {
        var mobile_check = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        // if mobile sized
        if (mobile_check < mobile_stitch_point) { 
            mobile_movement_y();
        } else {
            large_movement_y();
        }
        this.oldScroll = this.scrollY;

        // this is the special tags for the window being at the top
      } else {
          remove_sticky_tags();
      }
      prevent_onscroll = false;
    }     
    this.console.log(sticky);
  };  

  window.onresize = function() {
    change_sticky();
    // prevent onresize from calling onscroll as the content resizes
    if (!prevent_onscroll) {
      setTimeout(function() { 
        prevent_onscroll = false;
      }, 100);
  }

  var mobile_check = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
  // if mobile sized
  if (mobile_check < mobile_stitch_point) { 
    mobile_movement_x();
  } else {
    large_movement_x();
  }
  old_horizontal_window_size = window.innerWidth;      
  prevent_onscroll = true;

  if (window.pageYOffset >= sticky) {
    } else {
      remove_sticky_tags();
  }
};  

function change_sticky() {
  var mobile_check = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
  if (mobile_check < mobile_stitch_point) { 
    sticky = 1;
  } else {
    sticky = 150;
  }
}

  function mobile_movement_x() {
    var mobile_check = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    if (old_horizontal_window_size > window.innerWidth) {
      if ((mobile_check < mobile_stitch_point) && !mobile_view) { 
        remove_sticky_tags();
        add_mobile_sticky_tags();
        mobile_view = true;
      }
    }
  }

  function large_movement_x() {
    if (!(old_horizontal_window_size > window.innerWidth)) {
      if ((mobile_check > mobile_stitch_point) && mobile_view) { 
        add_sticky_tags();
        remove_mobile_sticky_tags();
        mobile_view = false;
      }
    }
  }

  function mobile_movement_y() {
    if (this.oldScroll > this.scrollY) {
      add_mobile_sticky_tags();
    } else if (this.oldScroll < this.scrollY) {
      remove_mobile_sticky_tags();
    } 
  }

  function large_movement_y() {
    if (this.oldScroll > this.scrollY) {
    } else if (this.oldScroll < this.scrollY) {
      add_sticky_tags();
    }
  }

  function add_sticky_tags() {
    navbar.classList.add("sticky");
    music_player.classList.add("sticky");
    music_player.classList.add("music-sticky-padding-fix");
    primary_area.classList.add("sticky-padding-fix");
  }

  function add_mobile_sticky_tags() {
    masthead.classList.add("mobileMenu");      
    music_player.classList.add("mobileMenu");
    primary_area.classList.add("mobile-sticky-fix");
  }

  function remove_mobile_sticky_tags() {  
    masthead.classList.remove("mobileMenu");  
    music_player.classList.remove("mobileMenu");
    music_player.classList.remove("mobile-sticky-fix");
    primary_area.classList.remove("mobile-sticky-fix");
    mobile_nav_icon.classList.remove("open");
    mobile_nav_icon.classList.remove("mobileMenu");
    navbar.classList.remove("mobileMenu");
  }

  function remove_sticky_tags() {
    navbar.classList.remove("sticky");
    music_player.classList.remove("mobileMenu");
    music_player.classList.remove("sticky");
    music_player.classList.remove("music-sticky-padding-fix");
    primary_area.classList.remove("sticky-padding-fix");
    primary_area.classList.remove("mobile-sticky-fix");
  }
    
});