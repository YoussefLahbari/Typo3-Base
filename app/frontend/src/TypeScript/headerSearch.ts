class SearchHandler {
    private searchContainer: HTMLElement;
    private searchForm: HTMLFormElement;
    private searchInput: HTMLInputElement;
    private searchToggle: HTMLElement;
    private navItems: NodeListOf<HTMLElement>;
    private isSearchVisible: boolean = false;

    constructor() {
        this.searchContainer = document.querySelector('.search-container');
        this.searchForm = document.querySelector('#tx_indexedsearch');
        this.searchInput = document.querySelector('#tx-indexedsearch-searchbox-sword');
        this.searchToggle = document.querySelector('.search-toggle');
        this.navItems = document.querySelectorAll('.navbar-menu.large ul li:not(:last-child)');

        if (this.searchContainer && this.searchForm && this.searchInput && this.searchToggle) {
            this.init();
        }
        document.querySelector('.navbar-menu.large .navbar-brand').addEventListener('click', function() {
        document.querySelector('.navbar').classList.toggle('menu-active');
        });
// footer
const accordionToggles = document.querySelectorAll('.footer__toogle');

accordionToggles.forEach(toggle => {
  toggle.addEventListener('click', () => {
    const column = toggle.closest('.footer__column');
    const isActive = column.classList.contains('active');
    const list = column.querySelector('.footer__list');
    
    // Close all sections
    accordionToggles.forEach(t => {
      const col = t.closest('.footer__column');
      col.classList.remove('active');
      col.querySelector('.footer__list').classList.remove('active');
    });
    
    // If the clicked section wasn't active, open it
    if (!isActive) {
      column.classList.add('active');
      list.classList.add('active');
    }
  });
});
    }

    private init(): void {
        this.searchForm.addEventListener('submit', this.handleSubmit.bind(this));
        this.searchToggle.addEventListener('click', this.handleToggleClick.bind(this));

        // Check if we are on the search results page
        this.checkIfSearchPage();
    }

    private checkIfSearchPage(): void {
        const url = window.location.href;

        // Assuming your search results page contains '/search?tx_' in the URL
        if (url.includes('/search?tx_')) {
            this.showSearch();
        }
    }

    private handleToggleClick(event: Event): void {
        event.preventDefault();
        if (this.searchInput.value.trim() !== '') {
            this.searchForm.submit();
        } else {
            this.toggleSearch();
        }
    }

    private toggleSearch(): void {
        this.isSearchVisible = !this.isSearchVisible;

        if (this.isSearchVisible) {
            this.showSearch();
        } else {
            this.hideSearch();
        }
    }

    private showSearch(): void {
        this.isSearchVisible = true;
        this.searchContainer.style.width = '100%';
        this.searchInput.style.display = 'block';
        this.navItems.forEach(item => item.style.display = 'none');
        this.searchInput.focus();
    }

    private hideSearch(): void {
        this.isSearchVisible = false;
        this.searchContainer.style.width = 'fit-content';
        this.searchInput.style.display = 'none';
        this.navItems.forEach(item => item.style.display = '');
    }

    private handleSubmit(event: Event): void {
        if (this.searchInput.value.trim() === '') {
            event.preventDefault();
            this.toggleSearch();
        }
    }
}

export const searchHandler = new SearchHandler();
