<?php
require('../../recursos/conexion.php');
session_start();
$Sql = "SELECT a.Codped, a.Cicli, a.Total, a.Fecha, a.Estado, b.Nombre, b.Apellidos, b.Telefono FROM pedido a, cliente b WHERE a.Cicli = b.id;";
$Busq = $conexion->query($Sql);
while($arr = $Busq->fetch_array())
{
$fila[] = array('cod'=>$arr['Codped'], 'ci'=>$arr['Cicli'], 'total'=>$arr['Total'], 'fecha'=>$arr['Fecha'], 'estado'=>$arr['Estado'], 'nombre'=>$arr['Nombre'], 'apellidos'=>$arr['Apellidos'], 'telf'=>$arr['Telefono']);
}
$Sql2 = "SELECT a.Codped, a.Codpla, a.Cant, a.Precio, b.Nombre FROM det_ped a, plato b WHERE a.Codpla = b.Codpla;";
$Busq2 = $conexion->query($Sql2);
while($arr2 = $Busq2->fetch_array())
{
$fila2[] = array('cod'=>$arr2['Codped'], 'codpla'=>$arr2['Codpla'], 'cant'=>$arr2['Cant'], 'precio'=>$arr2['Precio'], 'nombre'=>$arr2['Nombre']);
}
$Sql3 = "SELECT * FROM talonario WHERE Estado = 1";
$Busq3 = $conexion->query($Sql3);
while($arr3 = $Busq3->fetch_array())
{
$fila3[] = array('aut'=>$arr3['Autorizacion'], 'llave'=>$arr3['Llave_dosif'], 'nit'=>$arr3['Nit'], 'fecha_lim'=>$arr3['Fecha_emision']);
}
?>


<style>
.fuente{
font-family: 'Segoe UI light';
color: red;
}
table.highlight > tbody > tr:hover {
background-color: #a0aaf0 !important;
}
#tab_det{
border: 1px solid black;
}

#modal2{
width: 40%;
}
</style>
<span class="fuente"><h3>Pedidos
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn-floating btn-large red" id="modal" href="#modal1"><i class="material-icons left">add</i></a></h3>
</span>
<div class="row">
  <div class="col s12 m12">
    <table id="tabla1" class="highlight">
      <thead>
        <tr>
          <th>Código</th>
          <th>Cliente</th>
          <th>Fecha</th>
          <th>Total Bs.</th>
          <th>Estado</th>
          <th class="center">Acciones</th>
          <!--        <th>Borrar</th>
          <th>Ver Usuario</th> -->
        </tr>
      </thead>
      <tbody>
        <?php foreach($fila as $a  => $valor){ ?>
        <tr <?php if(($valor['estado'])==1) echo 'style="background-color: #eeee00"'; ?> <?php if(($valor['estado'])==0) echo 'style="background-color: #fff"'; ?>>
          
          <td align="center"><?php echo $valor["cod"]?></td>
          <td align="center"><?php echo $valor["ci"] ?></td>
          <td align="center"><?php echo $valor["fecha"] ?></td>
          <td align="center"><?php echo $valor["total"] ?></td>
          <td align="center"><?php if ($valor["estado"] == 1) { ?> Pendiente <?php }else{ ?> Enviado <?php } ?></td>
          <td class="center"><a onclick="" class="btn-floating modal-trigger"><i class="material-icons">build</i></a>
          <a href="#modal2" class="btn-floating modal-trigger"><i class="material-icons">delete</i></a>
          <a onclick="vped('<?php echo $valor["cod"]?>', '<?php echo $valor["ci"]?>', '<?php echo $valor["nombre"]?>', '<?php echo $valor["apellidos"]?>', '<?php echo $valor["telf"]?>');"  class="btn-floating"><i class="material-icons">search</i></a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<!-- Modal Ver Pedidos -->
<div id="modal2" class="modal modal-fixed-footer">
  <div id="imp">
    
  </div>
  <div class="modal-content">
    <h4 class="center"><b>Ver pedido</b></h4>
    <h5><p id="__ci"></p></h5>
    <h5><p id="__cli"></p></h5>
    <h5><p id="__telf"></p></h5>
    
    <table id="tab_det" >
      <tr>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
      </tr>
      <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
      </tr>
    </table>
    <div class="container"><b><p id="total_ped" class="right"></p></b></div>
  </div>
  <form action="#" id="codiped" method="POST">
    <input type="text" id="__codiped" name="__codiped" value="" hidden>
  </form>
  <div class="modal-footer">
    <a href="#!" class="left modal-action modal-close waves-effect waves-light btn red">Cancelar</a>
    <button class="waves-effect waves-light btn right" type="submit" form="codiped" >Aceptar Pedido</button>
  </div>
</div>
<!-- Mensaje -->
<div id="mensaje"></div>

<script>
$(document).ready(function() {
$('#tabla1').dataTable({
"order": [[ 2, "desc" ]]
});
//$('#mod2').leanModal();
});
var mensaje = $("#mensaje");
mensaje.hide();

function vped(cod, ci, nombre, apellidos, telf) {
  $("#__ci").html("<b>Cédula: </b>"+ci);
  $("#__cli").html("<b>Cliente: </b>"+nombre+" "+apellidos);
  $("#__telf").html("<b>Teléfono: </b>"+telf);
  $("#__codiped").val(cod);
  $('#tab_det tr:not(:first-child)').slice(0).remove();
  var table = $("#tab_det")[0];
  total =  0;
  //llenando tabla
  "<?php foreach($fila2 as $a  => $valor){ ?>";
  if(cod == "<?php echo $valor['cod'] ?>"){
  var row = table.insertRow(1);
  row.insertCell(0).innerHTML = "<?php echo $valor['precio'] ?>";
  row.insertCell(0).innerHTML = "<?php echo $valor['cant'] ?>";
  row.insertCell(0).innerHTML = "<?php echo $valor['nombre'] ?>";
  total  = parseInt(total) + (parseInt("<?php echo $valor['precio'] ?>")*(parseInt("<?php echo $valor['cant'] ?>")));
  }
  "<?php } ?>";
  $("#total_ped").html("Total: "+total +" Bs.");
  $("#modal2").openModal();
}


$("#codiped").on("submit", function(e){
  $("#modal2").closeModal();
  e.preventDefault();

  let codip = $("#__codiped").val();
  var data = {__codiped: codip}

  $.ajax({
  url: "recursos/agregar_pedven.php",
  method: "post",
  data: data
  }).done(function(echo){
  if (echo == "aceptado") {


  Materialize.toast("PEDIDO ACEPTADO." , 4000);

  $("#cuerpo").load("pedidos.php");
  imprimirElemento($("#__codiped").val());


  }
  if(echo == "already"){
  Materialize.toast("Este pedido ya ha sido aceptado" , 4000);
  }

  });
});



function imprimirElemento(cod){
"<?php foreach($fila as $a  => $valor){ ?>"
if (<?php echo $valor['cod']; ?> == cod) {
date = new Date("<?php echo $valor['fecha']; ?>")

var fecha = date.getFullYear()+"-"+date.getMonth()+"-"+date.getDate();
var hora = date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
var ci = "<?php echo $valor['ci']; ?>"
var nombres ="<?php echo $valor['nombre']; ?>"+" "+"<?php echo $valor['apellidos']; ?>"
var usuario = "<?php echo $_SESSION['Nombre'] ; echo ' '.$_SESSION['Apellidos']; ?>"
var total = "<?php echo $valor['total']; ?>"
}
"<?php } ?>"
// NUMEROS A LETRAS
var monto = numeroALetras(total, {
plural: 'BS.',
singular: 'BS.',
centPlural: 'CTVS.',
centSingular: 'CTVS.'
});
"<?php foreach($fila3 as $a  => $valor){ ?>"
var aut = "<?php echo $valor['aut']; ?>"
var llave = "<?php echo $valor['llave']; ?>"
var nit = "<?php echo $valor['nit']; ?>"
var fecha_lim = "<?php echo $valor['fecha_lim']; ?>"
"<?php } ?>"
var celdas = "";
var filas = "";
"<?php foreach($fila2 as $a  => $valor){ ?>"
if( cod == <?php echo $valor['cod'] ?> ){
celdas = `
<tr>
  <td><?php echo $valor['nombre'] ?></td>
  <td style="text-align:center"><?php echo $valor['cant'] ?></td>
  <td style="text-align:center"><?php echo $valor['precio'] ?></td>
</tr>
`
filas = filas + celdas;
}
"<?php } ?>"


//ENVIO CON AJAX --


var data = {autx: aut, llavex: llave, nitx: nit, cix: ci, fechax: fecha, montox: total, codped: cod, horax: hora}
$.ajax({
url: "recursos/datos_fac.php",
data: data,
method: "post",
success: function(response){
  // console.log(response)
  crear_factura(nit, aut, fecha, hora, ci, nombres, filas, total, monto, response, fecha_lim, usuario);
},
error: function(error, data, response){
  console.log(error)
}
});


//FIN ENVIO AJAX

}
// let qrcod = "";
function crear_factura(nit, aut, fecha, hora, ci, nombres, filas, total, monto, cod_control, fecha_lim, usuario) {

 var cad = cod_control.split(",");

let cntdo = nit+"|"+cad[1]+"|"+aut+"|"+fecha+"|"+total+"|"+cad[0]+"|"+ci+"|"+"0"
var data = {numfac: cad[1], contenido: cntdo }
$.ajax({
url: "obtener_codigo.php",
data: data,
method: "post",
success: function(response){

  crear_html(nit, cad[1], aut, fecha, hora, ci, nombres, filas, total, monto, cad[0], fecha_lim, usuario, response );

},
error: function(error){
  console.log(error)
}
});

}


function crear_html(nit, numfac, aut, fecha, hora, ci, nombres, filas, total, monto, codctrl, fecha_lim, usuario, qrcod  ) {




var miHtml = `
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <title>Document</title>
    
  </head>
  <style>
    body{
      font-family: 'Consolas';
    }
  </style>
  <body>
  
    <center>Restaurante de comida rápida El pollo Loco.</center>
    <center>B. La Loma, Calle Cbba. Esq. Nuñez del prado</center>
    <center>Telf.: 6637037 </center>
    <center>TARIJA - BOLIVIA</center>
    <center>FACTURA</center>
    <center>----------------------------------------</center>
    <span style="float: left">NIT: ${nit}</span><span style="float: right">Factura N° ${numfac}</span><br>
    
    N° Autorización: ${aut}
    <center>----------------------------------------</center>
    
    <span>CI/NIT: ${ci}</span><span style="float: right"> Fecha: ${fecha}</span><br>
    <span>Señor/a: ${nombres}</span><span style="float: right">Hora: ${hora}</span><br>
    <table style="font-size: 14px;">
      <tr>
        <th width="70%" align="left">Artículo</th>
        <th width="15%">Cantidad</th>
        <th width="15%">Importe</th>
      </tr>
      `+filas+`
      
    </table><br>
    <span style="float: right">Total Bs. ${total}</span><br>
    <!-- <span style="float: right">Pagado:</span><br>
    <span style="float: right">Cambio:</span><br> -->
    Son: ${monto}
    <center>----------------------------------------</center>
    Código de Control: ${codctrl}<br>
    Fecha Límite de emisión: ${fecha_lim}<br>
    Usuario: ${usuario}
    <div> <center><img src="${qrcod}" alt="" height="120px" /></center></div>
    <center><p>ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS. EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LEY</p></center>
    <center>*****************************************</center>
    <center><p>Ley Nro. 453: Los servicios deben suministrarse en condiciones de inocuidad, calidad y seguridad.</p></center>
  </body>
</html> `;

var pdf = new jsPDF('p', 'pt', 'letter');
specialElementHandlers = {
    // element with id of "bypass" - jQuery style selector
    '#bypassme': function (element, renderer) {
        // true = "handled elsewhere, bypass text extraction"
        return false
    }
};

margins = {
    top: 80,
    bottom: 60,
    left: 40,
    width: 522
};  
 pdf.fromHTML(
  miHtml, 
  margins.left, 
  margins.top, { 
      'width': margins.width, 
      'elementHandlers': specialElementHandlers
  },

  function (dispose) {

      pdf.save("fac_"+numfac+'.pdf');
  }, margins
);


var ventana = window.open("about:blank","_blank");
ventana.document.write(miHtml);
// ventana.document.close();
// ventana.focus();
$(ventana.document).ready(function (){
ventana.print();
ventana.close();

return true;
});
}


</script>