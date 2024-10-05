class DownloadsSection {
    constructor() {
        this.categories = document.querySelectorAll('.downloads-category');
        this.loadMoreButton = document.querySelector('.load-more-button');
        
        this.categories.forEach(category => {
            const title = category.querySelector('.category-title');
            const downloadList = category.querySelector('.download-list');
            
            // Make sure the download list is hidden by default
            downloadList.classList.add('hidden');
            
            // Attach the click event handler
            title.addEventListener('click', () => this.toggleCategory(category));
        });

        if (this.loadMoreButton) {
            this.loadMoreButton.addEventListener('click', this.loadMore.bind(this));
        }
    }

    toggleCategory(selectedCategory) {
        // Close all other categories
        this.categories.forEach(category => {
            const downloadList = category.querySelector('.download-list');
            const arrowIcon = category.querySelector('.d-action');
            
            // Hide other categories and reset arrow rotation
            if (category !== selectedCategory) {
                downloadList.classList.add('hidden');
                if (arrowIcon) {
                    arrowIcon.classList.remove('rotate');
                }
            }
        });

        // Toggle the selected category
        const selectedDownloadList = selectedCategory.querySelector('.download-list');
        const selectedArrowIcon = selectedCategory.querySelector('.d-action');
        
        selectedDownloadList.classList.toggle('hidden');
        if (selectedArrowIcon) {
            selectedArrowIcon.classList.toggle('rotate');
        }
    }

    loadMore() {
        // Implement functionality to load more items
    }
}

export const downloadsSection = new DownloadsSection();



