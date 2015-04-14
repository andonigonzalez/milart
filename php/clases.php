<?php
error_reporting(-1);
ini_set('display_errors', 'On');

class Conexion{

	private $conexion;

	function __construct(){

		$host = "localhost";
		$user = "root";
		$pass = "";
		$bd = "milart";

		$conect = new mysqli($host, $user, $pass, $bd);

		if($conect->connect_error){
			die("Error al conectar con la BD");
		}
		else{
			$this->conexion = $conect;
			$this->conexion->query("set names 'utf8'");
		}

	}

	public function getConexion(){
		return $this->conexion;
	}

}

class Productos{

	private $sql;

	function __construct(){

		$obj = new Conexion();
		$this->sql = $obj->getConexion();

	}

	public function getProductos(){

		$consulta = $this->sql->query("select * from productos");

		if($consulta->num_rows > 0){
			return $consulta;
		}
		else{
			return false;
		}
		
		$this->sql->close();

	}
	
	public function getUnProducto($id){
		
		$consulta = $this->sql->query("select * from productos where id = '$id'");
		
		if($consulta->num_rows == 1){
			return $consulta;
		}
		else{
			return false;	
		}
		
		$this->sql->close();
		
	}

}

class Carrito{

	private $id;
	private $nombre;
	public $cantProductos;
	private $sql;

	function __construct(){
		$obj = new Conexion();
		$this->sql = $obj->getConexion();
		$this->cantProductos = 0;
	}

	public function addItem($idProducto, $nombreProducto){

		$this->id[$this->cantProductos] = $idProducto;

		$this->nombre[$this->cantProductos] = $nombreProducto;

		$this->cantProductos++;

	}

	public function borrarItem($lineaProducto){
		$this->id[$lineaProducto] = 0;
	}

	public function vaciarCarrito(){
		
		unset($this->id);
		unset($this->nombre);
		$this->cantProductos = 0;

	}

	public function mostrarCarrito(){

		for($i = 0; $i < $this->cantProductos; $i++){

			if($this->id[$i] != 0){
				echo "<tr>
							<td>".$this->id[$i]."</td>
							<td>".$this->nombre[$i]."</td>
							<td><a class='btn' onClick='quitarProducto($i)'>X</a></td>
						</tr>";
			}

		}

	}

}

class Usuario{
	
	private $nombre;
	private $pass;
	private $email;
	private $sql;
	
	function __construct(){
		$obj = new Conexion();
		$this->sql = $obj->getConexion();
	}
	
	public function registro($Pnombre, $Papellidos, $Pemail, $Ppassword){
		
		$Pnombre = $this->sql->real_escape_string($Pnombre);
		$Papellidos = $this->sql->real_escape_string($Papellidos);
		$Pemail = $this->sql->real_escape_string($Pemail);
		$Ppassword = $this->sql->real_escape_string($Ppassword);
		
		$consulta = $this->sql->query("select * from usuarios where email = '$Pemail'");
		
		if($consulta->num_rows == 0){
			
			$pass = password_hash($Ppassword, PASSWORD_BCRYPT, ["cost" => 12]);
			
			$consulta = $this->sql->query("insert into usuarios (nombre, apellidos, email, password) values ('$Pnombre', '$Papellidos', '$Pemail', '$pass')");
		
			if($this->sql->affected_rows > 0){
				$consulta = $this->sql->query("select * from usuarios order by idusuario desc limit 1");
				return $consulta;
			}
			else{
				$datos = "error";
				return $datos;
			}
			
		}
		else{
			$datos = "existe";
			return $datos;
		}		
		
	}
	
	public function iniciarSesion($Pemail, $Ppassword){
		
		$Pemail = $this->sql->real_escape_string($Pemail);
		$Ppassword = $this->sql->real_escape_string($Ppassword);
		
		$consulta = $this->sql->query("select * from usuarios where email = '$Pemail'");
		
		if($consulta->num_rows == 1){
			
			$datos = $consulta->fetch_object();
			$comprobar = password_verify($Ppassword, $datos->password);
			
			if($comprobar){
				$consulta = $this->sql->query("select * from usuarios where email = '$Pemail'");
				return $consulta;
			}
			
		}
		else{
			return false;
		}
		
	}
	
}

?>