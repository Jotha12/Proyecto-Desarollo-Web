<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <title>MENU CATEDRATICO</title>
    <link rel="stylesheet" href="css/menucat.css">
</head>
<body>
	<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰</label>
		</div>
			<div class="logo">
				<h1>MENÚ</h1>
			</div>
			<nav class="menu">
				<a onclick="location='menucat.php'">Inicio</a>
				<a onclick="location='index.php'">Cerrar Sesión</a>
			</nav>
		</div>
	</header>
	<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav>
			<a onclick="location='cursoscat.php'">Cursos</a>
			<a onclick="location='tareascat.php'">Tareas</a>
			<a onclick="location='calificacionescat.php'">Calificaciones</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>
</body>
</html> 







