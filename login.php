<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="icon" type="image/x-icon" href="img/icono.ico" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		    	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" >
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" href="css/materialize.css">
		<script src="js/jquery-3.0.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<!-- <script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9tvqJZDDxVDPqX2jfG8KyGJISfH59WTI&callback=initMap">
		</script> -->
		<title>Acceso o registro</title>
	</head>
	<body>
		<style>
			.fuente{
				font-family: 'Segoe UI Light';
				color: black;
			}
			
			* {
				box-sizing: border-box;
			}
			body {
				margin: 0;
				background: #000;
				color: black;
				font-family: 'Segoe UI Light';
			}
			
			
			@media (min-width: 480px) {
			}
			@media (min-width: 768px) {
				
				body {
					font-size: 35px;
				}
			}
			@media (min-width: 1024px) {
				
				body {
					font-size: 17px;
				}
			}
			input:focus { font-size: 30px !important;}
		</style>

		<!-- Modal Structure -->
		<div class="row">
			<div id="modal1" class="modal col s4 offset-s4">
				<div id="mensaje" class="modal-content">
					
				</div>
				<div class="modal-footer row">
					<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
				</div>
			</div>
		</div>
		<!-- Modal Structure -->
		<div class="row">
			<div id="modal_ingreso"  class="col m10 offset-m1 s8 offset-s2 l4 offset-l4 white">
				<div class="formulario-acceso">
					<div class="row">
						<div class="col s10 offset-s1">
							<h4 class="fuente">Accede al sistema</h4>
						</div>
					</div>
					<div class="row">
						<form method="POST" id="acceso" action="" accept-charset="utf-8">
							<div class="row">
								<div class="input-field col s9 offset-s1">
									<i class="material-icons prefix">account_circle</i>
									<input type="text" name="userAcceso" class="acceso validate" id="userAcceso"  autocomplete="off" maxlength="20">
									<label for="userAcceso">CI</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s9 offset-s1">
									<i class="material-icons prefix">https</i>
									<input type="password" name="passAcceso" class="acceso" id="passAcceso"  autocomplete="off" maxlength="20">
									<label for="passAcceso">Contraseña</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s9 offset-s1">
									<button class="btn waves-effect waves-light right" type="submit" name="acceso">Ingresar
									<i class="material-icons right">send</i></button>
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>

	<script>
	$(document).ready(function() {
		$('#mod_ingreso').leanModal();
	});
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

		var mensaje = $("#mensaje");
		mensaje.hide();

		$("#acceso").on("submit", function(e){
			e.preventDefault();
			var formData = new FormData(document.getElementById("acceso"));
			$.ajax({
				url: "recursos/acceder.php",
				type: "POST",
				dataType: "HTML",
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			}).done(function(echo){
				if (echo !== "") {
					mensaje.html(echo);
					mensaje.show();
				} else {
					window.location.replace("index.php");
				}
			});
		});

	</script>
</html>