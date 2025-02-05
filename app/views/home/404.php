<!DOCTYPE html>
<html lang="es">

<head>
	<?= $head ?>
	<link rel="shortcut icon" href="img/favicon404.png" type="image/x-icon">
	<title><?= $title ?></title>
</head>

<body>
	<div class="content">
		<div class="design-container">
			<p class="error_text_content"><span class="error_text_content-span">Error 404</span>, no se encontro el
				sitio.</p>
			<img class="error_content" src="img/404.png" alt="No se encontro el sitio">
		</div>
	</div>
	<style>
		.error_content {
			width: 500px;
		}

		.content {
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
			width: 900;
			margin-top: 5vh;
		}

		.error_text_content {
			font-weight: 500;
			font-size: 20px;
			cursor: pointer;
		}

		.error_text_content-span {
			transition: 0.3s
		}

		.error_text_content-span:hover {
			color: darkred;
			text-shadow: 0px 0px 11px red;
		}
	</style>
</body>

</html>