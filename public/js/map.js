document.addEventListener('DOMContentLoaded', function () {
    const mapDiv = document.getElementById('map');
    let map;

    // ✅ Observador para inicializar el mapa cuando el contenedor sea visible
    const observer = new ResizeObserver(entries => {
        for (let entry of entries) {
            const { width, height } = entry.contentRect;
            if (width > 0 && height > 0) {
                // Si el mapa no está inicializado, créalo
                if (!map) {
                    initializeMap(mapDiv);
                }
                // Si ya existe, solo ajusta el tamaño
                else {
                    map.invalidateSize();
                }
            }
        }
    });

    // Iniciar la observación del contenedor del mapa
    observer.observe(mapDiv);

    function initializeMap(container) {
        // ✅ Verifica que haya ubicaciones disponibles
        if (!Array.isArray(window.storeLocations) || !window.storeLocations.length) {
            console.warn('No hay ubicaciones para mostrar en el mapa.');
            return;
        }

        // 🛠️ Corregir rutas de íconos al usar CDN
        delete L.Icon.Default.prototype._getIconUrl;
        L.Icon.Default.mergeOptions({
            iconRetinaUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png',
            iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png',
            shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png'
        });

        // 📍 Iniciar mapa centrado en la primera tienda
        const { lat, lng } = window.storeLocations[0];
        map = L.map(container).setView([lat, lng], 10);

        // 🗺️ Capa base de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // 🧼 Asegurar que el mapa se adapte al contenedor
        map.invalidateSize();

        // 📌 Añadir marcadores
        window.storeLocations.forEach(({ nombre, direccion, lat, lng }) => {
            L.marker([lat, lng])
                .addTo(map)
                .bindPopup(`
                    <strong>${nombre}</strong><br>
                    ${direccion}<br>
                    <a href="https://www.openstreetmap.org/?mlat=${lat}&mlon=${lng}&zoom=18"
                       target="_blank" rel="noopener">Ver en OSM</a>
                `);
        });
    }
});