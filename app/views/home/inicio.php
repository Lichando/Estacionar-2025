<!DOCTYPE html>
<html lang="es">

<head>
	<?= $head ?>
	<title><?= $title ?></title>
</head>

<body>
	<header>
		<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="../img/imagen1.jpg" class="d-block w-100" alt="Imagen 1">

				</div>
				<div class="carousel-item">
					<img src="../img/imagen2.png" class="d-block w-100" alt="Imagen 2">

				</div>
				<div class="carousel-item">
					<img src="../img/imagen3.png" class="d-block w-100" alt="Imagen 3">

				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>

		<div class="carousel-caption">
			<div>
				<h1> Estacionar App</h1>
			</div>
			<div class="carousel-logo">
				<img src="../img/logoestacionar.png" alt="Logo">
			</div>
			<div>
				<a href="../../auth/login" class="btn btn-primary fw-semibold">Acceder, ahora mismo!</a>
			</div>
		</div>
	</header>

	<section class="section-padding text-center">
		<div class="container">
			<h2 class="mb-4">Descripción de la App</h2>
			<p class="lead">Nuestra app de estacionamiento facilita a los usuarios la búsqueda y comparación de cocheras
				disponibles en tiempo real. <br>
				La plataforma conecta a dueños de servicios de parking y particulares con usuarios que necesitan
				estacionar sus vehículos, ofreciendo opciones de alquiler mensual, por hora, diario, entre otros.
			</p>
		</div>
	</section>

	<section class="section-padding bg-light text-center">
		<div class="container">
			<h2 class="mb-4">Sobre Nosotros</h2>
			<p class="lead">Somos grupo de estudiantes que cursan el ultimo año de la Carrera "Análisis Funcional de
				Sistemas Informáticos" y que mediante el desarrollo de esta nueva App de Estacionamiento buscan
				solucionar una de las problemáticas más comunes en la ciudad de Rosario.</p>
		</div>
	</section>

	<section class="section-padding bg-light text-center">
		<div class="container">
			<h2 class="mb-4">Nuestro Equipo</h2>
			<div class="profile-container">
				<div class="profile">
					<img src="../img/user.png" alt="Nombre 1">
					<p>Franco</p>
				</div>
				<div class="profile">
					<img src="../img/user.png" alt="Nombre 2">
					<p>Lisandro</p>
				</div>
				<div class="profile">
					<img src="../img/user.png" alt="Nombre 3">
					<p>Maximo</p>
				</div>
				<div class="profile">
					<img src="../img/user.png" alt="Nombre 4">
					<p>Walter</p>
				</div>
				<div class="profile">
					<img src="../img/user.png" alt="Nombre 5">
					<p>Mauricio</p>
				</div>
				<div class="profile">
					<img src="../img/user.png" alt="Nombre 6">
					<p>Emanuel</p>
				</div>
				<div class="profile">
					<img src="../img/user.png" alt="Nombre 7">
					<p>Luis</p>
				</div>
				<div class="profile">
					<img src="../img/user.png" alt="Nombre 8">
					<p>Florencia</p>
				</div>
				<div class="profile">
					<img src="../img/user.png" alt="Nombre 8">
					<p>Lucas</p>
				</div>
			</div>
		</div>
	</section>

	<footer class="text-center">
		<div class="footer-wave">
			<svg viewBox="0 0 500 150" preserveAspectRatio="none">
				<path d="M0.00,49.98 C150.00,150.00 349.04,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"></path>
			</svg>
		</div>
		<div class="container">
			<p>Síguenos en nuestras redes sociales</p>
			<a href="#"><img src="../img/facebook-icon.png" alt="Facebook"></a>
			<a href="#"><img src="../img/twitter-icon.png" alt="Twitter"></a>
			<a href="#"><img src="../img/instagram-icon.png" alt="Instagram"></a>
		</div>
	</footer>
	<script>

		if ("serviceWorker" in navigator) {
			navigator.serviceWorker.register("public/service-worker.js")
				.then((registration) => {
					console.log("Service Worker registrado con éxito:", registration.scope);
				})
				.catch((error) => {
					console.error("Error al registrar el Service Worker:", error);
				});
		}
	</script>

</body>

</html>