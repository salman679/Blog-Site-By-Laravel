$(document).ready(function () {

    // search bar
    $('.header .main-menu .menu-content .search a').on('click', function () {
        $('.search-area, .overflow').addClass('active');
    });

    $('.header .main-menu .menu-content .search .overflow').on('click', function () {
        $('.search-area, .overflow').removeClass('active');
    });

    // mobil icon
    $('.mobil-icon').on('click', function () {
        $('.menu-list, .ovarflow').addClass('active');
    })

    $('.menu-list, .ovarflow').on('click', function () {
        $('.menu-list, .ovarflow').removeClass('active');
    })

    // slick slider
    $('.slick-slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        pauseOnHover: false,
        // fade: true,
        prevArrow: `<button type="button" class="slick-prev"><i class="fa-solid fa-arrow-left-long"></i></button>`,
        nextArrow: `<button type="button" class="slick-next"><i class="fa-solid fa-arrow-right-long"></i></button>`,
        responsive: [
            {
                breakpoint: 767.98,
                settings: {
                    arrows: false,
                }
            }
        ]
    })

    // back to top
    $('.back-to-top').on('click', () => {
        $('body, html').animate({
            scrollTop: 0
        }, 0)
    })

    $(window).on('scroll', () => {
        let e = $(this).scrollTop();

        if (e < 300) {
            $('.back-to-top').addClass('d-none')
        } else {
            $('.back-to-top').removeClass('d-none')
        }
    })
})
