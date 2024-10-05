import Swiper from 'swiper/bundle';

class Slider {
    swiper: Swiper | undefined;

    constructor() {
        // Initialize the slider after the DOM content is loaded
        document.addEventListener('DOMContentLoaded', () => {
            this.initializeSwiper();
        });
    }

    initializeSwiper() {
        const swiperContainer = document.querySelector('.brand-slider');
        
        if (swiperContainer) {
            this.swiper = new Swiper(swiperContainer as HTMLElement, {
                direction: 'horizontal',
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                },
                
                // Navigation arrows
                navigation: {
                    nextEl: '.brand-next',
                    prevEl: '.brand-prev',
                },
                // Pagination
                pagination: {
                    el: '.brand-pag',
                    type: 'bullets',
                    clickable: true
                  },
            });
        }
    }
}

// Initialize the Slider class
export const slider = new Slider();