class TabNavigation {
    tabsContainer: HTMLElement;
    tabs: NodeListOf<HTMLElement>;
    tabIndicator: HTMLElement;

    constructor() {
        this.tabsContainer = document.querySelector('.tabs-container');
        if (this.tabsContainer) {
            this.tabs = this.tabsContainer.querySelectorAll('.nav-link');
            this.tabIndicator = this.tabsContainer.querySelector('.tab-indicator');

            const activeTab = this.tabsContainer.querySelector('.nav-link.active') as HTMLElement;
            this.positionIndicator(activeTab);

            this.addEventListeners();
        }
    }

    positionIndicator(tab: HTMLElement) {
        this.tabIndicator.style.width = `${tab.offsetWidth}px`;
        this.tabIndicator.style.left = `${tab.offsetLeft}px`;
    }

    addEventListeners() {
        this.tabs.forEach(tab => {
            tab.addEventListener('mouseenter', () => {
                this.positionIndicator(tab);
            });

            tab.addEventListener('mouseleave', () => {
                const currentActiveTab = this.tabsContainer.querySelector('.nav-link.active') as HTMLElement;
                this.positionIndicator(currentActiveTab);
            });

            tab.addEventListener('click', () => {
                this.tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                this.positionIndicator(tab);
            });
        });
    }
}

export const tabNavigation = new TabNavigation();
