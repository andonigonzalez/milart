<?php
error_reporting(-1);
ini_set('display_errors', 'On');

$actual = "inicio";
$title = "milArt | Galería de arte | Granada";
?>
<?php include("includes/cabecera.php") ?>
<?php require_once("php/clases.php") ?>

<section>
	
	<div id="imgInicio"></div>

	<div id="contenedor">

	<?php
	
		$obj = new Productos();
		$datos = $obj->getProductos();

		while($productos = $datos->fetch_object()){
		?>
			<article>
				<img src="img/<?php echo $productos->img ?>" alt="<?php echo $productos->nombre ?>">
				<h2><?php echo $productos->nombre ?></h2>
				<button class="btn">Ver más</button>
				<button class="btn comprar" data-id="<?php echo $productos->idproducto ?>" data-nombre="<?php echo $productos->nombre ?>">Comprar</button>
			</article>
		<?php
		}
	?>

	</div>

</section>

<?php include("includes/pie.php") ?>