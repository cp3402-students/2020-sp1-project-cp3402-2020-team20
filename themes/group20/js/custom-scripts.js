jQuery(document).ready(function() {

    jQuery('#nav-icon1').click(function(){
        jQuery(this).toggleClass('open');
        jQuery(".main-navigation").toggleClass("mobileMenu");
	});
});

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


document.addEventListener("DOMContentLoaded", function(event) { 
// sticky nav bar

// When the user scrolls the page, execute myFunction
window.onscroll = function() {
  sticky_function()
};

// Get the navbar
var navbar = document.getElementById("site-navigation");
var thingToAdd = document.getElementById("primary");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function sticky_function() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    thingToAdd.classList.add("sticky-padding-fix");
  } else {
    navbar.classList.remove("sticky");
    thingToAdd.classList.remove("sticky-padding-fix");
  }
}
});