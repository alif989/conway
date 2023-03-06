var cbar = $('.fd-sticky');
function pushBg(class_name, data_src = '') {
    if (data_src != '')
        data_src = $(class_name).attr(data_src);
    else
        data_src = $(class_name).attr("data-src");;

    $(class_name).css({ "background-image": "url(" + data_src + ")" });
} 
// viewport plugin
(function($, win) {
    $.fn.inViewport = function(cb) {
        return this.each(function(i, el) {
            function visPx() {
                var elH = $(el).outerHeight(),
                    H = $(win).height(),
                    r = el.getBoundingClientRect(),
                    t = r.top,
                    b = r.bottom;
                return cb.call(el, Math.max(0, t > 0 ? Math.min(elH, H - t) : (b < H ? b : H)));
            }
            visPx();
            $(win).on("resize scroll", visPx);
        });
    };
}(jQuery, window));

/* bootstrap dropdown on hover */
$('.dropdown').hover(function() {
    $('.dropdown-toggle', this).trigger('click');
});

// $(window).load(function() {
//     $(".before-after").twentytwenty();
// })

function pushImg(elem, placeholder = '-1', mh = '') {
    if (placeholder == '-1') placeholder = elem;
    placeholder = $(placeholder);
    elem = $(elem);
    // console.log(elem.attr("data-xc"));
    if (mh != '') elem.css({ "min-height": mh + "rem" });
    // var temp_loading = '<div class="preloader temp-p"></div>';
    //extra work
    // placeholder.html(temp_loading);
    setTimeout(function() {
        var imgElem = '<img src="' + elem.attr("data-src") + '" alt="' + elem.attr("title") + '" title="' + elem.attr("title") + '"  class="' + elem.attr("data-xc") + ' img-fluid" />';
        placeholder.html(imgElem);
    }, 1000);

}

$(window).load(function() {
    $(".preloader").delay(300).fadeOut("slow");
})

$(function() {
    $('#menu-toggle-bar').click(function () {
        $(this).toggleClass('menu-toggle-active');
        $("#mySidenav").toggleClass('sidenav-open', 'sidenav-close');
    });
    // ==> onScroll animation init
    AOS.init({
        once: true
    });

    // $.srSmoothscroll({
    //    // defaults
    //    step: 85,
    //    speed: 400,
    //    ease: 'swing',
    //    target: $('body'),
    //    container: $(window)
    //  });
    // $("[data-fancybox]").fancybox({
    //     // Options will go here
    // });
    $('.navbar .custom-dropdown').on('click', function() {
        var clickNum = $(this).data('clickNum');
        if (!clickNum) clickNum = 1;
        console.log(clickNum);
        if ($(this).hasClass('open')) {
            if (clickNum == 1) {
                $(this).addClass('open').find('.dropdown-menu').first().stop(true, true).show("slow");   
            }else{
                $(this).removeClass('open').find('.dropdown-menu').first().stop(true, true).hide("slow");
            }
        }else if (!$(this).hasClass('open')) {
            $(this).addClass('open').find('.dropdown-menu').first().stop(true, true).show("slow");
        }
        $(this).data('clickNum', ++clickNum);
    });
    $('.navbar .dropdown').hover(function() {
        $(this).addClass('open').find('.dropdown-menu').first().stop(true, true).show("slow");
    }, function() {
        $(this).removeClass('open').find('.dropdown-menu').first().stop(true, true).hide("slow");
    });

    $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
        var linkAttr = $(e.target).attr('aria-controls');
        var img = $('.aboutMain-img__clipped img.' + linkAttr);
        $('.aboutMain-img__clipped img').removeClass('active');
        img.addClass('active');

        console.log(linkAttr) // newly activated tab
    })

    var documentWidth = $(document).width();
    // if (documentWidth > 1024) {
    //     var s = skrollr.init();
    // }
    var header = $("header");
    var scrollT = $(window).scrollTop();
    if (scrollT >= 1) {
        header.addClass("sticky");
    }

});

/* Adding class to header on scroll */
$(window).scroll(function() {
    var header = $("header");
    var scroll = $(window).scrollTop();

    if (scroll >= 1) {
        header.addClass("sticky");
        // $('.fd-sticky').addClass('inactive').removeClass('active');
    } else {
        header.removeClass("sticky");
        // $('.fd-sticky').removeClass('inactive').addClass('active');
    }
});

/* onclick("scrollTo('sectionID')") */
function scrollToSection(section, addOffset) {
    var header = $("header");
    addOffset = addOffset ? addOffset : 0;
    //this is for sticky headers
    var headerHeight = (header.height() - $('nav.navbar').height() + addOffset);
    if ($(section).offset()) {
        $('html, body').stop(true, true).animate({
            scrollTop: ($(section).offset().top - headerHeight)
        }, 1000);
    }
}
  
 
   
document.getElementById("x-it").addEventListener("click", function() {
    console.log(1);
    if (cbar.hasClass("active")) {
        cbar.removeClass('active').addClass('inactive');
        $(this).css('bottom', '1%');
        $(this).find('.fal').removeClass('fa-angle-down').addClass('fa-angle-up').attr('title', 'Show the bar');
    } else {
        cbar.removeClass('inactive').addClass('active');
        $(this).find('.fal').removeClass('fa-angle-up').addClass('fa-angle-down').css('bottom', '7%').attr('title', 'Hide the bar');
        $(this).css('bottom', '7%');
    }
}); 

window.addEventListener('load', function() {

    var documentWidth = $(document).width();
    // if (documentWidth > 1024) { 
    // }

    setTimeout(function() {
         

         if (documentWidth > 768) {
            pushBg('.banner2');
            pushBg('.banner3');
            pushBg('.banner4');
            pushBg('.banner5'); 
        }else {
            pushBg('.banner2', 'data-src-sm');
            pushBg('.banner3', 'data-src-sm');
            pushBg('.banner4', 'data-src-sm');
            pushBg('.banner5', 'data-src-sm');
        }

    },6000);

});

$(window).bind("load", function() {
    var tmap = $('#map');
    setTimeout(function() {
        tmap.html('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106194.494131793!2d-78.94884728603719!3d33.71986851863349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x890068953b552101%3A0xbc0fb115b5d09618!2sMyrtle%20Beach%2C%20SC!5e0!3m2!1sen!2sus!4v1660673194119!5m2!1sen!2sus" width="' + (tmap.width()) + '" height="400" frameborder="0" style="border:0; width: 100%;"></iframe>');
    }, 10000);

});  