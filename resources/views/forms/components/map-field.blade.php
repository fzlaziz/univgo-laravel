{{-- resources/views/forms/components/map-field.blade.php --}}
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{
        address: $wire.entangle('{{ $getStatePath() }}'),
        lat: $wire.entangle('data.{{ $getLatitudeField() }}'),
        lng: $wire.entangle('data.{{ $getLongitudeField() }}'),
        map: null,
        marker: null,
        mapInitialized: false,

        init() {
            if (this.mapInitialized) return;

            // Load Leaflet CSS
            if (!document.querySelector('[data-leaflet-css]')) {
                const link = document.createElement('link');
                link.setAttribute('rel', 'stylesheet');
                link.setAttribute('href', 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.css');
                link.setAttribute('data-leaflet-css', '');
                document.head.appendChild(link);
            }

            // Load Leaflet JS
            if (!window.L) {
                const script = document.createElement('script');
                script.src = 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.js';
                script.onload = () => {
                    // Small delay to ensure DOM is ready
                    setTimeout(() => this.initializeMap(), 100);
                };
                document.head.appendChild(script);
            } else {
                setTimeout(() => this.initializeMap(), 100);
            }
        },

        initializeMap() {
            if (this.mapInitialized) return;

            const initialLat = this.lat || -6.2088;
            const initialLng = this.lng || 106.8456;

            // Force layout calculation
            $refs.map.style.height = '400px';

            // Initialize map with retry mechanism
            const tryInitMap = () => {
                try {
                    this.map = L.map($refs.map).setView([initialLat, initialLng], 13);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '© OpenStreetMap'
                    }).addTo(this.map);

                    // Add marker
                    this.marker = L.marker([initialLat, initialLng], {
                        draggable: true
                    }).addTo(this.map);

                    // Handle marker drag
                    this.marker.on('dragend', () => {
                        const position = this.marker.getLatLng();
                        this.lat = position.lat;
                        this.lng = position.lng;
                        this.updateReverseGeocode(position.lat, position.lng);
                    });

                    this.mapInitialized = true;

                    // If we have initial coordinates, update the address
                    if (this.lat && this.lng) {
                        this.updateReverseGeocode(this.lat, this.lng);
                    }

                    // Force map to update its container size
                    setTimeout(() => {
                        this.map.invalidateSize();
                    }, 100);
                } catch (error) {
                    console.error('Map initialization failed, retrying...', error);
                    setTimeout(tryInitMap, 100);
                }
            };

            tryInitMap();
        },

        async searchLocation() {
            if (!this.address) return;

            const apiUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(this.address)}&countrycodes=ID`;

            try {
                const response = await fetch(apiUrl);
                const data = await response.json();

                if (data.length > 0) {
                    const result = data[0];
                    const lat = parseFloat(result.lat);
                    const lng = parseFloat(result.lon);

                    this.lat = lat;
                    this.lng = lng;

                    this.map.setView([lat, lng], 13);
                    this.marker.setLatLng([lat, lng]);
                }
            } catch (error) {
                console.error('Error searching location:', error);
            }
        },

        async updateReverseGeocode(lat, lng) {
            const apiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`;

            try {
                const response = await fetch(apiUrl);
                const data = await response.json();

                if (data && data.display_name) {
                    this.address = data.display_name;
                }
            } catch (error) {
                console.error('Error reverse geocoding:', error);
            }
        }
    }"
    x-init="init"
>
    <div class="filament-forms-field-wrapper">
        {{-- Search Input --}}
        <div class="flex space-x-2 mb-4">
            <input
                type="text"
                x-model="address"
                class="block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500 disabled:opacity-70 dark:bg-gray-700 dark:text-white dark:focus:border-primary-500 border-gray-300 dark:border-gray-600"
                placeholder="{{ __('Search location...') }}"
            >
            <button
                type="button"
                x-on:click="searchLocation"
                class="filament-button inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700"
            >
                {{ __('Search') }}
            </button>
        </div>

        {{-- Map Container with explicit dimensions --}}
        <div x-ref="map" style="width: 100%; height: 400px; min-height: 400px;" class="rounded-lg border border-gray-300 dark:border-gray-600"></div>
    </div>
</x-dynamic-component>
