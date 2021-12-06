<?php
require('recursos/conexion.php');
require('recursos/sesiones.php');
session_start();
//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
$sp = $_GET['sp'];
if(!isset($_SESSION['user']) and $_SESSION['estado'] != 'Autenticado') {
header('Location: index.php');
} else {
$foto = $_SESSION['Foto'];
$estado = $_SESSION['Nombre']." ".$_SESSION['Apellidos'];
$ciactual = $_SESSION['Ci_Usuario'];
$rol = $_SESSION['rol'];
$salir = '<a href="recursos/salir.php" class="right" target="_self">Cerrar sesión</a>';

};

$Sql = "SELECT * FROM usuario";
$Busq = $conexion->query($Sql);
?>


<!DOCTYPE html>
<html lang="ES">
  <head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" type="text/css" href="css/index.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/datatable.css"> -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="icon" type="image/x-icon" href="img/icono.ico" />
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="css/style_sys.css">
    <link rel="stylesheet" href="css/jquery.nice-number.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="css/materialize.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" >
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="js/jquery-3.0.0.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- <script src="js/materialize.js"></script> -->
    <!-- <script src="js/datatable.js"></script> -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.css"/>
    <script type="text/javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="js/dataTables.buttons.js"></script>

    <script type="text/javascript" src="js/jszip.js"></script>
    <script type="text/javascript" src="js/pdfmake.js"></script>
    <script type="text/javascript" src="js/vfs_fonts.js"></script>
    <script type="text/javascript" src="js/buttons.print.js"></script>
    <script type="text/javascript" src="js/buttons.html5.js"></script>
    <script src="js/num2text.js"></script>
    <script src="js/jsPDF.min.js"></script>
    <script src="js/jquery.nice-number.js"></script>
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBN0x9mkyg_9x41m82iSIQvJ8M9vo7fXm4">
    </script>
    
    <title> RCR. Delicias Express., Número de teléfono(s): 76191403, E-mail: rcrdelex@hotmail.com</title>
    <style>
    .fuente{
    font-family: 'Segoe UI Light';

    }
    .close{
      position: relative; 
      color: #b2bec3; 
      text-decoration: none;
    }
    .close i{
      font-size: 2em;
    }

    nav ul a:hover {
    background-color: rgba(0, 0, 0, 0.2) !important;
    /*font-size: 120%;*/
    }
    .mg{
      /*margin-top: -20px;*/
      /*vertical-align: middle;*/

      /*padding-bottom: 10px;*/
    }
    
    /*#mobile-demo{*/
    /*width: 280px;*/
    /*}*/
    li a{
    color: white !important;
    /*font-size: 14px;*/
    }
    /*header, body, footer {*/
    /*padding-left: 280px;*/
    /*}*/
    @media only screen and (max-width : 992px) {
      .sidebar{
        visibility: hidden;
      }
    }
    @media only screen and (max-width : 1500px) and (min-width : 992px){
      #cuerpo {
        margin-left:  250px;
      }
    }
 /*   #mobile-demo{
    overflow-y: hidden;
    }*/
    .material-icons-outlined{
      display: inline-flex;
      vertical-align: top;
    }
    .width-modal{
      width: 25%;
    }
    </style>
  </head>
  <body>
    <nav>
      <div id="latbar" class="nav-wrapper" style="background-color: #e67e22;">
        <ul>
          <li class="left"><a href="#modal1" class="waves-effect waves-light btn modal-trigger"><i class="left"><img width="40px" src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-money-finance-kiranshastry-lineal-kiranshastry-3.png"/></i>Gasto diario</a></li>
          <li class="center brand-logo" style="margin-top: 10px;"><img src="img/sidelex_sf.png" width="" height="40px" alt=""><!-- <img src="images/polloloco.png" width="" height="60px" alt=""> --></li>
          <!-- <li class="left brand-logo" > <img src="images/polloloco.png" width="" height="60px" alt=""></li> -->
          <li class=""><a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a></li>
        </ul>

          
        <ul class="right hide-on-med-and-down">
          <li><?php echo $estado; ?></li>
          <li><?php echo $salir; ?></li>
        </ul>
        
        <!-- <a href="#!" data-activates="mobile-demo" class="button-collapse"><i class="material-icons-outlined">menu</i></a> -->

        
      </div>
    </nav>
    
    <ul class="sidenav fixed" id="mobile-demo" onmouseover="overhid();" onmouseout="overshow();" style="background-color: #34495e;" id="mobile-demo"  style="color: black;">
          
          <li class="sidenav-header blue " style="background-image: url('images/paisaje-fondo.jpg');">
            <div class="row">
              <!-- <div class="col s4" style="padding-top: 30px;"> --> <div class="col s4" style="">

                <img src="<?php echo $_SESSION['Foto'] ?>" width="48px" height="48px" class="circle responsive-img valign profile-image">
              </div>
              <!-- <div class="col s12" style="margin-top: -20px;">  --><div class="col s12" >
                <span class="white-text name"><?php echo $estado; ?></span>
              </div>
            </div>
          </li>

          <li ><p><a href="#!" style="color: white;" onclick="location.reload();"><i class=" material-icons-outlined" style="padding-right: 17px;">home</i> Inicio</a></p></li>
          <li ><p><a href="#!" onclick="cargar('ventas');"><i class="material-icons-outlined" style="padding-right: 17px;">shopping_cart</i> Ventas</a></p></li>
          <!-- <li class="mg"><a href="#!" onclick="cargar('compras');">Compras</a></li> -->


          <!-- <li class="mg"><a href="#!" onclick="cargar('proveedores');">Proveedores</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('insumos');">Insumos</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('empresas');">Empresas</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('bebidas');">Bebidas</a></li> -->
          <li ><p><a href="#!" onclick="cargar('templates/platos/platos');"><i class="material-icons-outlined" style="padding-right: 17px;">fastfood</i> Platos</a></p></li>
          <li ><p><a href="#!" onclick="cargar('templates/pedidos/pedidos');"><i class="material-icons-outlined" style="padding-right: 17px;">receipt</i> Pedidos</a></p></li>
          <!-- <li class="mg"><a href="#!" onclick="cargar('talonario');">Talonario</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('facturas');">Facturas</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('reportes');">Reportes</a></li> -->

          <ul class="collapsible" data-collapsible="expandable" >
            <li>
                <div class="collapsible-header"><i class="material-icons-outlined" 7215511>admin_panel_settings</i>Administración</div>
                <div style="color: black; background-color: #2980b9;" class="collapsible-body"><a href="#!" onclick="cargar('usuarios');"><i class="material-icons-outlined">people</i> Usuarios</a></div>
                <div style="color: black; background-color: #2980b9;" class="collapsible-body"><a href="#!" onclick="cargar('clientes');"><i class="material-icons-outlined">airline_seat_recline_normal</i> Clientes</a></div>
                <div style="color: black; background-color: #2980b9;" class="collapsible-body"><a href="#!" onclick="cargar('roles');"><i class="material-icons-outlined">switch_account</i> Roles</a></div>
            </li>
          </ul>
          <li ><?php echo $salir; ?></li>
        </ul>
    
        <div class="sidebar">
          <div class="spacx"><a href="#!" style="color: white;" onclick="location.reload();"><i class=" material-icons-outlined" style="padding-right: 17px;">home</i> Inicio</a></div>
          <div class="spacx"><a href="#!" onclick="cargar('templates/ventas/ventas');"><i class="material-icons-outlined" style="padding-right: 17px;">shopping_cart</i> Ventas</a></div>
          <div class="spacx"><a href="#!" onclick="cargar('templates/platos/platos');"><i class="material-icons-outlined" style="padding-right: 17px;">fastfood</i> Platos</a></div>
          <div class="spacx"><a href="#!" onclick="cargar('templates/pedidos/pedidos');"><i class="material-icons-outlined" style="padding-right: 17px;">dining</i> Pedidos</a></div>

          <ul class="collapsible" data-collapsible="expandable" <?php if ($rol == '3') echo "hidden" ?>>
            <li>
                <div style="font-family: 'Rubik'" class="collapsible-header">
                  <i class="material-icons-outlined">admin_panel_settings</i>Administración
                </div>
                <div style="color: black; background-color: #1a1a1a;" class="collapsible-body">
                  <span>
                    <a href="#!" onclick="cargar('templates/usuarios/usuarios');">
                      <i class="material-icons-outlined">people</i> Usuarios
                    </a>
                  </span>
                </div>
                <div style="color: black; background-color: #1a1a1a;" class="collapsible-body">
                  <span>
                    <a href="#!" onclick="cargar('templates/clientes/clientes');">
                      <i class="material-icons-outlined">airline_seat_recline_normal</i> Clientes
                    </a>
                  </span>
                </div>
                <div style="color: black; background-color: #1a1a1a;" class="collapsible-body">
                  <span>
                    <a href="#!" onclick="cargar('templates/roles/roles');">
                      <i class="material-icons-outlined">switch_account</i> Roles
                    </a>
                  </span>
                </div>
                <div style="color: black; background-color: #1a1a1a;" class="collapsible-body">
                  <span>
                    <a href="#!" onclick="cargar('templates/facturas/facturacion');">
                      <i class="material-icons-outlined">receipt</i> Facturación
                    </a>
                  </span>
                </div>
                <div style="color: black; background-color: #1a1a1a;" class="collapsible-body">
                  <span>
                    <a href="#!" onclick="cargar('templates/reportes/reportes');">
                      <i class="material-icons-outlined">assignment</i> Reportes
                    </a>
                  </span>
                </div>

            </li>
          </ul>
          <?php echo $salir; ?>
        </div>

    <div id="modal1" class="modal width-modal" >
      <div class="modal-content">
        <center><h5 class="roboto">Gasto diario:</h5></center>
        <p id="title_spend" class="roboto"></p>
        <div class="input-field">
          <input type="text" mame="gasto" onkeypress="return checkIt(event)" id="gasto" value="" >
          <label for="gasto">Gasto diario</label>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" id="enviar_gasto" class="waves-effect waves-green btn">Aceptar</a>
      </div>
    </div>

    <!-- <div class="container"> -->
      <div class="row">
        <div id="cuerpo" class="col s12 m12 l9 offset-l3 xl9 offset-xl2">
          
        </div>
      </div>
    <!-- </div> -->



  <script>
    $(document).ready(function() {
      let fecha = new Date();
      $('.modal').modal();
      $("#modal1").modal({'dismissible':false});

      $.ajax({
        url: "recursos/stock/check_spend.php",
        method: "GET",
        success: function(response) {
            if (response == '0') {
              $("#modal1").modal('open');
            }else{
              $("#gasto").val(response)
            }
        },
        error: function(error) {
            console.log(error)
        }
      })

      
      $("#title_spend").html("Fecha: "+fecha.getDate()+"-"+(fecha.getMonth()+1)+"-"+fecha.getFullYear())

      // DAILY_STOCK
      const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
      let actual = fecha.getFullYear()+"-"+(fecha.getMonth()+1);
      let year = fecha.getFullYear();
      let per = months[fecha.getMonth()];
      $("#cuerpo").load("templates/inicio/daily_stock.php?mes="+actual+"&year="+year+"&per="+per);
      //END DAILY_STOCK

    });
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems);

      var elems = document.querySelectorAll('.collapsible');
      var instances = M.Collapsible.init(elems);

    });

    $("#enviar_gasto").click(function (e) {
      let gasto = $("#gasto").val()
      if( !$("#gasto").val() ) {
        return M.toast({html: "Inserte un monto válido."})
      }
      $.ajax({
        url: "recursos/stock/daily_spend.php?spend="+gasto,
        method: "GET",
        success: function(response) {
            if (response == '1') {
              M.toast({html: "Gasto diario agregado."})
              $("#modal1").modal('close')
            }
        },
        error: function(error) {
            console.log(error)
        }
      })
    })

      //controlar overflow de la sidenav
    function overhid () {$("#mobile-demo").css('overflow', 'auto');}
    function overshow () {$("#mobile-demo").css('overflow', 'hidden');}

    function cargar(x){
    var y=".php";
    $("#cuerpo").load(x+y);
    }

    function check(e){
      if ((e.charCode >= 48 && e.charCode <= 57) || e.charCode == 46) {
        return true
      }else{
        return false
      }
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

    function checkText(e) {
      // console.log(e.key)
      var regex = /^[a-zA-Z áéíóúÁÉÍÓÚñ@]+$/;
      if (regex.test(e.key) !== true){
        // e.currentTarget.value = e.currentTarget.value.replace(/[^a-zA-Z áéíóúÁÉÍÓÚ@]+/, '');
        return false
      }
    }
  </script>
      
  </body>
</html>
