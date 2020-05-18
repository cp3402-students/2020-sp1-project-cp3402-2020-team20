
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

// When the user scrolls the page, execute myFunction
window.onscroll = function() {
  sticky_function()
};

// check if we are in mobile mode
var mobile_check = document.getElementById("site-navigation");
if (mobile_check.className == "")

// Get the navbar
var navbar = document.getElementById("site-navigation");
var primary_area = document.getElementById("primary");
var mobile_nav_icon = document.getElementById("nav-icon1");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function sticky_function() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    primary_area.classList.add("sticky-padding-fix");
    mobile_nav_icon.classList.add("sticky-nav-icon");
  } else {
    navbar.classList.remove("sticky");
    thingprimary_areaToAdd.classList.remove("sticky-padding-fix");
  }
}
});