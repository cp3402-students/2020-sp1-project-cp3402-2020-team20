jQuery(document).ready(function() {

    jQuery('.toggle-nav').unbind('click').click(function(e) {
        
        // give it a special id tag, then remove after
        // var mainNavDisplay = jQuery(".main-navigation").css("display");
        var mainNavDisplay = jQuery(".main-navigation").css("class");
        // jQuery(".main-navigation").css("display", "block");
        // jQuery("body").css("background-color", "red");
        // if (mainNavDisplay == "none") {
        //     mainNavDisplay = "block";
        // } else {
        //     mainNavDisplay = "none";
        //     jQuery(".main-navigation").removeAttr("display");
        // }

        // if (mainNavDisplay === "main-navigation menuHidden") {
        //     jQuery(".main-navigation").css("class", "main-navigation");
        //     console.log('1');
        // } else {
        //     jQuery(".main-navigation").css("class", "main-navigation menuHidden");
        //     console.log('2');
        // }

        jQuery(".main-navigation").toggleClass("mobileMenu");


        // jQuery(".main-navigation").css("display", mainNavDisplay);

        // jQuery('.main-navigation ul').slideToggle(500);
  
        e.preventDefault();
    });
     
});