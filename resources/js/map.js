
    document.addEventListener('DOMContentLoaded', function () {
    const locales = window.storeLocations;

    if (!locales || locales.length === 0) return;

    const map = L.map('map').setView([locales[0].lat, locales[0].lng], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    locales.forEach(local => {
        L.marker([local.lat, local.lng])
            .addTo(map)
            .bindPopup(`<strong>${local.nombre}</strong><br>${local.direccion}`);
    });
});