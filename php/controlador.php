<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require("clases.php");

session_start();

if(isset($_GET["carro"])){
	
	if(!isset($_SESSION["carrito"])){
		$_SESSION["carrito"] = new Carrito();
	}

	if(isset($_GET["idProducto"])){
		$_SESSION["carrito"]->addItem($_GET["idProducto"], $_GET["nombre"]);
	}
	else if(isset($_GET["quitar"])){
		$_SESSION["carrito"]->borrarItem($_GET["quitar"]);
	}
	else if(isset($_GET["vaciarCarrito"])){
		$_SESSION["carrito"]->vaciarCarrito();
	}
	
	if($_SESSION["carrito"]->cantProductos != 0){
		$_SESSION["carrito"]->mostrarCarrito();
	}
	else{
		echo "El carrito esta vacio";
	}
	
}

if(isset($_POST["sesion"])){
	
	if(isset($_POST["registro"])){

		$obj = new Usuario();
		$datos = $obj->registro($_POST["nombre"], $_POST["apellidos"], $_POST["email"], $_POST["pass"]);
		
		if($datos == "existe"){
			echo "Esa direccion de correo ya esta en uso, por favor escoja otra.";
		}
		else if($datos == "error"){
			echo "Error en el registro, pruebe otra vez.";
		}
		else{
			while($userData = $datos->fetch_object()){
				$_SESSION["idUsuario"] = $userData->idusuario;
				$_SESSION["nombre"] = $userData->nombre;
				$_SESSION["apellidos"] = $userData->apellidos;
				$_SESSION["email"] = $userData->email;
			}
			if(isset($_SESSION["nombre"])){
				echo "Registro completado con exito. Bienvenido/a " . $_SESSION["nombre"];
			}
		}

	}
	
	else if(isset($_POST["inicioSesion"])){
		
		$obj = new Usuario();
		$datos = $obj->iniciarSesion($_POST["email"], $_POST["pass"]);
		
		if($datos != false){
			while($userData = $datos->fetch_object()){
				$_SESSION["idUsuario"] = $userData->idusuario;
				$_SESSION["nombre"] = $userData->nombre;
				$_SESSION["apellidos"] = $userData->apellidos;
				$_SESSION["email"] = $userData->email;
			}
			if(isset($_SESSION["nombre"])){
				echo "Hola " . $_SESSION["nombre"];
			}
			else{
				echo "hola hola hola";
			}
		}
		else{
			echo "Email o contraseña incorrectos";
		}
		
	}

	else if(isset($_POST["cerrarSesion"])){
		session_destroy();
	}
	
}

?>