/*global $, window*/
$(function () {
    "use strict";
    
    /*Start Navbar*/
    $(".nav-link, .log").hover(function () {
        $(this).css({color: "gold"});
    }, function () {
          
        $(this).css({color: "inherit"});
    });
    /*End Navbar*/
    
   /* start login-popup*/
    $('.log').click(function () {
        $('.popup').fadeIn();
    });
    $('.popup').click(function () {
        $(this).fadeOut();
    });
    $('.popup .inner-popup').click(function (e) {
        e.stopPropagation();
    });
    $(window.document).keydown(function (e) {
        if (e.keyCode === 27) { // escape button key-code
            $('.popup').fadeOut();
        }
    });
    $('.popup .inner-popup .close-popup i').click(function (e) {
        e.preventDefault();
        $(this).parents('.popup').fadeOut();
    });
   /* end login-popup*/
    
    /*Start Team*/
    
    
    
    /*End Team*/
    
    /*Start Skill*/
    $(".skill .parag button").click(function () {
        $(".skill .parag p span").css({ color: "red"});
        
        $(".skill .parag p span").html("we will transfer your idea to a digital dream and make your wish come true");
        
    });
    /*End Skill*/
    
    /*Start Up*/
    $(".up").click(function () {
        
      
        $("html, body").animate({scrollTop: "0"}, 3000);
    
    });
    /*End Up*/
    /*Start Contact*/
    
    //========sgin in==========
    
    
    
    /*End Contact*/
    
    $(window).scroll(function () {
   
    //top button
        var sct = $(window).scrollTop();
        if (sct >= 1672) {
        
            $(".up").fadeIn(2000);
        } else {
        
            $(".up").fadeOut(1000);
        }
        
        // smozy scroll
        $('.scroll').each(function () {
            if ($(window).scrollTop() >= $(this).offset().top) {
                $('nav li a').removeClass('selected');
                $('nav li a[data-scroll="' + '#' + $(this).attr('id') + '"]').addClass('selected');
                window.console.log($(this).attr('id'));
            }
        });
    });

    // smozy scroll
    $('nav li a').click(function () {
        $(this).addClass('selected').parent().siblings().find('a').removeClass('selected');
        $('html, body').animate({
            scrollTop: $($(this).data('scroll')).offset().top + 1
        }, 2000);
    });
   
});

