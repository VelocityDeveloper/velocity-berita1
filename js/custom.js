jQuery(function($) {
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 200) {
            $(".scrollHeader").addClass("fixedHeader");
        } else {
            $(".scrollHeader").removeClass("fixedHeader");
        }
    });
    
    $('.related-post-carousel .module-vdposts').flickity({
        cellAlign: 'left',
        groupCells: true,
        autoPlay: true,
        autoPlay: 2000,
        wrapAround: true,
        lazyLoad: true,
        pageDots: false,
        arrowShape: {x0: 10, x1: 60, y1: 50, x2: 65, y2: 40, x3: 25}
    });

    $('.breaking-news').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        arrows: true,
        prevArrow: '<div class="prev-arrow"><</div>',
        nextArrow: '<div class="next-arrow">></div>',
    });

    $('.module-vdposts-carousel').slick({
        dots: false,
        infinite: false,
        speed: 400,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<div class="prev-arrow py-2 px-3 bg-color-theme text-white"><i class="fa fa-angle-double-left fa-2x" aria-hidden="true"></i></div>',
        nextArrow: '<div class="next-arrow py-2 px-3 bg-color-theme text-white"><i class="fa fa-angle-double-right fa-2x" aria-hidden="true"></i></div>',
        responsive: [
          {
            breakpoint: 1024,
      
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
        ]
    });
});