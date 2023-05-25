/*
 ** This is the main js file. However , we use the compressed one with the same name and the .min extension **/

function cb_menu_height(){

    var outer_header_height = jQuery('section#cb-header').outerHeight();
    var inner_logo_height  = jQuery('section#cb-logo').height();
    var total_menu_item_height = inner_logo_height+20;

    var outer_header_height =  outer_header_height+20;

    jQuery('#cb-logo').css('margin-top','12px');
    jQuery('section#cb-header').css('max-height',outer_header_height+'px');
    jQuery('#cb-main-navigation').css('line-height',inner_logo_height+'px');
    jQuery('#cb-main-navigation ul li a').not('.sub-menu li a').not('.sub-menu ul li ul li a').css('height',total_menu_item_height+'px');
}


function cb_responsive_menu(){
    jQuery('#responsive-menu-button').sidr({
        name:'cb-mobile-navigation'
    });
}
function cb_matchHeight(){
    jQuery('.matchHeight').matchHeight();
}

jQuery(window).load(function(){
  

    cb_menu_height();
    jQuery('ul.nav-tabs li:first-child').addClass('active');
  
});
function cb_smooth_scrolling(){

        jQuery('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = jQuery(this.hash);
                target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    jQuery('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });

}

function cb_add_sticky(){
    jQuery('.sticky-header').sticky({topSpacing:'0px'});

    jQuery('.sticky-header').removeClass('trans-header');
}

jQuery(document).ready(function(){
    'use-strict';

    var windoww = jQuery(window).width();


    if(windoww > 1048) {
        jQuery(window).stellar({
            horizontalScrolling: false,
            responsive: true
        });
    }
  
  
    cb_menu_height();
    cb_responsive_menu();
    cb_matchHeight();
    cb_smooth_scrolling();
    cb_add_sticky();
});