<?php 
include_once("funciones.php");
include_once("plantilla.php");
class verncf extends funciones
{

function __construct()
{

if(isset($_SESSION['ADM']))
{


$P = new plantilla();
$P->menu("Ver relacion de facturas");

?>
<script>
//$(document).on('load',function(){$("#fechas").hide();});

     function check()
     {
        if ($("#filtro").val()=="Fecha") 
        {
            $("#valor").hide();
            $("#labelvalor").hide();
            $("#fechas").show();
        }
        else
        {
            $("#valor").show();
            $("#labelvalor").show(); 
            $("#fechas").hide();
        }
     }       
    
$(document).ready(function(){
    $("#btfiltrar").click(function()
        {
            var ur ="";
            if ($("#filtro").val()==="Fecha" && $("#fecha1").val()!==""
                 & $("#fecha2").val()!="") 
            {
            
                var pieces1 = $("#fecha1").val().split('/');
                pieces1.reverse();
                var f1 = pieces1.join('/');

                var pieces2 = $("#fecha2").val().split('/');
                pieces2.reverse();
                var f2 = pieces2.join('/');

                ur = "verncf.php?fecha1="+f1+"&fecha2="+f2;
                
            }
            else if ($("#filtro").val()==="RNC_cliente" && $("#valor").val()!=="")
            {
                var v = $("#valor").val();
                ur = "verncf.php?filtro=RNC_cliente&valor="+v;
            }
            else if ($("#filtro").val()==="NCF" && $("#valor").val()!=="")
            {
                var n = $("#valor").val();
                ur = "verncf.php?filtro=NCF&valor="+n;
            }
            else
            {
                alert("El campo no puede ser nulo");
            }
            if (ur!="") {window.location.assign(ur);}
            
        });
 });


</script>

<br>
<center>
<button class="btn btn-info" id="descargarrelacion" onclick="">Descargar</button>

<div id="demo" class="panel" style="width:60%;padding:20px;">




<div class="row"> 

  <div class="col-sm-2">
  <label for="filtro">Filtrar por:</label>
  </div>

  <div class="col-sm-3">
  <select name="filtro" id="filtro" class="form-control" onchange="check()">
    <option>RNC_cliente</option>
    <option>NCF</option>
    <option>Fecha</option>
  </select>
  </div>

    <div class="col-sm-2">
    <label for="valor" id="labelvalor">Valor:</label>
    </div>

    <div class="col-sm-3">
    <input type="text" size="20" name="valor" required id="valor"  class="form-control">
    </div>

    <div class="col-sm-2">
    <button type="submit" class="btn btn-default" id="btfiltrar">Filtrar</button>
    </div>

</div>
<br>
<div class="row" id="fechas" style="display:none;">

<div class="col-sm-1"></div>
<div class="col-sm-10">
<div class="col-sm-2"><b>Fecha 1:</b></div> 
<div class="col-sm-4">
<input type="date" name="fecha1" id="fecha1"  class="form-control">
</div>
<div class="col-sm-2"><b>Fecha 2:</b></div> 
<div class="col-sm-4">
<input type="date" name="fecha2" id="fecha2"  class="form-control">
</div>
</div>
<div class="col-sm-1"></div> 
</div>



</div>
</center>
<br>
<?php

$this->getFactura();

}//end if
else
{
    include_once("log.php");	
	$L = new log();
}//end else



}//end construct


function getFactura()
{

$qry = "SELECT * FROM factura WHERE ID !=0 ORDER BY ID;";


if(isset($_GET["filtro"]) && $_GET["filtro"]=="NCF" && isset($_GET["valor"]))
{

    $qry = sprintf("SELECT * FROM factura WHERE NCF = '%s' ORDER BY ID;"
        ,$_GET["valor"]);
    
}//end if    
else if(isset($_GET["filtro"]) && $_GET["filtro"]=="RNC_cliente" && isset($_GET["valor"]))
{

    $qry = sprintf("SELECT * FROM factura WHERE Nombre_cliente =
        (SELECT Nombre FROM cliente WHERE RNC = '%s') ORDER BY ID;"
        ,$_GET["valor"]);
    
}//end if
else if(isset($_GET["fecha1"]) && isset($_GET["fecha2"]))
{

    $qry = sprintf("SELECT * FROM factura WHERE Fecha BETWEEN '%s' AND '%s' ORDER BY ID;"
        ,$_GET["fecha1"],$_GET["fecha2"]);
}//end if


    $STATEMENT = $this->con()->query($qry);
    
    if($STATEMENT->num_rows==0)
    {
        echo "<div class='alert alert-danger' style='margin: 50px auto;width: 442px;'>
              <strong>No existe!</strong> la factura.
              </div>";

    }//end if
    else
    {
        echo "<center>";
    echo "<table class='table' style='width:80%;'>";
    echo "<tr class='success'>";
    echo "<th>NCF</th>";
    echo "<th>RNC Cliente</th>";
    echo "<th>Total</th>";
    echo "<th>Fecha</th>";     
    echo "<tr class='active'>";

    $total_itbis=0;
    while($row = $STATEMENT->fetch_array())
        {

            echo "<td>".$row['NCF']."</td>";
            echo "<td>".$this->verificarRNC($this->getRNC($row['Nombre_cliente']))."</td>";
            echo "<td>".$this->FIX($row['Total'])."</td>";
            echo "<td>".$row['Fecha']."</td>";                 
            echo "<tr class='active'>";
            $total_itbis += $row["ITBIS"];
        
        }
    echo "</table>";
    echo "<h3 class='panel' style='width:80%;padding:10px;'>
    Total de impuestos en el periodo seleccionado: <b>RD$
    ".$this->FIX($total_itbis)."</b></h3>";
    echo "</center>";    
    $STATEMENT->close();
    $this->con()->close();

    }//end else

}//end getFactura

private function verificarRNC($val)
{
    if ($val=="" || $val =="0") 
        return "000000000";
    else
        return $val;   
}//end verificarRNC


}//end class
new verncf();
?>