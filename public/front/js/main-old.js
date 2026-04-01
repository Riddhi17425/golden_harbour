// web dropdown header
// document.addEventListener("DOMContentLoaded", function() {
//     if (window.innerWidth >= 992) { // Only for desktop screens
//         document.querySelectorAll(".nav-item.dropdown .nav-link").forEach(function(dropdown) {
//             dropdown.addEventListener("click", function(event) {
//                 event.preventDefault(); // Prevent default click behavior
//                 event.stopPropagation(); // Stop event bubbling
//             });
//         });
//     }
// });
   function showTab(tabId) {
        // Remove active from all tabs
        document.querySelectorAll(".tabs-list li").forEach(li => li.classList.remove("active"));
        document.querySelectorAll(".tab-pane").forEach(pane => pane.style.display = "none");

        // Activate current tab
        document.querySelector(`[onclick="showTab('${tabId}')"]`).classList.add("active");
        document.getElementById(tabId).style.display = "block";
    }
// /*-------------------------------------
//   responsive side menu close js
//     -------------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
    // Get elements
    const closePanelButton = document.querySelector(".closepanel");
    const navbarCollapse = document.querySelector("#navbarScroll");
    const navbarToggler = document.querySelector(".navbar-toggler");

    // Function to enable or disable scrolling
    function toggleScrollLock(open) {
        if (open) {
            document.body.style.overflow = "hidden"; // Disable scrolling when menu is open
        } else {
            document.body.style.overflow = ""; // Enable scrolling when menu is closed
        }
    }

    // When clicking the close button
    closePanelButton.addEventListener("click", function () {
        navbarCollapse.classList.remove("show"); // Close menu
        toggleScrollLock(false); // Enable scrolling
    });

    // When clicking the menu toggle button
    navbarToggler.addEventListener("click", function () {
        const isOpen = navbarCollapse.classList.contains("show");
        toggleScrollLock(!isOpen);
    });
});

// // introVideo 
// document.addEventListener("DOMContentLoaded", function () {
//     let isMobile = window.innerWidth <= 768; // adjust breakpoint if needed

//     let video = document.getElementById("introVideo");
//     let videoContainer = document.getElementById("videoContainer");
//     let mainContent = document.getElementById("bodymainContent");

//     // Function to fade in content
//     function fadeIn(element) {
//         element.style.opacity = 0;
//         element.style.display = "block";
//         let opacity = 0;
//         const fadeInInterval = setInterval(() => {
//             opacity += 0.05;
//             element.style.opacity = opacity;
//             if (opacity >= 1) clearInterval(fadeInInterval);
//         }, 50);
//     }

//     if (isMobile) {
//         // If mobile: skip video, show main content
//         videoContainer.style.display = "none";
//         mainContent.style.display = "block";
//     } else {
//         // Desktop: play video, then fade in content
//         video.onended = function () {
//             videoContainer.style.display = "none";
//             fadeIn(mainContent);
//         };
//     }
// });
document.addEventListener("DOMContentLoaded", function () {
    let isMobile = window.innerWidth <= 768; 
    let video = document.getElementById("introVideo");
    let videoContainer = document.getElementById("videoContainer");
    let mainContent = document.getElementById("bodymainContent");

    function fadeIn(element) {
        element.style.opacity = 0;
        element.style.display = "block";
        let opacity = 0;
        const fadeInInterval = setInterval(() => {
            opacity += 0.05;
            element.style.opacity = opacity;
            if (opacity >= 1) clearInterval(fadeInInterval);
        }, 50);
    }

    // Skip video if preview URL
    if (window.location.href.includes("preview") || isMobile) {
        videoContainer.style.display = "none";
        mainContent.style.display = "block";
    } else {
        video.onended = function () {
            videoContainer.style.display = "none";
            fadeIn(mainContent);
        };
    }
});


// document.addEventListener("DOMContentLoaded", function() {
//     let video = document.getElementById("introVideo");
//     let videoContainer = document.getElementById("videoContainer");
//     let mainContent = document.getElementById("bodymainContent");

//     // Function to add fade-in effect
//     function fadeIn(element) {
//         element.style.opacity = 0;
//         element.style.display = "block";
//         let opacity = 0;
//         const fadeInInterval = setInterval(() => {
//             opacity += 0.05;
//             element.style.opacity = opacity;
//             if (opacity >= 1) clearInterval(fadeInInterval);
//         }, 50);
//     }

//     video.onended = function() {
//         videoContainer.style.display = "none"; // Video ko hata do
//         fadeIn(mainContent); // Smooth fade-in effect
//     };
// });

// document.addEventListener("DOMContentLoaded", function () {
//     const video = document.getElementById("introVideo");
//     const videoContainer = document.getElementById("videoContainer");
//     const skipButton = document.getElementById("skipButton");
//     const homepage = document.getElementById("homepage");

//     // Debugging
//     console.log("Video:", video);
//     console.log("Skip Button:", skipButton);
//     console.log("Homepage:", homepage);

//     if (!skipButton) {
//         console.error("Skip button not found in DOM!");
//         return;
//     }

//     function showHomepage() {
//         console.log("showHomepage called");
//         video.pause();
//         videoContainer.style.display = "none";
//         homepage.style.display = "block";
//     }

//     // Start video
//     video.play().catch(error => {
//         console.log("Autoplay failed:", error);
//         showHomepage();
//     });

//     // Event Listeners
//     video.addEventListener("ended", showHomepage);
//     skipButton.addEventListener("click", showHomepage);
//     video.addEventListener("error", showHomepage);
// });

// document.addEventListener("DOMContentLoaded", function () {
//     const video = document.getElementById("introVideo");
//     const videoContainer = document.getElementById("videoContainer");
//     const homepage = document.getElementById("homepage");

//     // Debugging
//     console.log("Video:", video);
//     console.log("Homepage:", homepage);

//     if (!video) {
//         console.error("Video element not found in DOM!");
//         return;
//     }

//     function showHomepage() {
//         console.log("showHomepage called");
//         video.pause();
//         videoContainer.style.display = "none";
//         homepage.style.display = "block";
//     }

//     // Start video
//     video.play().catch(error => {
//         console.log("Autoplay failed:", error);
//         showHomepage();
//     });

//     // Event Listeners
//     video.addEventListener("ended", showHomepage);
//     video.addEventListener("error", showHomepage);
// });
// linkdin slider
$(document).ready(function () {
    new Swiper('.linkedin-slider', {
        loop: true,
        slidesPerView: 3,
        spaceBetween: 20,
        paginationClickable: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1919: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1028: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
});

$(document).ready(function () {
    new Swiper('.our-client', {
        loop: true,
        slidesPerView: 3,
        spaceBetween: 20,
        paginationClickable: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1919: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1028: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
});



// hero sliderjs 
// $(document).ready(function () {
//     const swiper = new Swiper('.hero_slider', {
//         loop: true,
//         effect: 'fade',
//         fadeEffect: {
//             crossFade: true
//         },
//           autoplay: {
//             delay: 5000, // 5 seconds
//             disableOnInteraction: false, // keeps autoplay running even after interaction
//         },
//         pagination: {
//             el: '.swiper-pagination',
//             clickable: true,
//         },
//         on: {
//             init: function () {
//                 // Total slides ko directly count karna
//                 let totalSlides = $('.hero_slider .swiper-slide:not(.swiper-slide-duplicate)').length;

//                 $('.gallery__pagin-wrap .total-slides.hero').text(totalSlides.toString().padStart(2, '0'));
//             },
//             slideChange: function () {
//                 let currentSlide = this.realIndex + 1;
//                 let totalSlides = $('.hero_slider .swiper-slide:not(.swiper-slide-duplicate)').length;

//                 $('.gallery__pagin-wrap .current-slide.hero').text(currentSlide.toString().padStart(2, '0'));

//                 let progress = (currentSlide / totalSlides) * 100;
//                 $('.swiper-pagination-progressbar-fill.hero').css('width', progress + '%');
//             }
//         }
//     });
// });
$(document).ready(function () {
    const swiper = new Swiper('.hero_slider', {
        loop: true,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
         pauseOnFocus: false,
        pauseOnHover: false,
        // autoplay: false,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        on: {
            init: function () {
                let totalSlides = $('.hero_slider .swiper-slide:not(.swiper-slide-duplicate)').length;
                $('.gallery__pagin-wrap .total-slides.hero').text(totalSlides.toString().padStart(2, '0'));

                // ðŸ†• Set initial current slide and progress bar
                let currentSlide = this.realIndex + 1;
                $('.gallery__pagin-wrap .current-slide.hero').text(currentSlide.toString().padStart(2, '0'));

                let progress = (currentSlide / totalSlides) * 100;
                $('.swiper-pagination-progressbar-fill.hero').css('width', progress + '%');
            },

            slideChange: function () {
                let currentSlide = this.realIndex + 1;
                let totalSlides = $('.hero_slider .swiper-slide:not(.swiper-slide-duplicate)').length;

                $('.gallery__pagin-wrap .current-slide.hero').text(currentSlide.toString().padStart(2, '0'));

                let progress = (currentSlide / totalSlides) * 100;
                $('.swiper-pagination-progressbar-fill.hero').css('width', progress + '%');
            }
        }
    });
});



/* slider */
$(document).ready(function () {
    var $slider = $('.industrial_slider');
    var $progressBar = $('.progress-fill.industrial');
    var $currentSlide = $('.current-slide.industrial');
    var $totalSlides = $('.total-slides.industrial');
    $slider.on('init reInit afterChange', function (event, slick, currentSlide) {
        var slideIndex = (currentSlide ? currentSlide : 0) + 1;
        $currentSlide.text(slideIndex.toString().padStart(2, '0'));
        $totalSlides.text(slick.slideCount.toString().padStart(2, '0'));
        var progress = (slideIndex / slick.slideCount) * 100;
        $progressBar.css('width', progress + '%');
    });

    $slider.slick({
        dots: false,
        arrows: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 600,
        pauseOnFocus: false,
        pauseOnHover: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

});

// client slider
$(document).ready(function () {
    var $slider = $('.network_slider');
    var $progressBar = $('.progress-fill.network');
    var $currentSlide = $('.current-slide.network');
    var $totalSlides = $('.total-slides.network');
    $slider.on('init reInit afterChange', function (event, slick, currentSlide) {
        var slideIndex = (currentSlide ? currentSlide : 0) + 1;
        $currentSlide.text(slideIndex.toString().padStart(2, '0'));
        $totalSlides.text(slick.slideCount.toString().padStart(2, '0'));
        var progress = (slideIndex / slick.slideCount) * 100;
        $progressBar.css('width', progress + '%');
    });

    $slider.slick({
        dots: false,
        arrows: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 600,
        pauseOnFocus: false,
        pauseOnHover: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

});

// category select js
$(document).ready(function () {
    $("#categoryFilter").change(function () {
        var selectedCategory = $(this).val(); // Jo category select hui
        $(".category-item .row").hide(); // Pehle sabko hide kar do

        if (selectedCategory === "all") {
            $(".category-item .row").show(); // Agar "Show All" select hai, toh sab wapas show ho
        } else {
            $("#" + selectedCategory).show(); // Sirf selected category ka section show ho
        }
    });
});


// rippleBtns js
document.querySelectorAll(".btn--ripple").forEach((btn) => {
    btn.addEventListener("mouseenter", function (e) {
        let ripples = document.createElement("span");
        ripples.classList.add("ripple");

        let x = e.clientX - btn.getBoundingClientRect().left;
        let y = e.clientY - btn.getBoundingClientRect().top;

        ripples.style.left = `${x}px`;
        ripples.style.top = `${y}px`;

        this.appendChild(ripples);

        setTimeout(() => {
            ripples.remove();
        }, 1000); // Ripple effect duration
    });
});


// dark-circle js
const ctaBlock = document.querySelector(".catalog_wrapper ");
const darkCircle = document.querySelector(".dark-circle");

ctaBlock.addEventListener("mouseenter", () => {
    darkCircle.style.transform = "translate(10%, 60%)";
});

ctaBlock.addEventListener("mouseleave", () => {
    darkCircle.style.transform = "translate(10%, 100%)";
});
// tooltipList js
document.addEventListener("DOMContentLoaded", function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// read more and less js
function toggleText(el) {
    const content = el.previousElementSibling;

    if (content.classList.contains('expanded')) {
        content.classList.remove('expanded');
        el.textContent = "Read more";
    } else {
        content.classList.add('expanded');
        el.textContent = "Read less";
    }
}


// ------------

// $(document).ready(function () {
//     var $slider = $('.product_slider');
   
//     $slider.slick({
//         dots: true,
//         arrows: true,
//         infinite: true,
//         slidesToShow: 4,
//         slidesToScroll: 1,
//         autoplay: true,
//         autoplaySpeed: 3000,
//         speed: 600,
//         pauseOnFocus: false,
//         pauseOnHover: false,
//         responsive: [
//             {
//                 breakpoint: 1024,
//                 settings: {
//                     slidesToShow: 2
//                 }
//             },
//             {
//                 breakpoint: 768,
//                 settings: {
//                     slidesToShow: 1
//                 }
//             }
//         ]
//     });

// });


$(document).ready(function () {
    var $slider = $('.product_slider');
    var totalSlides = $slider.find('.slick-slide').length;

    // OR: Count manually before slick is initialized
    var slideCount = $slider.children().length;

    $slider.slick({
        dots: slideCount > 4, // Show dots only if more than 4 slides
        arrows: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 600,
        pauseOnFocus: false,
        pauseOnHover: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    dots: slideCount > 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    dots: slideCount > 1
                }
            }
        ]
    });
});

