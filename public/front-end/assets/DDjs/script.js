/* Scroll Top Button JS Start */
const scrollToTopBtn = document.getElementById("scrollToTopBtn");

window.addEventListener("scroll", () => {
    if (window.scrollY > 100) {
        scrollToTopBtn.classList.remove("opacity-0", "invisible");
        scrollToTopBtn.classList.add("opacity-100", "visible");
    } else {
        scrollToTopBtn.classList.remove("opacity-100", "visible");
        scrollToTopBtn.classList.add("opacity-0", "invisible");
    }
});

scrollToTopBtn.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});
/* Scroll Top Button JS End */

/* Product Slider Start */
$(".companies.responsive").slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay: false,
    autoplaySpeed: 2000,
    speed: 300,
    slidesToShow: 8,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 5,
                // slidesToScroll: 1,
                // infinite: true,
                // dots: true
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                // slidesToScroll: 1
            },
        },
        {
            breakpoint: 350,
            settings: {
                slidesToShow: 3,
                // slidesToScroll: 1
            },
        },
    ],
});
/* Product Slider End */

/* Product Slider Start */
$(".product.responsive").slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay: false,
    autoplaySpeed: 2000,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                // slidesToScroll: 1,
                // infinite: true,
                // dots: true
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                // slidesToScroll: 1
            },
        },
        {
            breakpoint: 350,
            settings: {
                slidesToShow: 2,
                // slidesToScroll: 1
            },
        },
    ],
});
/* Product Slider End */
