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
        const swiperContainer = document.querySelector('.hero-slider');
        
        if (swiperContainer) {
            this.swiper = new Swiper(swiperContainer as HTMLElement, {
                // Optional parameters
                direction: 'horizontal',
                // loop: true,
                // autoplay: {
                //     delay: 5000,
                // },                
                // Navigation arrows
                navigation: {
                    nextEl: '.hero-next',
                    prevEl: '.hero-prev',
                },
                // Pagination
                pagination: {
                    el: '.hero-pag',
                    clickable: true,
                },
            });
        }
    }
}

// Initialize the Slider class
export const slider = new Slider();

