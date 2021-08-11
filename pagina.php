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
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/datatable.js"></script>
    <script src="js/num2text.js"></script>
    <script src="js/jsPDF.min.js"></script>
    <title> RCR. Delicias Express., Número de teléfono(s): 76191403, E-mail: rcrdelexo@hotmail.com</title>
    <style>

    .fuente{
    font-family: 'Segoe UI Light';
    }

    nav ul a:hover {
    background-color: rgba(0, 0, 0, 0.2) !important;
    font-size: 120%;
    }
    .mg{
      margin-top: -20px;
    }

    table.highlight > tbody > tr:hover {
    background-color: #a0aaf0 !important;
    }
    #mobile-demo{
    width: 280px;
    }
    li a{
    color: white !important;
    font-size: 14px;
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
        
        <a href="#!" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="side-nav fixed"  onmouseover="overhid();" onmouseout="overshow();" style="background-color: #34495e;" id="mobile-demo"  style="color: black;">
          <li class="sidenav-header blue mg" style="background-image: url('images/paisaje-fondo.jpg');">
            <div class="row">
              <div class="col s4" style="padding-top: 30px;">
                <img src="<?php echo $_SESSION['Foto'] ?>" width="48px" height="48px" class="circle responsive-img valign profile-image">
              </div>
              <div class="col s12" style="margin-top: -20px;"> 
                <span class="white-text name"><?php echo $estado; ?></span>
              </div>
            </div>
          </li>
          <li class="mg"><a href="#!" style="color: white;" onclick="location.reload();">INICIO</a></li>
          <li class="mg"><a href="#!" onclick="cargar('ventas');">Ventas</a></li>
          <!-- <li class="mg"><a href="#!" onclick="cargar('compras');">Compras</a></li> -->
          <li class="mg"><a href="#!" onclick="cargar('usuarios');">Usuarios</a></li>
          <li class="mg"><a href="#!" onclick="cargar('clientes');">Clientes</a></li>
          <li class="mg"><a href="#!" onclick="cargar('roles');">Roles</a></li>
          <!-- <li class="mg"><a href="#!" onclick="cargar('proveedores');">Proveedores</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('insumos');">Insumos</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('empresas');">Empresas</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('bebidas');">Bebidas</a></li> -->
          <li class="mg"><a href="#!" onclick="cargar('platos');">Platos</a></li>
          <li class="mg"><a href="#!" onclick="cargar('pedidos');">Pedidos</a></li>
          <!-- <li class="mg"><a href="#!" onclick="cargar('talonario');">Talonario</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('facturas');">Facturas</a></li> -->
          <!-- <li class="mg"><a href="#!" onclick="cargar('reportes');">Reportes</a></li> -->
          <li class="mg"><?php echo $salir; ?></li>
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
    var html5_audiotypes={
    "wav": "audio/wav"
    }
    function createsoundbite(sound){
    var html5audio=document.createElement('audio')
    if (html5audio.canPlayType){ //Comprobar soporte para audio HTML5
    for (var i=0; i<arguments.length; i++){
      var sourceel=document.createElement('source')
      sourceel.setAttribute('src', arguments[i])
      if (arguments[i].match(/.(w+)$/i))
      sourceel.setAttribute('type', html5_audiotypes[RegExp.$1])
      html5audio.appendChild(sourceel)
      }
      html5audio.load()
      html5audio.playclip=function(){
      html5audio.pause()
      html5audio.currentTime=0
      html5audio.play()
      }
      return html5audio
      }
      else{
      return {playclip:function(){throw new Error('Su navegador no soporta audio HTML5')}}
      }
      }
      var hover2 = createsoundbite('audio/botones/6.wav');
      var hover3 = createsoundbite('audio/botones/3.wav');
      var hover4 = createsoundbite('audio/botones/Efecto De Sonido Caja registradora.mp3');
      </script>
      
    </body>
  </html>