<?php
error_reporting(-1);
ini_set('display_errors', 'On');

include_once("clases.php");

session_start();

if(isset($_GET["carro"])){

	if(isset($_GET["idProducto"])){
		$_SESSION["carrito"][$_SESSION["contador"]] = $_GET["idProducto"];
		$_SESSION["contador"]++;
	}
	else if(isset($_GET["quitar"])){
		$quitar = $_GET["quitar"];
	}
	else if(isset($_GET["vaciarCarrito"])){
		if(isset($_SESSION["carrito"])){
			session_unset($_SESSION["carrito"]);
			$_SESSION["contador"] = 0;
		}
	}
	
	if(isset($_SESSION["carrito"])){
		$obj = new Productos();
	
		for($i = 0; $i < $_SESSION["contador"]; $i++){
			
			$datos = $obj->getUnProducto($_SESSION["carrito"][$i]);
			$productos = $datos->fetch_object();
			
			echo "<tr>
					<td>$productos->id</td>
					<td>$productos->nombre</td>
					<td><button class='btn' data-producto='$i' onclick='quitarProducto()'>Eliminar</button></td>
				</tr>";
		}
	}
	else{
		echo "No hay productos en el carrito de compra ";
	}
	
}


?>