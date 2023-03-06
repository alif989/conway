function showIconBg() {
    $('.credit-icons,.service_icon').css({ "background-image": "url(" + ajaxurl + 'assets/img/css_sprite_icons.png' + ")" });
}
function pushBg2(class_name, data_src = '') {
    if (data_src != '')
        data_src = $(class_name).attr(data_src);
    else
        data_src = $(class_name).attr("data-src");;

    $(class_name).css({ "background-image": "url(" + data_src + ")" });
}

document.addEventListener("DOMContentLoaded", function() {
    const imageObserver = new IntersectionObserver((entries, imgObserver) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const lazyImage = entry.target
                    // console.log("lazy loading ", lazyImage)
                lazyImage.src = lazyImage.dataset.src
                lazyImage.classList.remove("lazy_img");
                imgObserver.unobserve(lazyImage);
            }
        })
    });
    const arr = document.querySelectorAll('img.lazy_img')
    arr.forEach((v) => {
        imageObserver.observe(v);
    })
})


$(function() {

    var bannerSlider = $('.homeBanner .owl-carousel');

    // $==> Home page main slider
    bannerSlider.owlCarousel({
    loop: true,
        margin: 0,
        nav: false,
        items: 1,
        smartSpeed: 1000,
        autoplay: true,
        mouseDrag: true,
        autoplayTimeout: 5500,
        autoplayHoverPause: false,
        animateOut: 'fadeOut',
        dotsContainer: '.carousel-custom-dots',
        dots: true,
    });

    var serviceSlider = $('.service-carousel');
    serviceSlider.owlCarousel({
       loop: true,
       margin: 20,
           nav: true,
           items:3,
           smartSpeed: 1000,
           autoplay: true,
           mouseDrag: true,
           autoplayTimeout: 5500,
           autoplayHoverPause: false,
           animateOut: 'fadeOut', 
           dots: false,
           navText: [
            '<i class="kico kico-left"></i>',
            '<i class="kico kico-right"></i>'
        ],
           responsive: {
            0: {
                items: 1, 
            }, 
            768: {
                items: 3, 
            },

        }
       }); 


    var aboutSlider = $('.about-carousel.owl-carousel');
    aboutSlider.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: true,
        items: 1,
        autoplay: true,
        // autoHeight: true,
        smartSpeed: 1000,
        // autoplay:true,
        autoplayTimeout: 3000,
        navText: [
            '<i class="kico kico-left"></i>',
            '<i class="kico kico-right"></i>'
        ],
        mouseDrag: true
            // autoplayTimeout:5500,
            // autoplayHoverPause:false,
            // animateOut: 'fadeOut'
    });
    

    
    if ($("body").hasClass("index")) {
        $("#tile-1 .nav-tabs a").click(function() {
            var position = $(this).parent().position();
            var width = ($(this).parent().width());
            $("#tile-1 .slider").css({ "left": +position.left, "width": width / 3 });
        });
        var actWidth = $("#tile-1 .nav-tabs").find(".active").parent("li").width();
        var actPosition = $("#tile-1 .nav-tabs .active").position();
        $("#tile-1 .slider").css({ "left": +actPosition.left, "width": actWidth / 3 });
    }

});


window.onload = function() {
 
    
    setTimeout(function() {

        $.ajax({ // JQuery Ajax
            type: 'GET',
            url: ajaxurl + 'home_top_part',
            data: 1, // We send the data string
            dataType: 'html',
            timeout: 3000,
            success: function(data) {
                // console.log(data);
                $('.top-part-home').html(data);

                // showIconBg();
                // stiky footer hide after few seconds
                $('.fd-sticky').addClass('active');

               
                // porfolio home page
 
                pushBg2('.portfolio-home');
                pushBg2('.video-home');
                pushBg2('.brand-icon', '.brands');
                 


                pushBg2(".cta-block")


                // add for video popup
                var $videoSrc = '';
                $('.video-btn').click(function() {
                    $videoSrc = $(this).data("src");
                });
                // console.log($videoSrc);

                // when the modal is opened autoplay it
                $('#myModal').on('shown.bs.modal', function(e) {

                    // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
                    $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
                })

                // stop playing the youtube video when I close the modal
                $('#myModal').on('hide.bs.modal', function(e) {
                        // a poor man's stop video
                        $("#video").attr('src', $videoSrc);
                    })
                    //end video

                    var portfolioGallery = $('#js-grid-mosaic-flat-home');
                    portfolioGallery.cubeportfolio({
                        filters: '#js-filters-mosaic-flat-home',
                        loadMore: '#js-grid-mosaic-flat-loadMore',
                        loadMoreAction: 'click',
                        layoutMode: 'grid',
                        sortToPreventGaps: true,
                        mediaQueries: [{
                            width: 1600,
                            cols: 4
                        }, {
                            width: 1100,
                            cols: 4
                        }, {
                            width: 800,
                            cols: 3
                        }, {
                            width: 240,
                            cols: 2
                        }],
                        defaultFilter: '.Myrtle-Beach-Locksmith',
                        animationType: 'quicksand', //unfold,
                        gapHorizontal: 0,
                        gapVertical: 0,
                        gridAdjustment: 'responsive',
                        caption: 'zoom',
                        displayType: 'bottomToTop',
                        displayTypeSpeed: 100,
                        // lightbox
                        lightboxDelegate: '.cbp-lightbox',
                        lightboxGallery: true,
                        lightboxTitleSrc: 'data-title',
                        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
                    }); 

                var reviewSlider = $('.reviews .owl-carousel');
                reviewSlider.owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: false,
                    stagePadding: 0,
                    items:2,
                    autoplay: true,
                    smartSpeed: 1000,
                    autoplayTimeout: 4000,
                    mouseDrag: true,
                    autoplayHoverPause: false,
                    responsive: {
                        0: {
                            items: 1,
                        },

                        1000: {
                            items: 2,
                        },
                    },
                });
                var brandSlider = $('.brands .owl-carousel');

                
                brandSlider.owlCarousel({
                    loop: true,
                    margin: 60,
                    nav: true,
                    navText: [
                        '<i class="fal fa-arrow-left"></i>',
                        '<i class="fal fa-arrow-right"></i>'
                    ],

                    responsive: {
                        0: {
                            items: 1,
                        },

                        1200: {
                            items: 4,
                        },
                    },
                    autoplay: true,
                    smartSpeed: 800,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: false,
                });



            },
            error: function(data) {
                console.log(data);
                $('.top-part-home').html('Problem');
            }
        });

    }, 6000);

}