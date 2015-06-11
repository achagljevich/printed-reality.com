jQuery(document).foundation();



// initialize slider script

jQuery('.index-slider').slick({
  dots: true,
  autoplay: true,
  autoplaySpeed: 3000
});




jQuery('.overview-slider').slick({
  dots: true,
  autoplay: true,
  autoplaySpeed: 3000
});




jQuery('.profile-slider-1').slick({
  dots: true,
  autoplay: true,
  autoplaySpeed: 3000
});
jQuery('.profile-slider-2').slick({
  dots: true,
  autoplay: true,
  autoplaySpeed: 3000
});





jQuery('.standard-set-slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: false,
  asNavFor: '.standard-set-slider',
  adaptiveHeight: true
});
jQuery('.standard-set-slider').slick({
  appendArrows: '.nav-buttons',
  dots: true,
  autoplay: false,
  autoplaySpeed: 3000,
  centerMode: true,
  centerPadding:'0px 0px',
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.standard-set-slider-for',
  slide:'.slide-div',
  variableWidth:true,  
  focusOnSelect: true
//  prevArrow: '.printegration-slider-nav-next',
//  nextArrow: '.printegration-slider-nav-prev'
});




jQuery('.printegration-page-mission-slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.printegration-page-mission-slider'
});



jQuery('.project-part-slider-1').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: false,
  dots: true
});
jQuery('.project-part-slider-2').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: false,
  dots: true
});






jQuery('.printegration-page-mission-slider').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.printegration-page-mission-slider-for',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});


// make necessary additions to classes for elements in the foundation sub menus 

jQuery(document).ready(function() {
    
    var toggleSubMenuButton = "<div class=\"has-submenu\">>></div>";
    
    jQuery('li.menu-item-has-children').each(function() {
        jQuery(this).addClass('has-submenu');
    });
            
        
    
    var backButtonli = "<li class=\"back\"><a href=\"#\">Back</a></li>";
    
    jQuery('ul.sub-menu').each(function() {
       jQuery( this ).addClass('left-submenu').children().first().before(backButtonli); 
    });

    
    
    
    
});


// add class to index page sections to stagger layout
    jQuery('.index_section:odd>div:nth-child(2)').each(function(){
        jQuery( this ).addClass('medium-pull-6');
        
    });
    
    jQuery('.index_section:odd>div:nth-child(1)').each(function(){
        jQuery( this ).addClass('medium-push-6');
        
    });