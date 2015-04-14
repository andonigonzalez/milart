$(function(){
	
	$("#fondoOscuro").click(function(){
		$(".lightbox, #fondoOscuro").fadeOut();
	});
	
	/*CARRITO*/
	
	$("#iconoCarrito").click(function(){
		$("#fondoOscuro, #carrito").fadeIn();
	});
	
	$.ajax({
		url: "php/controlador.php",
		type: "GET",
		data: "carro=null",
		success: function(data){
			$("#carrito table").html(data);
		}
	});
	
	$(".comprar").click(function(){
		var datos = {
			"carro": null,
			"idProducto": $(this).attr("data-id"),
			"nombre": $(this).attr("data-nombre")
		}
		$.ajax({
			url: "php/controlador.php",
			type: "GET",
			data: datos,
			success: function(data){
				$("#carrito table").html(data);
				$("#fondoOscuro, #carrito").fadeIn();
			}
		});
	});

	$("#vaciarCarrito").click(function(){
		$.ajax({
			url: "php/controlador.php",
			type: "GET",
			data: "carro=null&vaciarCarrito=null",
			success: function(data){
				$("#carrito table").html(data);
			}
		});
	});
	
	
	
	
	/*LOGIN*/
	
	$("#iniciarSesion").click(function(){
		$("#fondoOscuro, #login").fadeIn();
	});
	$("#sesionIniciada").click(function(){
		$("#fondoOscuro, #cuenta").fadeIn();
	});
	
	$("#inicioSesion").submit(function(){
		var datos = {
			"sesion": null,
			"inicioSesion": null,
			"email": $("#Lemail").val(),
			"pass": $("#Lpass").val()
		}
		$.ajax({
			url: "php/controlador.php",
			type: "POST",
			data: datos,
			success: function(data){
				alert(data);
			}
		});
	});
	
	$("#registro").submit(function(){
		var datos = {
			"sesion": null,
			"registro": null,
			"nombre": $("#Ruser").val(),
			"apellidos": $("#Rapellidos").val(),
			"email": $("#Remail").val(),
			"pass": $("#Rpass").val()
		}
		$.ajax({
			url: "php/controlador.php",
			type: "POST",
			data: datos,
			success: function(data){
				alert(data);
			}
		});
	});
	
	$("#cerrarSesion").click(function(){
		var datos = {
			"sesion": null,
			"cerrarSesion": null
		}
		$.ajax({
			url: "php/controlador.php",
			type: "POST",
			data: datos,
			success: function(){
				window.location = "index.php";
			}
		});
	});
	
});


/*CARRITO*/

function quitarProducto(linea){
		var datos = {
			"carro": null,
			"quitar": linea
		}
		$.ajax({
			url: "php/controlador.php",
			type: "GET",
			data: datos,
			success: function(data){
				$("#carrito table").html(data);
			}
		});
	}