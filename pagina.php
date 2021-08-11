<?php
//Reanudamos la sesión
session_start();
//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['user']) and $_SESSION['estado'] != 'Autenticado') {
header('Location: index.php');
} else {
$foto = $_SESSION['Foto'];
$estado = $_SESSION['Nombre']." ".$_SESSION['Apellidos'];
$ciactual = $_SESSION['Ci_Usuario'];
$salir = '<a href="recursos/salir.php" class="right" target="_self">Cerrar sesión</a>';
require('recursos/sesiones.php');
};
require('recursos/conexion.php');
$Sql = "SELECT * FROM usuario";
$Busq = $conexion->query($Sql);
?>






<!DOCTYPE html>
<html lang="ES">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/datatable.css">
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" >
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/datatable.js"></script>
    <script type="text/javascript" src="js/vfs_fonts.js"></script>
    <script src="js/num2text.js"></script>
    <script src="js/jsPDF.min.js"></script>
    <title> RCR. Delicias Express., Número de teléfono(s): 76191403, E-mail: rcrdelexo@hotmail.com</title>
    <style>

    .fuente{
    font-family: 'Segoe UI Light';
    }

    nav ul a:hover {
    background-color: rgba(0, 0, 0, 0.2) !important;
    /*font-size: 120%;*/
    }
    .mg{
      /*margin-top: -20px;*/
      vertical-align: middle;

      padding-bottom: 10px;
    }

    table.highlight > tbody > tr:hover {
    background-color: #a0aaf0 !important;
    }
    #mobile-demo{
    width: 280px;
    }
    li a{
    color: white !important;
    /*font-size: 14px;*/
    }
    header, body, footer {
    padding-left: 280px;
    }
    @media only screen and (max-width : 992px) {
    header, body, footer {
    padding-left: 0;
    }
    }
    #mobile-demo{
    overflow-y: hidden;
    }
    </style>
  </head>
  <body>
    <nav>
      <div id="latbar" class="nav-wrapper" style="background-color: #2980b9;">
        <ul>
          <li class="center brand-logo" > <img src="images/polloloco.png" width="" height="60px" alt=""></li>
          <!-- <li class="left brand-logo" > <img src="images/polloloco.png" width="" height="60px" alt=""></li> -->
        </ul>

          
        <ul class="right hide-on-med-and-down">
          <li><?php echo $estado; ?></li>
          <li><?php echo $salir; ?></li>
        </ul>
        
        <a href="#!" data-activates="mobile-demo" class="button-collapse"><i class="material-icons-outlined">menu</i></a>
        <ul class="side-nav fixed"  onmouseover="overhid();" onmouseout="overshow();" style="background-color: #34495e;" id="mobile-demo"  style="color: black;">
          
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

          <li ><a href="#!" style="color: white;" onclick="location.reload();"><i class="material-icons-outlined">home</i> <b class="mg">INICIO</b></a></li>
          <li ><a href="#!" onclick="cargar('ventas');"><i class="material-icons-outlined">shopping_cart</i> <b class="mg">Ventas</b></a></li>
          <!-- <li class="mg"><a href="#!" onclick="cargar('compras');">Compras</a></li> -->
          <li ><a href="#!" onclick="cargar('usuarios');"><i class="material-icons-outlined">people</i> <b class="mg">Usuarios</b></a></li>
          <li ><a href="#!" onclick="cargar('clientes');"><i class="material-icons-outlined">airline_seat_recline_normal</i> <b class="mg">Clientes</b></a></li>
          <li ><a href="#!" onclick="cargar('roles');"><i class="material-icons-outlined">switch_account</i> <b class="mg">Roles</b></a></li>
          <!-- <li class="mg"><a href="#!" onclick="cargar('proveedores');">Proveedores</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('insumos');">Insumos</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('empresas');">Empresas</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('bebidas');">Bebidas</a></li> -->
          <li ><a href="#!" onclick="cargar('platos');"><i class="material-icons-outlined">fastfood</i> <b class="mg">Platos</b></a></li>
          <li ><a href="#!" onclick="cargar('pedidos');"><i class="material-icons-outlined">receipt</i> <b class="mg">Pedidos</b></a></li>
          <!-- <li class="mg"><a href="#!" onclick="cargar('talonario');">Talonario</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('facturas');">Facturas</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('reportes');">Reportes</a></li> -->
          <li ><?php echo $salir; ?></li>
        </ul>
      </div>
    </nav>
    
    
    <div class="row">
      <div id="cuerpo" class="col s12">
        
      </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
    $(".dropdown-button").dropdown({ hover: true });
    $(".button-collapse").sideNav();
    // $('.sidenav').sidenav();
    // var elems = document.querySelectorAll('.sidenav');
    // var instances = M.Sidenav.init(elems,{});
    });
    //controlar overflow de la sidenav
    function overhid () {$("#mobile-demo").css('overflow', 'auto');}
    function overshow () {$("#mobile-demo").css('overflow', 'hidden');}
    function cargar(x){
    var y=".php";
    $("#cuerpo").load(x+y);
    }
      </script>
      
    </body>
  </html>