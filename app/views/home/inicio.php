<!DOCTYPE html>
<html lang="es">

<head>
	<?= $head ?>
	<title><?= $title ?></title>
</head>

<body>

	<div class="maps">
		<form class="search" action="" method="get">
			<button type="submit"><i class='bx bx-microphone'></i></button>
			<input class="search-q" type="search" placeholder="buscar cochera..." name="q">
			<button type="submit"><i class='bx bx-search-alt-2'></i></button>
		</form>
		<div id="map"></div>

	</div>


	<script>

		//definimos una variable locations para guardar/transformar el arreglo de php
		let locations = <?= $locations ?>;

		// agregar la vista
		var map = L.map('map').setView([-32.96086, -60.67801], 14);

		//agregar el estilo de mapa
		var Stadia_AlidadeSmooth = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.{ext}', {
			minZoom: 0,
			maxZoom: 17,
			attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy;',
			ext: 'png'
		}).addTo(map);


		//personalizacion del marcador
		var Eicon = L.icon({
			iconUrl: '../img/favicon.png', /* imagen */

			iconSize: [50, 50], /* tamaño del icono*/
			iconAnchor: [22, 22], /* punto del icono que corresponde con la ubicacion*/
			popupAnchor: [-1, -1] /* punto desde donde debe abrirse el pop-up*/
		});


		let UbicacionUser = [-32.945056, -60.645626]; // Hardcodear la posicion del usuario

		// Agregar marcador para la ubicación del usuario
		let userMarker = L.marker(UbicacionUser, {
			icon: L.icon({
				iconUrl: 'https://cdn-icons-png.flaticon.com/512/1549/1549624.png', /* ícono para el usuario */
				iconSize: [40, 40],
				iconAnchor: [20, 20],
				popupAnchor: [0, -20]
			})
		}).addTo(map).bindPopup('Ubicación actual').openPopup();

		// Variable para almacenar el trazo actual
		let currentRoute = null;

		//recorremos el arreglo
		locations.forEach((marker) => {
			//agregamos el marcador
			let mapMarker = L.marker([marker.lat, marker.lon], { icon: Eicon }).addTo(map);

			let PopUpInicial = `
		<div class="custom-popup">
			<p class="mb-0">$${marker.price}</p>
		</div>
	`;

			//asignar popUp inicial
			mapMarker.bindPopup(PopUpInicial);

			//abrir popup

			//Al presionar cualquier marcador
			mapMarker.on('click', function () {

				// Si ya hay un trazo y es el mismo marcador, lo eliminamos
				if (currentRoute) {
					map.removeLayer(currentRoute);
					currentRoute = null;

					// Si es el mismo marcador, salir
					if (this === mapMarker) return;
				}

				// Ruta entre userLocation y el marcador actual
				let routeUrl = `https://router.project-osrm.org/route/v1/driving/${UbicacionUser[1]},${UbicacionUser[0]};${marker.lon},${marker.lat}?overview=full&geometries=geojson`;

				// Llamada a la API OSRM
				fetch(routeUrl)
					.then(response => response.json())
					.then(data => {
						if (data.routes && data.routes.length > 0) {
							let routeCoords = data.routes[0].geometry.coordinates.map(coord => [coord[1], coord[0]]);

							// Crear el trazo con las coordenadas de la ruta
							currentRoute = L.polyline(routeCoords, {
								color: 'blue',
								weight: 5,
								opacity: 0.7
							}).addTo(map);
						} else {
							alert('No se pudo calcular la ruta.');
						}
					})
					.catch(err => console.error('Error al obtener la ruta:', err));




				//se crea contenido con mas detalles
				let PopupDetalles = `
				<div class="card shadow-lg">	
					<img class="card-img-top" src="${marker.otherDetails}" alt="image">
					<div class="card-body">
					<p class="card-title" style="font-size:20px; font-weight:600;">$${marker.price}</p>
					<p class="card-text">${marker.description}</p>
					<p class="card-text">${marker.address}</p>
					<a class="btn btn-primary" href="#">ver mas...</a>
					</div>
				</div>
			`;
				//actualiza el Popup con mas detalles
				mapMarker.setPopupContent(PopupDetalles);

				// Abrir el popup con los nuevos detalles
				mapMarker.openPopup();

			});
		});
	</script>

</body>

</html>