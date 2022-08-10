<?php
//Iniciamos la sesión
session_start();
//Pedimos el archivo que controla la duración de las sesiones
require('recursos/sesiones.php');
require('recursos/conexion.php');
$Sql = "SELECT a.*, b.Stock FROM plato a, stock b WHERE a.Codpla = b.Codpla AND a.beb = 0 AND a.Estado = 1";
$Busq = $conexion->query($Sql);
while($arr = $Busq->fetch_array())
{
$fila[] = array('codpla'=>$arr['Codpla'], 'nombre'=>$arr['Nombre'], 'precio'=>$arr['Precio'], 'descripcion'=>$arr['Descripcion'], 'foto'=>$arr['Foto'], 'stock'=>$arr['Stock']);
}
$Sql2 = "SELECT Ci, Nombre, Apellidos, Telefono FROM cliente WHERE Estado = 1";
$Busq2 = $conexion->query($Sql2);
while($arr2 = $Busq2->fetch_array())
{
$fila2[] = array('ci'=>$arr2['Ci'], 'nombre'=>$arr2['Nombre'], 'apellidos'=>$arr2['Apellidos'], 'telf'=>$arr2['Telefono']);
}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="icon" type="image/x-icon" href="img/icono.ico" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
    	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" >
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    	<link rel="stylesheet" href="css/jquery.nice-number.css">
		<!-- <link rel="stylesheet" href="css/materialize.css"> -->
		<script src="js/jquery-3.0.0.min.js"></script>
		<!-- <script src="js/materialize.js"></script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script src="js/maps.js"></script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBN0x9mkyg_9x41m82iSIQvJ8M9vo7fXm4&callback=initMap">
		</script>
		<script src="js/jquery.nice-number.js"></script>
		<!-- <script src="js/firebase.js" ></script> -->
		
		<title>Bienvenido, Pedidos Delicias Express</title>
	</head>
	<body>
		<nav style="background: rgba(255, 255, 255, 0.5);">
			<div class="nav-wrapper">
		      <a href="#" class="brand-logo center"><img src="img/sidelex_sf.png" height="40" style="margin-top: 5px;" alt="Delicias Express"></a>
		    </div>
		</nav>
		<div id="toggle_sidebar" class="get_out">
			<a href="#" data-target="slide-out" class="sidenav-trigger btn-large waves-effect waves-light"><i class="material-icons">menu</i></a>
		</div>

			

		<!-- <div class="hide-on-med-and-up center row" id="top-menu" style="padding: 5px; background-color: #6c5ce7; cursor: pointer" onclick="direrc();">
				<div class="col s4 offset-s4"><p>MIS PEDIDOS</p><i class="material-icons">assignment</i></div>
		</div> -->
			
		

		<!-- <div class="get_out hide-on-small-only"><a href="recursos/app/salir.php" style="background-color: #e74c3c;" class="btn-large waves-light">Salir<i class="material-icons right">logout</i></a></div> -->
		<!-- <div class="ver_ped hide-on-small-only"><a href="templates/app/rev_pedido.php" style="background-color: #6c5ce7;" class="btn-large waves-light">mi pedido<i class="material-icons right">assignment</i></a></div> -->


		<ul id="slide-out" class="sidenav">
			<li><div class="user-view">
			<div class="background">
				<img src="img/fondo3.jpg" width="100%">
			</div>
			<a href="#user"><img class="circle" src="images/1117.jpg"></a>
			<a href="#name"><span class="white-text name"><?php $_SESSION['nombre']?></span></a>
			<a href="#email"><span class="white-text email"><?php $_SESSION['correo'] ?></span></a>
			</div></li>
			<li><a href="#!" onclick="location.reload()" class="waves-effect waves-purple"><i class="material-icons">home</i>Inicio</a></li>
			<li><a href="#!" onclick="sidenav_navi('templates/app/perfil.php')" class="waves-effect waves-purple"><i class="material-icons">face</i>Mi perfil</a></li>
			<li><a href="#!" onclick="sidenav_navi('templates/app/rev_pedido.php')" class="waves-effect waves-purple"><i class="material-icons">assignment</i>Mi pedido</a></li>

			<li><div class="divider"></div></li>

			<li><a class="waves-effect waves-red" href="recursos/app/salir.php"><i class="material-icons">logout</i>Salir</a></li>
		</ul>

		<div id="cuerpo" class="container">
		<h3 id="titulo_pedidos" class="center roboto">Realiza tu pedido</h3>
	

		<div class="row" id="cards_row">
			
			<div class="col s12 m12 l12 xl12">
				<h5>Productos disponibles:</h5>
				<?php foreach($fila as $a  => $valor){ ?>
					<!-- antes era s12 m6 l6 xl6 -->
				<div class="col s12 m6 l6 xl4 rubik" onclick="cantidad_plato('<?php echo $valor['codpla'] ?>','<?php echo $valor['nombre'] ?>','<?php echo $valor['precio'] ?>','<?php echo $valor['foto'] ?>', '<?php echo $valor['stock'] ?>')">
					<div class="z-depth-3 card horizontal card__pad">
					  <div class="card-stacked">
					    <div class="">
					    	<p><?php echo $valor['nombre']; ?></p>
					      	<small><?php echo $valor['descripcion'] ?></small>
					      	<p style="position: absolute; bottom: 0px;"><?php echo 'Bs. '.$valor['precio']; ?></p>
					    </div>
					  </div>
					  <div class="card__img">    
					    	<img class=" img__card" src="<?php echo $valor['foto'] ?>">
					  </div>
					</div>
				</div>
				<?php } ?>
			</div>



		</div>

		<div class="row roboto" id="cart_row" hidden>
			<div class="row get_out">
				<div class="left">
					<a href="#!" class="btn-large red" onclick="regresar_prod()"><i class="material-icons">keyboard_return</i></a>
				</div>
			</div>
			<!-- antes era col s12 m12 l4 xl5 -->
			<div class="col s12 m12 l12" id="div_tabla_pedidos">
				<!-- <div class="col l6 m10 offset-m1 s12"> -->
					<div class="center"><h4>Tu pedido</h4></div>
					<table id="pedidos_cliente" class="content-table centered z-depth-4">
						<thead>
							<tr>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Precio</th>
								<th>Borrar</th>
							</tr>
						</thead>
						<tbody>
							<td colspan="4">Aún no has agregado ningún producto.</td>
						</tbody>
					</table>

					<hr>
					<div class="row" align="right">
						<!-- <div class="col m6 offset-m6 s4 offset-s6"> -->
							<div class="neon" >Subtotal: <label id="total_ped" class="neon">0.00 Bs</label></div>
						<!-- </div> -->
					</div>
				<!-- </div> -->
			</div>

			<div class="center">
				<a class="waves-effect waves-light btn btn-large modal-trigger" id="mod_ubi" href="#modal_ubi">PEDIR!</a>
			</div>
		</div>
		<div id="modal2" class="modal ">
			<div id="modal_pedidos" class="modal-content row">
				<div class="col s12" id="cont_foto">
					<img id="foto_plato" src="" >
				</div>
				<div class="col s8 black-text">
					<input type="text" id="current_sell" hidden>
					<input type="text" id="current_stock" hidden>
					<h5 id="nombre_p"> </h5>
					<h5 id="precio_p"> </h5>
				</div>
				<div class="col s4">
					<div class="number-container">
						<label for="">Cantidad</label>
						<input class="browser-default" type="number" name="" id="__cantidad" min="1" max="15" disabled>
					</div>
				</div>
			</div>
			<div id="__datosplato" hidden></div>
			<hr>
			<div class="modal-footer row ">
				<a href="#!" class="left modal-action modal-close waves-effect waves-light btn btn-large red"><i class="material-icons">close</i></a>
				<a class="waves-effect waves-light btn btn-large right" onclick="datos_plato();" >Agregar<i class="material-icons right">add_shopping_cart</i></a>
			</div>
		</div>

		<form id="form_pedido" hidden> <!-- onKeyPress="return checkIt(event)" SOLO NÚMEROS -->
			<input type="text" id="coordLat" name="coordLat" >
			<input type="text" id="coordLng" name="coordLng" >
			<input type="text" id="tot_ped" name="tot_ped" value="" >
		</form>

		<div id="modal_ubi" class="modal"> <!-- arreglar esta wea -->
			<div class="modal-content" id="modal_ubi_content">
				<h4>Dirección</h4>
				
				<div class="row">
					<div class="col s12">
					  
					  <div class="input-field">
					    <input id="direccion" type="text" class="validate">
					    <label for="direccion">Escribe aquí tu dirección</label>
					    <!-- <span class="helper-text" data-error="wrong" data-success="right">Helper text</span> -->
					  </div>
					</div>
				</div>

				<!-- <div class="container"> -->
					<!-- <input type="text" id="direccion" placeholder="Escribe tu dirección"> -->
				<!-- </div> -->
				<div id="map"></div>

			</div>
			<div class="modal-footer" id="footer_ubi">
				<a href="#!" class="modal-close waves-effect waves-green btn red left">Cancelar</a>
				<button type="submit" form="form_pedido" class="btn waves-effect waves-purple">Aceptar</button>
			</div>
		</div>
	<!-- </div> -->

		

	<!-- PULSE BUTTON SHOP -->
		<div class="fixed-action-btn" id="shop_section">
		  <a id="shop_button" class="btn-floating btn-large red" onclick="shop_modal()">
		    <i class="large material-icons">shopping_cart</i>
		  </a>
		</div>
     
	<!-- MODAL SHOP CART -->
	  <div id="modal3" class="modal">
	    <div class="modal-content">
	      <h4>Modal Header</h4>
	      <p>A bunch of text</p>
	    </div>
	    <div class="modal-footer">
	      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
	    </div>
	  </div>

	</div>
	
	<div id="mensaje"></div>

	</body>
</html>

	<script>
	
	</script>


<!-- <script type="module" src="https://www.gstatic.com/firebasejs/9.0.1/firebase-auth.js"></script> -->
