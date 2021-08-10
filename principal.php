<?php
//Iniciamos la sesión
session_start();
//Pedimos el archivo que controla la duración de las sesiones
require('recursos/sesiones.php');
require('recursos/conexion.php');
$Sql = "SELECT * FROM plato";
$Busq = $conexion->query($Sql);
while($arr = $Busq->fetch_array())
{
$fila[] = array('codpla'=>$arr['Codpla'], 'nombre'=>$arr['Nombre'], 'precio'=>$arr['Precio'], 'descripcion'=>$arr['Descripcion'], 'foto'=>$arr['Foto']);
}
$Sql2 = "SELECT Ci, Nombre, Apellidos, Telefono FROM cliente WHERE Estado = 1";
$Busq2 = $conexion->query($Sql2);
while($arr2 = $Busq2->fetch_array())
{
$fila2[] = array('ci'=>$arr2['Ci'], 'nombre'=>$arr2['Nombre'], 'apellidos'=>$arr2['Apellidos'], 'telf'=>$arr2['Telefono']);
}
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" href="css/materialize.css">
		<script src="js/jquery-3.0.0.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/maps.js"></script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBN0x9mkyg_9x41m82iSIQvJ8M9vo7fXm4&callback=initMap">
		</script>
		<title>Bienvenido, Pedidos P.L.</title>
		<style>
			#modal_ubi {
				height: 100%;
			}
			#modal_ubi_content{
				height: 78%;
			}

		#map {
		
		height: 100%;
		}
				
				.fuente{
					font-family: 'Segoe UI Light';
					color: black;
				}
				
				* {
					box-sizing: border-box;
				}
				body {
					margin: 0;
					background: #ffbb00;
					color: black;
					font-family: 'Segoe UI Light';
				}
				img {
					display: block;
					/*max-width: 100%;
					max-height: 100%;*/
				}
				.galeria {
					padding: 10px;
					display: flex;
					flex-wrap: wrap;
					justify-content: center;
				}
				.galeria__item {
					width: 80%;
					cursor: pointer;
					height: 13em;
				}
				#modal2{
					
					/*bottom: auto;*/
				}
				
				.titulo{
					font-size: 50px;
				}
				#cont_foto{
					height: 15em;
				}
				@media (max-width: 600px) {
					.titulo{
						font-size: 40px;
					}
					.galeria__item {
						width: 100%;
						margin: 20px;
						
					}
					#modal2{
						max-height: 100% !important;
					}

				}

				@media (min-width: 600px) {
					.galeria__item {
						width: 40%;
						margin: 20px;
						height: 10em;
					}
					
					#modal2{
						top: 0;
						max-height: auto;
					}

				}
				@media (min-width: 992px) {
					.galeria__item {
						width: 25%;
						height: 9em;
						margin: 30px;
						font-size: 20px;
					}

					#modal2{
						max-height: 100% !important;
						
					}
					#cont_foto{
						height: 8em;
					}
					body {
						font-size: 35px;
					}
						#total_ped{
						font-size: 35px;
					}
					.fz{
						font-size: 20px !important;
					}
				}
				@media (min-width: 1200px) {
					.galeria__item {
						width: 20% ;
					}
					#modal2{
						margin-top: -3%;
						max-height: 100%;
					}
					#cont_foto{
						height: 18em;
					}
					body {
						font-size: 17px;
					}
					#total_ped{
						font-size: 17px;
					}
					.fz{
						font-size: 17px !important;
					}
				}
				.galeria__img {
					width: 100%;
					height: 100%;
					border-radius: 10px;
					border: solid;
					border-color: #23A8C6;
				}
				#pedidos_cliente {
					color: white;
					font-size: 17px;
				}
				table {
					background: black;
					border-radius: 20px;
				}
				#total_ped {
					color: black;
				}
				.fuente_negra label{
					color: black;
				}
				.fondo_negro_pedidos{
					background-color: #333 !important;
				}
				#modal_pedidos{
					color: white;
					/*					max-height: 50% !important;*/
					/*height: 20em !important;*/
				}
				#foto_plato{
					border-radius: 20px;
				}
			
				input:focus { font-size: 30px !important;}

				.ver_ped{
					right: 0;
					top: 0;
					position: fixed; 
					z-index: 999;
				}
				p{
						margin: 0;
						font-weight: bolder;
				}

		</style>
	</head>
	<body>
			
					<div class="hide-on-med-and-up center row" id="top-menu" style="padding: 5px; background-color: #6c5ce7;" onclick="direrc();">
							<div class="col s4 offset-s4"><p>MI PEDIDO</p><i class="material-icons">assignment</i></div>
					</div>
			
			<span class="titulo">Realiza tu pedido</span>

			<div class="ver_ped hide-on-small-only"><a href="rev_pedido.php" style="background-color: #6c5ce7;" class="btn-large waves-light">mi pedido<i class="material-icons right">assignment</i></a></div>

		<div class="row fuente_negra">
			<div class="row fuente_negra">
				<div class="col s12 m12 l6">
					<form action="#" method="POST" id="form_pedido" accept-charset="utf-8">
						<div class="row">
							<div class="input-field col m7 s9 l9">
								<i class="material-icons prefix">account_circle</i>
								<input type="number" onKeyPress="return checkIt(event)" name="ci_cliente" class="validate fz" id="ci_c"  autocomplete="off" maxlength="20" required>
								<label for="ci_c" class="fz"># Cédula</label>
							</div>
							<div class="col l2 s3 m2 fz"><a onclick="buscar_ci();" class="waves-effect waves-light btn btn-large"><i class="material-icons">
								search
							</i></a></div>
							<div class="col m3 l4 offset-l1 s4 offset-s1">
								<!-- <a class="waves-effect waves-light btn btn-large modal-trigger" id="mod_ubi" href="#modal_ubi">Dirección</a> -->
								<input type="text" id="coordLat" name="coordLat" hidden>
								<input type="text" id="coordLng" name="coordLng" hidden>
							</div>
						</div>
						<div class="row">
							<div class="input-field col m12 l4 s12 fz">
								<input type="text" name="nombre_c" class="validate" id="nombre_c"  value="" autocomplete="off" maxlength="20" required>
								<label for="nombre_c" class="fz">Nombres</label>
							</div>
							<div class="input-field col m12 l4 s12  fz">
								<input type="text" name="ap_c" class="validate" id="ap_c" value="" autocomplete="off" maxlength="20" required>
								<label class="fz" for="ap_c" >Apellidos</label>
							</div>
							<div class="input-field col m12 l4 s12  fz">
								<input type="text" id="tot_ped" name="tot_ped" value="" hidden>
								<input type="text" onKeyPress="return checkIt(event)" name="telf" class="validate" id="telf" value="" min="1" autocomplete="off" maxlength="15" required>
								<label class="fz" for="telf" >Teléfono</label>
							</div>
						</div>
					</form>
				</div>
				<div class="col l6 m10 offset-m1 s12">
					<table border="1" id="pedidos_cliente">
						<tr>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Borrar</th>
						</tr>
					</table>
					<hr>
					<div class="row" align="right">
						<div class="col m4 offset-m6 s3 offset-s7">
							Total: <label id="total_ped">0.00 Bs</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: -40px;">
				<div class="col s4 offset-s5 m2 offset-m5">
					
					<a class="waves-effect waves-purple red btn btn-large modal-trigger" id="mod_ubi" href="#modal_ubi">PEDIR!</a>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: -40px;">
			<div>
				<ul class="galeria">
					<?php foreach($fila as $a  => $valor){ ?>
					<li class="galeria__item" >
						<a onclick="cantidad_plato('<?php echo $valor['codpla'] ?>','<?php echo $valor['nombre'] ?>','<?php echo $valor['precio'] ?>','<?php echo $valor['foto'] ?>')"><img src="<?php echo $valor['foto'] ?>" class="galeria__img"></a>
						<div class="center"><b><?php echo $valor['nombre'] ?> - <?php echo $valor['precio'] ?> Bs.</b></div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<!-- Modal pedidos -->
		<div class="row">
			<div id="modal2" class="modal col s12 m12 l6 offset-l3 fondo_negro_pedidos scr">
				<div id="modal_pedidos" class="modal-content row">
					<div class="col s12" id="cont_foto">
						<img id="foto_plato" width="100%" height="100%"  src="" >
					</div>
					<div class="col s9">
						<h5 id="nombre_p"> </h5>
						<h5 id="precio_p"> </h5>
					</div>
					<div class="col s3">
						<div class="input-field">
							<input id="__cantidad" type="number" value="1" min="1" max="10" required>
							<label for="__cantidad">Cantidad</label>
						</div>
					</div>
				</div>
				<div id="__datosplato" hidden></div>
				<hr>
				<div class="modal-footer row fondo_negro_pedidos">
					<a href="#!" class="left modal-action modal-close waves-effect waves-light btn btn-large red"><i class="material-icons">close</i></a>
					<a class="waves-effect waves-light btn btn-large right" onclick="datos_plato();" >Agregar<i class="material-icons right">add_shopping_cart</i></a>
				</div>
			</div>
		</div>
		<!-- Google Maps -->
		<div class="row">
			<div id="modal_ubi" class="modal col s12 m12 l8 offset-l2">
				<h4>Marca tu dirección</h4>
				<div class="modal-content" id="modal_ubi_content">
					<div id="map"></div>
				</div>
				<div class="modal-footer">
					<a href="#!" class="modal-close waves-effect waves-green btn red left">Cancelar</a>
					<button type="submit" form="form_pedido" class="btn waves-effect waves-purple">Aceptar</button>
				</div>
			</div>
		</div>
		<div id="mensaje"></div>
	</body>
	<script>
	var total = 0;
	$(document).ready(function() {
		$("#mod_ubi").leanModal();
	});
	function direrc(){
		window.location.replace("rev_pedido.php");
	}
		function checkIt(evt) {
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				status = "Este campo acepta números solamente.";
				return false;
			}
			status = "";
			return true;
		}
		var reg_pedidos = new Array();
		function cantidad_plato(cod, nombre, precio, foto) {
			$("#foto_plato").attr("src", foto);
			$("#nombre_p").html(nombre);
			$("#precio_p").html(precio+" Bs.");
			$("#modal2").openModal();
			$("#__datosplato").html("<input id='__datosp' cp='"+cod+"' np='"+nombre+"' pp='"+precio+"' fp='"+foto+"' hidden/>");
		}
		function borr_pla(x) {
			delete reg_pedidos[x];
					//borrando tabla
				$('#pedidos_cliente tr:not(:first-child)').slice(0).remove();
				var table = $("#pedidos_cliente")[0];
				total =  0;
				//llenando tabla
				reg_pedidos.forEach(function (valor) {
					var row = table.insertRow(1);
					row.insertCell(0).innerHTML = "<a href='#' onclick='borr_pla("+valor[0]+")'><i class='material-icons prefix'>delete</i></a>";
					row.insertCell(0).innerHTML = valor[3];
					row.insertCell(0).innerHTML = valor[2];
					row.insertCell(0).innerHTML = valor[1];
					total  = parseInt(total) + parseInt(valor[3]);
				});
				$("#total_ped").html(total +" Bs.");
		}
		
		function datos_plato(){
			var cp = $("#__datosp").attr("cp");
			var np = $("#__datosp").attr("np");
			var pp = $("#__datosp").attr("pp");
			var fp = $("#__datosp").attr("fp");
			var cantp = $("#__cantidad").val();
			if (parseInt(cantp) > 10 || cantp == "") {Materialize.toast("El pedido no puede superar las 10 unidades", 3000)}
				else{
			if (parseInt(cantp) < 1 || cantp == "") { Materialize.toast("Ingresa una cantidad válida.", 3000); }
			else{
				pp = parseInt(pp)*parseInt(cantp);
				
				reg_pedidos[cp] = [cp, np, cantp, pp, fp];
				//borrando tabla
				$('#pedidos_cliente tr:not(:first-child)').slice(0).remove();
				var table = $("#pedidos_cliente")[0];
				total =  0;
				//llenando tabla
				reg_pedidos.forEach(function (valor) {
					var row = table.insertRow(1);
					row.insertCell(0).innerHTML = "<a href='#' onclick='borr_pla("+valor[0]+")'><i class='material-icons prefix'>delete</i></a>";
					row.insertCell(0).innerHTML = valor[3];
					row.insertCell(0).innerHTML = valor[2];
					row.insertCell(0).innerHTML = valor[1];
					total  = parseInt(total) + parseInt(valor[3]);
				});
				$("#total_ped").html(total +" Bs.");
				$("#modal2").closeModal();
			}}
		}
		var mensaje = $("#mensaje");
		mensaje.hide();
		// $("#acceso").on("submit", function(e){
		// 	e.preventDefault();
		// 	var formData = new FormData(document.getElementById("acceso"));
		// 	$.ajax({
		// 		url: "recursos/acceder.php",
		// 		type: "POST",
		// 		dataType: "HTML",
		// 		data: formData,
		// 		cache: false,
		// 		contentType: false,
		// 		processData: false
		// 	}).done(function(echo){
		// 		if (echo !== "") {
		// 			mensaje.html(echo);
		// 			mensaje.show();
		// 		} else {
		// 			window.location.replace("index.php");
		// 		}
		// 	});
		// });
		function buscar_ci() {
			valor = $("#ci_c").val();
			encontrado = false;
	"<?php foreach($fila2 as $a  => $valor){ ?>";
	if (valor == ("<?php echo $valor['ci'] ?>")) {
	$("#nombre_c").val("<?php echo $valor['nombre'] ?>");
	$("#ap_c").val("<?php echo $valor['apellidos'] ?>");
	$("#telf").val("<?php echo $valor['telf'] ?>");
	Materialize.updateTextFields();
	encontrado = true;
	}
	"<?php } ?>";
	if (!encontrado) {
	Materialize.toast("<b class='fz'>Cliente no encontrado, ingrese sus datos.</b>", 4000);
	}
	}
	//ENVIO CON AJAX --
	// function enviar() {
	$("#form_pedido").on("submit", function(e){
	e.preventDefault();
	$("#tot_ped").val(total);
	cic=$("#ci_c").val();
	nombrec=$("#nombre_c").val();
	apc=$("#ap_c").val();
	totped=$("#tot_ped").val();
	telf=$("#telf").val();
	colat=$("#coordLat").val();
	colng=$("#coordLng").val();
	var x="";
	var y="";
	cont = 0;
	if(reg_pedidos.length > 0){
	reg_pedidos.forEach(function (valor) {
	x=x+"&"+cont+"="+valor[0];
	y=y+"&"+cont+"c="+valor[2];
	cont++;
	});
	misdatos="coordLat="+colat+"&coordLng="+colng+"&ci_cliente="+cic+"&nombre_c="+nombrec+"&ap_c="+apc+"&telf="+telf+"&tot_ped="+totped+x+y+"&cont="+cont;
	objetoAjax=creaObjetoAjax();
	objetoAjax.open("POST","recursos/nuevo_pedido.php",true);
	objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	objetoAjax.onreadystatechange=recogeDatos;
	objetoAjax.send(misdatos);
	}else{
	Materialize.toast("No se ha seleccionado ningún producto...", 4000);
	}
	});
	function creaObjetoAjax () {
	var obj;
	if (window.XMLHttpRequest) {
	obj=new XMLHttpRequest();
	}
	else {
	obj=new ActiveXObject(Microsoft.XMLHTTP);
	}
	return obj;
	}
	function recogeDatos() {
	if (objetoAjax.readyState==4 && objetoAjax.status==200) {
	miTexto=objetoAjax.responseText;
	if(miTexto.includes('realizado')){
	Materialize.toast("Pedido Realizado!" , 4000);
	$("#modal_ubi").closeModal();
	}else{
	mensaje.html(miTexto);
	// if(!miTexto.includes('error')){
	//   //$("#cuerpo").load("index.php");
	//   Materialize.toast("Error desconocido." , 4000);
	// }
	}
	}
	}
	</script>
</html>