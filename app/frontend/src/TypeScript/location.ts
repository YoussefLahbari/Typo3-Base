import L from 'leaflet';

class Location {
    private statePaths: NodeListOf<SVGPathElement>;
    private stateButton: HTMLElement;
    private stateList: HTMLElement;
    private map: L.Map;
    private stateListItems: NodeListOf<HTMLLIElement>;

    constructor() {
        if (!document.querySelector('.location-section')) return;

        this.statePaths = document.querySelectorAll('svg path');
        this.stateButton = document.getElementById('state-button') as HTMLElement;
        this.stateList = document.getElementById('state-list') as HTMLElement;
        this.stateListItems = this.stateList.querySelectorAll('li');

        this.initMap();
        this.addEventListeners();
    }

    private initMap(): void {
        this.map = L.map('openstreet-map').setView([51.1657, 10.4515], 6);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(this.map);
    }

    private addEventListeners(): void {
        this.statePaths.forEach(path => {
            path.addEventListener('mouseover', (e) => this.onStateHover(path, e));
            path.addEventListener('mouseout', () => this.onStateHoverOut());
            path.addEventListener('click', () => this.onStateClick(path));
        });

        this.stateListItems.forEach(item => {
            item.addEventListener('mouseover', (e) => this.onListItemHover(item, e));
            item.addEventListener('mouseout', () => this.onStateHoverOut());
            item.addEventListener('click', () => this.onListItemClick(item));
        });
    }

    private onStateHover(path: SVGPathElement, event: MouseEvent): void {
        const stateName = path.id.replace(/-/g, ' ');
        this.updateStateButton(stateName, event);
        path.classList.add('hovered');
        this.activateListItem(path.id);
    }

    private onStateHoverOut(): void {
        this.statePaths.forEach(path => path.classList.remove('hovered'));
        this.stateButton.classList.remove('active');
        this.stateListItems.forEach(item => item.classList.remove('active'));
    }

    private async onStateClick(path: SVGPathElement): Promise<void> {
        const coordinates = await this.fetchCoordinates(path.id.replace(/-/g, ' '));
        if (coordinates) {
            this.updateMap(coordinates.lat, coordinates.lng, path.id.replace(/-/g, ' '));
        }
    }

    private updateStateButton(stateName: string, event: MouseEvent): void {
        this.stateButton.textContent = `${stateName} (${Math.floor(Math.random() * 9)} locations)`;
        this.stateButton.classList.add('active');
        
        // Make the button follow the cursor
        const offset = 10; // Distance from cursor
        this.stateButton.style.position = 'fixed';
        this.stateButton.style.left = `${event.clientX + offset}px`;
        this.stateButton.style.top = `${event.clientY + offset}px`;
    }

    private activateListItem(stateId: string): void {
        this.stateListItems.forEach(item => {
            if (item.classList.contains(stateId)) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    }

    private onListItemHover(item: HTMLLIElement, event: MouseEvent): void {
        const stateId = Array.from(item.classList).find(cls => 
            Array.from(this.statePaths).some(path => path.id === cls)
        );
        if (stateId) {
            const path = document.getElementById(stateId) as SVGPathElement;
            if (path) {
                this.onStateHover(path, event);
            }
        }
    }

    private onListItemClick(item: HTMLLIElement): void {
        const stateId = Array.from(item.classList).find(cls => 
            Array.from(this.statePaths).some(path => path.id === cls)
        );
        if (stateId) {
            const path = document.getElementById(stateId) as SVGPathElement;
            if (path) {
                this.onStateClick(path);
            }
        }
    }

    private async fetchCoordinates(stateName: string): Promise<{ lat: number, lng: number } | null> {
        try {
            const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(stateName)}`);
            const data = await response.json();
            if (data && data.length > 0) {
                return {
                    lat: parseFloat(data[0].lat),
                    lng: parseFloat(data[0].lon),
                };
            }
        } catch (error) {
            console.error('Error fetching coordinates:', error);
        }
        return null;
    }

    private updateMap(lat: number, lng: number, stateName: string): void {
        this.map.setView([lat, lng], 10);
        L.marker([lat, lng]).addTo(this.map)
            .bindPopup(`<b>${stateName}</b>`)
            .openPopup();
    }
}

export const location = new Location();