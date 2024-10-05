import Swiper from 'swiper/bundle';

class Slider {
    swiper: Swiper | undefined;

    constructor() {
            this.initializeSwiper();
    }

    initializeSwiper() {
        const swiperContainer = document.querySelector('.model-slider');
        
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
                    nextEl: '.model-next',
                    prevEl: '.model-prev',
                },
                // Pagination
                pagination: {
                    el: '.model-pag',
                    type: 'bullets',
                    clickable: true
                  },
                
            });
        }
    }
}

// Initialize the Slider class
export const slider = new Slider();