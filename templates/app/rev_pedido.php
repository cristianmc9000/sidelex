<?php
require('../../recursos/conexion.php');
$Sql = "SELECT a.Codped, b.Nombre as nompla, a.Cant, b.Precio, c.idcli, d.Nombre, d.Apellidos FROM det_ped a, plato b, pedido c, cliente d WHERE a.Estado = 1 AND a.Codpla = b.Codpla AND a.Codped = c.Codped AND c.idcli = d.id";
$Busq = $conexion->query($Sql);
while($arr = $Busq->fetch_array())
{
$fila[] = array('cod'=>$arr['Codped'], 'nombre'=>$arr['nompla'], 'cant'=>$arr['Cant'], 'precio'=>$arr['Precio'], 'idcli'=>$arr['idcli'], 'nombrecli'=>$arr['Nombre'], 'apcli'=>$arr['Apellidos']);
}
?>



<style>
	body{
		font-family: 'Segoe UI Light';
		background-color: #74b9ff;
	}
	.textrev{
		color: #eeee00;
	}
	
</style>

<!-- <div class="col s12"> -->
	<!-- <a href="../../pedidos.php" class="btn-large orange"><i class="material-icons">keyboard_return</i></a> -->
<!-- </div> -->
<div class="center"><h4>Estado de tu pedido</h4></div>
<!-- <div class="row">
	<form id="rev_pedido" class="col s12 m12 l4 offset-l4">
		<div class="row">
			<div class="input-field col s9">
				<input id="ci" name="ci" type="text">
				<label for="ci">Tu cédula de identidad</label>
			</div>
			<div class="col s2 offset-s1"><button id="envio_form" class="btn-large waves-effect waves-light right" type="submit" name="acceso"><i class="material-icons">search</i></button></div>
		</div>
	</form>
	<div class="row">
		<div class="col s3 offset-s5" id="boton-cancelar">
			<a class="btn-large red">CANCELAR MI PEDIDO</a>
		</div>
	</div>
</div> -->
<div class="row" >
	<div class="col s12 m12 l8 offset-l2">
		<h5><span id="actped"></span><br>
		<span id="fecha_ped"></span><br>
		<span id="totped"></span>
		</h5>
	</div>
	<div class="col s12 m12 l8 offset-l2">
		<table id="pedidos_cliente">
			<thead>
				<tr>
					<th>PRODUCTO</th>
					<th>CANTIDAD</th>
					<th>PRECIO</th>
				</tr>
			</thead>
			<tbody>
				<tr>

				</tr>
			</tbody>
		</table>
	</div>
</div>
<!-- Modal cancelar_pedido -->
<div class="row">
	<div id="modal_cancelar_pedido" class="modal modal_ancho">
		<div id="cont_cancelar_pedido" class="modal-content">
			<p><h4>Se cancelará su pedido.</h4></p>
			<p><b>Cliente: <span id="nombre_cancelar"></span></b></p>
			<form id="form_codped">
				<input type="text" value="" name="cod_pedido" id="codigo_ped_text" hidden>
			</form>
		</div>
		<div class="modal-footer row">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-large green left">Cerrar</a>
			<a href="#!" class="waves-effect waves-red btn-large red right" onclick="confirmar_cancel()">Confirmar</a>
		</div>
	</div>
</div>


<script>
	var mensaje = $("#mensaje");
	mensaje.hide();

	$(document).ready(function() {
	    $.ajax({
            url: "recursos/app/ver_pedido.php",
            // method: "GET",
            success: function(echo) {
            	// mensaje.html(echo)
                console.log(echo)
				var arr = echo.split(",");
			
				if (echo == "sinpedidos") {
					$('#actped').css('color', 'red');
					$('#actped').html("No tienes pedidos activos");
					$('#totped').html("");
					$('#fecha_ped').html("");
					$("#boton-cancelar").html("");
				}

				if (arr[3] == "PENDIENTE") {
					$('#actped').css('color', 'yellow');
					$('#actped').html('Tienes 1 pedido pendiente, tu pedido aun no ha sido aceptado.');
					$('#totped').html('Total: '+arr[0]+'Bs.');
					$('#fecha_ped').html('Fecha: '+arr[1]);
					$("#boton-cancelar").html("<a class='btn-large red' onclick='cancelar_pedido("+arr[2]+")'>CANCELAR MI PEDIDO</a>");
					tabla_llenar(arr[2]);
				}
				if (arr[3] == "ACEPTADO"){
					$('#actped').css('color', '#00ff00');
					$('#actped').html('Tu pedido ha sido aceptado, y enviado.');
					$('#totped').html('Total: '+arr[0]+'Bs.');
					$('#fecha_ped').html('Fecha: '+arr[1]);
					$("#boton-cancelar").html("");
					tabla_llenar(arr[2]);
				}
            },
            error: function(error) {
                console.log(error)
            }
	    })
	});

		

	function tabla_llenar (cod){
		$('#pedidos_cliente tr:not(:first-child)').slice(0).remove();
		var table = $("#pedidos_cliente")[0];
		"<?php foreach($fila as $a  => $valor){ ?>";
		if(cod == "<?php echo $valor['cod'] ?>"){
		var row = table.insertRow(1);
		row.insertCell(0).innerHTML = "<?php echo $valor['precio'] ?>";
		row.insertCell(0).innerHTML = "<?php echo $valor['cant'] ?>";
		row.insertCell(0).innerHTML = "<?php echo $valor['nombre'] ?>";
		}
		"<?php } ?>";
	}

	function cancelar_pedido(cod) {
		let nomcli
		let apcli
	"<?php foreach($fila as $a  => $valor){ ?>"
	if(cod == "<?php echo $valor['cod'] ?>"){
		nomcli = "<?php echo $valor['nombrecli'] ?>"
		apcli = "<?php echo $valor['apcli'] ?>"
		$("#codigo_ped_text").val(cod)
	}
	"<?php } ?>"

	$("#nombre_cancelar").html(nomcli+" "+apcli);
	$("#modal_cancelar_pedido").openModal();

	}

	function confirmar_cancel() {
			var formData = new FormData(document.getElementById("form_codped"));
			$.ajax({
				url: "recursos/cancel_ped.php",
				type: "POST",
				dataType: "HTML",
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			}).done(function(echo){
					
					Materialize.toast('Su pedido ha sido eliminado.', 4000); 
					$('#modal_cancelar_pedido').closeModal();
					
					$('#actped').css('color', 'red');
					$('#actped').html("Pedido cancelado");
					$('#totped').html("");
					$('#fecha_ped').html("");
					$("#boton-cancelar").html("");
			});
	}


</script>
