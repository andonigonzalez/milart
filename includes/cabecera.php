<?php
error_reporting(-1);
ini_set('display_errors', 'On');

session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="css/robotoBold/stylesheet.css">
	<link rel="stylesheet" href="css/robotoRegular/stylesheet.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body id="<?php echo $actual ?>">

<header>
	
	<a href="index.php"><h1 id="logo">milArt</h1></a>

	<img id="iconoCarrito" class="icono" src="img/cart.png" alt="icono del carrito de compra">

	<?php
		if(isset($_SESSION["nombre"])){
			echo "<a id='sesionIniciada'>" . $_SESSION["nombre"] . "</a>";
		}
		else{
			echo "<a id='iniciarSesion'>Iniciar Sesion</a>";
		}
	?>

	<nav>
		<ul>
			<li><a href="index.php"><img class="icono" src="img/home.png" alt="inicio">Inicio</a></li>
			<li><a href="galeria.php"><img class="icono" src="img/gallery.png" alt="galeria">Galería</a></li>
			<li><a href="contacto.php"><img class="icono" src="img/contact.png" alt="contacto">Contacto</a></li>
		</ul>
	</nav>
	
	<div id="fondoOscuro"></div>
	
	<div id="login" class="lightbox">
		<form id="inicioSesion">
				<h3>Inicia Sesion</h3>
				<label>Email: </label><input type="text" id="Lemail" required><br>
				<label>Contraseña: </label><input type="password" id="Lpass" required><br>
				<button class="btn" type="submit">Iniciar sesion</button>
		</form>
		
		<form id="registro">
				<h3>Registrate</h3>
				<label>Nombre: </label><input type="text" id="Ruser" required><br>
				<label>Apellidos: </label><input type="text" id="Rapellidos" required><br>
				<label>Email: </label><input type="email" id="Remail" required><br>
				<label>Contraseña: </label><input type="password" id="Rpass" required><br>
				<button class="btn" type="submit">Registrar</button>
		</form>
	</div>
	
	<div id="cuenta" class="lightbox">
		<h3><?php echo $_SESSION["nombre"]." ".$_SESSION["apellidos"] ?></h3>
		<p><strong>Email: </strong><?php echo $_SESSION["email"] ?></p>
		<button class="btn" id="cerrarSesion">Cerrar sesion</button>
	</div>
	
	<div id="carrito" class="lightbox">
		<h4>Tu compra</h4>
		<table></table>
		<button id="vaciarCarrito" class="btn">Vaciar</button>
		<button id="confirmar" class="btn">Confirmar</button>
	</div>
	
	<div class="cierre"></div>

</header>