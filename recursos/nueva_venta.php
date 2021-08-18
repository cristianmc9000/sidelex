 <?php
require('conexion.php');
session_start();

$Sql0 = "SELECT a.Codv, a.Cicli, a.Total, b.Nombre, b.Apellidos, b.Telefono FROM venta a, cliente b WHERE a.Cicli = b.Ci;";
$Busq0 = $conexion->query($Sql0);
while($arr0 = $Busq0->fetch_array())
{
  $fila0[] = array('cod'=>$arr0['Codv'], 'ci_cliente'=>$arr0['Cicli'], 'total'=>$arr0['Total'], 'nombre'=>$arr0['Nombre'], 'apellidos'=>$arr0['Apellidos'], 'telf'=>$arr0['Telefono']);
}


$Sql = "SELECT * FROM plato WHERE Estado = 1"; 
$Busq = $conexion->query($Sql); 
while($arr = $Busq->fetch_array()) 
    { 
        $fila[] = array('cod'=>$arr['Codpla'], 'nombre'=>$arr['Nombre'], 'precio'=>$arr['Precio'], 'foto'=>$arr['Foto']); 
    } 

$Sqlb = "SELECT * FROM bebida WHERE Estado = 1"; 
$Busqb = $conexion->query($Sqlb); 
while($arrb = $Busqb->fetch_array()) 
    { 
        $filab[] = array('nombre'=>$arrb['Nombre'], 'precio'=>$arrb['Precio']); 
    }


$Sql2 = "SELECT * FROM cliente WHERE Estado = 1";
$Busq2 = $conexion->query($Sql2);
while($arr2 = $Busq2->fetch_array())
{
$fila2[] = array('cicli'=>$arr2['Ci'], 'nombrecli'=>$arr2['Nombre'], 'apcli'=>$arr2['Apellidos'], 'telfcli'=>$arr2['Telefono']);
}

$Sql3 = "SELECT * FROM talonario WHERE Estado = 1";
$Busq3 = $conexion->query($Sql3);
while($arr3 = $Busq3->fetch_array())
{
$fila3[] = array('aut'=>$arr3['Autorizacion'], 'llave'=>$arr3['Llave_dosif'], 'nit'=>$arr3['Nit'], 'fecha_lim'=>$arr3['Fecha_emision']);
}


?>



<style>
  #modal_cant_plato{
    width: 15%;
  }
  #regresar{
    margin-left: 0;
  }

</style>


<a class="waves-effect waves-teal btn-large orange" id="regresar"><i class="material-icons left">arrow_back</i></a>


<div class="row">
  <div id="client_section" class="col s3">
    <form id="form_venta" action="" class="col s12">
      <h4 class="fuente">Datos de cliente</h4>
      <div class="row">
        <div class="input-field col s8">
            <input id="ci_c" name="ci_c" type="number" class="validate">
            <label for="ci_c">Cédula de identidad</label>
        </div>
        <div class="col s3">
          <a onclick="buscar_cliente()" class="waves-effect waves-teal btn-large"><i class="material-icons left">search</i></a>
        </div>
        <div class="input-field col s12">
            <input id="nombre_c" name="nombre_c" type="text" class="validate dis">
            <label for="nombre_c" class="active">Nombre</label>
        </div>
        <div class="input-field col s12">
            <input id="ap_c" name="ap_c" type="text" class="validate dis">
            <label for="ap_c" class="active">Apellidos</label>
        </div>
        <div class="input-field col s12">
            <input type="text" id="tot_ped" name="tot_ped" value="" hidden>
            <input id="telf" name="telf" type="number" class="validate dis">
            <label for="telf" class="active">Teléfono</label>
        </div>
      </div>
    </form>
    <button class="btn waves-effect waves-light" onclick="confirm_client()">Guardar cliente</button> 
  </div>
    <div id="detalle_venta" hidden>
    <div class="col s8 offset-s1">
      <h4 class="fuente">Detalle de venta</h4>
      <div class="col s5">
        <a href="#modal_plato" class="modal-trigger btn btn-large waves-effect waves-light red"><i class="material-icons-outlined left">lunch_dining</i>Plato</a>
        <a href="#modal_bebida" class="modal-trigger btn btn-large waves-effect waves-light green"><i class="material-icons left">local_drink</i>Bebida</a>
        <!-- <div class="col s6 center"><a class="modal-trigger" href="#modal_plato"><img src="images/plato.png" alt="Agregar Platos" class="circle responsive-img"></a></div> -->
        <!-- <div class="col s6 center"><a id="modal_trigger_bebida" href="#modal_bebida"><img src="images/bebida.png" alt="Agregar Bebidas" class="circle responsive-img"></a></div> -->
      </div>
      <div class="col s12">
          <table border="1" id="ventas_agregadas">
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

      <div class="col s3 offset-s4">
        <button type="submit" form="form_venta" class="waves-effect waves-light btn-large"><i class="material-icons right">shopping_cart</i>Realizar venta</button>
      </div>
    </div>

  </div>







<div id="modal_plato" class="modal">
    <div class="modal-content">
      <h4 class="fuente">Agregar plato</h4>
      <div class="col s12">
         <table id="tabla_platos" class="highlight">
          <thead>
             <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Precio</th>
             </tr>          
          </thead>
          <tbody>
             <?php foreach($fila as $a  => $valor){ ?>
             <tr style="cursor: pointer;" onclick="agregar_plato('<?php echo $valor['cod'] ?>','<?php echo $valor['nombre'] ?>', '<?php echo $valor['precio'] ?>');">
                <td align="center"><img src="<?php echo $valor['foto'] ?>" width="50px" alt=""></td>
                <td align="center"><?php echo $valor["nombre"] ?></td>
                <td align="center"><?php echo $valor["precio"] ?></td>
             </tr>
             <?php } ?> 
          </tbody>
        </table> 
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn waves-effect waves-light modal-close right">Aceptar</button> 
      <button class="btn red waves-effect waves-red modal-close left"><i class="material-icons left">close</i>Cancelar</button>
      
    </div>
</div>


<div id="modal_bebida" class="modal">
    <div class="modal-content">
      <h4 class="fuente">Agregar bebida</h4>
      <div class="col s12">
         <table id="tabla_bebidas" class="highlight">
          <thead>
             <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Precio</th>
             </tr>          
          </thead>
          <tbody>
             <?php foreach($filab as $a  => $valor){ ?>
             <tr>
                <td align="center"><img src="images/cocacola.png" height="45" width="30"></td>
                <td align="center"><?php echo $valor["nombre"] ?></td>
                <td align="center"><?php echo $valor["precio"] ?></td>
             </tr>
             <?php } ?> 
          </tbody>
        </table> 
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn waves-effect waves-light modal-close right">Aceptar</button> 
      <button class="btn red waves-effect waves-red modal-close left"><i class="material-icons left">close</i>Cancelar</button>
    </div>
</div>

<div id="modal_cant_plato" class="modal">
    <div class="modal-content">
      <h5>cantidad</h5>
      <div class="col s12">
        <input type="number" onKeyPress="return checkIt(event)" max="20" min="1" id="__cantidad" value="1" autocomplete="off">
      </div>
      <div id="__datosplato" hidden></div>
    </div>
    <div class="modal-footer">
      <button class="btn waves-effect waves-light right" onclick="agregar_fila_plato();">Aceptar</button> 
      <button class="btn red waves-effect waves-red modal-close left"><i class="material-icons">close</i></button>
    </div>
</div>

<!-- Mensaje -->
<div id="mensaje"></div>





<script>
 
  $(document).ready(function() {
     $('.modal').modal();
  });

function confirm_client() {
  let nombre = $("#nombre_c").val()
  let ap = $("#ap_c").val()

  if (nombre == "" || ap == "") {
    M.toast({html: 'Debe ingresar datos válidos.'})
    return false;
  }
  $("#detalle_venta").removeAttr('hidden')
}

var total = 0;
var mensaje = $("#mensaje");
mensaje.hide();
$( "#regresar" ).click(function() {
  $("#cuerpo").load("ventas.php");
});

$('#tabla_platos').dataTable({
  bInfo: false,
  "lengthMenu": [[5, 10], [5, 10]]
});
$('#tabla_bebidas').dataTable({
  bInfo: false,
  "lengthMenu": [[5, 10], [5, 10]]
});

function agregar_plato(cod, nombre, precio) {

  $("#__datosplato").html("<input id='__datosp' cp='"+cod+"' np='"+nombre+"' pp='"+precio+"' />");

  $("#modal_cant_plato").modal('open');
  
}
var reg_pedidos = new Array();
function agregar_fila_plato() {
      console.log(reg_pedidos)
      var cp = $("#__datosp").attr("cp");
      var np = $("#__datosp").attr("np");
      var pp = $("#__datosp").attr("pp");
      var fp = $("#__datosp").attr("fp");
      var cantp = $("#__cantidad").val();
      if (parseInt(cantp) > 35 || cantp == "") {M.toast({html: "El pedido no puede superar las 35 unidades"})}
        else{
      if (parseInt(cantp) < 1 || cantp == "") { M.toast({html: "Ingresa una cantidad válida."}); }
      else{
        pp = parseInt(pp)*parseInt(cantp);
        
        reg_pedidos[cp] = [cp, np, cantp, pp, fp];
        //borrando tabla
        $('#ventas_agregadas tr:not(:first-child)').slice(0).remove();
        var table = $("#ventas_agregadas")[0];
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
          $("#modal_cant_plato").modal('close');
          $("#modal_plato").modal('close');
      }}
}

    function borr_pla(x) {
      delete reg_pedidos[x];
          //borrando tabla
        $('#ventas_agregadas tr:not(:first-child)').slice(0).remove();
        var table = $("#ventas_agregadas")[0];
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


//AGREGAR VENTA A BD
  $("#form_venta").on("submit", function(e){
    e.preventDefault();

    $("#tot_ped").val(total);
    cic=$("#ci_c").val();
    nombrec=$("#nombre_c").val();
    apc=$("#ap_c").val();
    totped=$("#tot_ped").val();
    telf=$("#telf").val();

    var x="";
    var y="";

    cont = 0;
    if(reg_pedidos.length > 0){
    reg_pedidos.forEach(function (valor) {
    x=x+"&"+cont+"="+valor[0];
    y=y+"&"+cont+"c="+valor[2];
    cont++;
    });


    misdatos="ci_cliente="+cic+"&nombre_cliente="+nombrec+"&ap_cliente="+apc+"&telf="+telf+"&tot_ped="+totped+x+y+"&cont="+cont;
    objetoAjax=creaObjetoAjax();
    objetoAjax.open("POST","recursos/agregar_venta.php",true);
    objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    objetoAjax.onreadystatechange=recogeDatos;
    objetoAjax.send(misdatos);
    }else{
      M.toast({html: "No se ha seleccionado ningún producto..."});
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
      if(!miTexto.includes('error')){
        M.toast({html: "Venta Realizada!"});
      

        obtenerElem(miTexto);
        $("#cuerpo").load("ventas.php");
      }else{
        console.log(miTexto);
      }


    }
  }



function obtenerElem(cod){


var datos_venta = "";
var data = {codx: cod}
$.ajax({
url: "recursos/dat_fyc.php",
data: data,
method: "post",
success: function(response){
  console.log(response+"-----response");
  imprimirElemento(response);
},
error: function(error, data, response){
  console.log(error)
}
});




}
function imprimirElemento(response){

var data_fac = response.split(",")
var cod = data_fac[0];

var ci = data_fac[1]
var nombres = data_fac[3]+" "+data_fac[4]
var usuario = "<?php echo $_SESSION['Nombre'] ; echo ' '.$_SESSION['Apellidos']; ?>"
var total = data_fac[2]

var date = new Date();

var fecha = date.getFullYear()+"-"+date.getMonth()+"-"+date.getDate();
var hora = date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
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



var filas = "";

var data = {codxv: cod}
$.ajax({
url: "recursos/filas_fac_ven.php",
data: data,
method: "post",
success: function(response){
  console.log(response)
  filas = response;
},
error: function(error, data, response){
  console.log(error)
}
});


//ENVIO CON AJAX --
var data = {autx: aut, llavex: llave, nitx: nit, cix: ci, fechax: fecha, montox: total, codped: cod, horax: hora}
$.ajax({
url: "recursos/datos_fac_ven.php",
data: data,
method: "post",
success: function(response){
  console.log(response)
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
  console.log(response)
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
  
    <center>Restaurante de comida rápida Delicias Express.</center>
    <center>B. IV Centenario, Calle Zamora. </center>
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



function buscar_cliente() {

  let ci_cliente = $("#ci_c").val();

  if(!ci_cliente){
    M.toast({html: "Ingresa una cédula de identidad válida."});
  }
  else{
    "<?php foreach($fila2 as $a  => $valor){ ?>"
    if ("<?php echo $valor['cicli']; ?>" == ci_cliente) {
      $("#nombre_c").val("<?php echo $valor['nombrecli'] ?>")
      $("#ap_c").val("<?php echo $valor['apcli'] ?>")
      $("#telf").val("<?php echo $valor['telfcli'] ?>")
      $(".dis").attr("disabled", true);
      return true;
    }else{
      $(".dis").removeAttr("disabled");
      $(".dis").val('');
    }
    "<?php } ?>"
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

</script>