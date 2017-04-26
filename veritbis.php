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
$P->menu("Ver impuestos acumulados");

?>
<script>

$(document).ready(function(){
    $("#btfiltrar").click(function()
        {
            var ur ="";
            if ($("#fecha1").val()!=="" & $("#fecha2").val()!="") 
            {
            
                var pieces1 = $("#fecha1").val().split('/');
                pieces1.reverse();
                var f1 = pieces1.join('/');

                var pieces2 = $("#fecha2").val().split('/');
                pieces2.reverse();
                var f2 = pieces2.join('/');

                ur = "veritbis.php?fecha1="+f1+"&fecha2="+f2;
                
            }            
            else
            {
                alert("Las fechas no pueden ser nulas.");
            }
            if (ur!="") {window.location.assign(ur);}
            
        });
 });


</script>

<br>
<center>

<div id="demo" class="panel" style="width:60%;padding:20px;">

 <h4>Filtrar por fecha</h4>

<br>

<div class="row" id="fechas" >


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



    <div class="col-sm-2">
    <button type="submit" class="btn btn-default" id="btfiltrar">Filtrar</button>
    </div>

</div>
<br>


</div>
<button class="btn btn-info" id="descargarrelacion" onclick="">Descargar</button>

</center>
<br>
<?php
if (isset($_GET["fecha1"])) 
{ $this->getFactura(); }//end if

}//end if
else
{
    include_once("log.php");	
	$L = new log();
}//end else



}//end construct


function getFactura()
{

$qry = "";

if(isset($_GET["fecha2"]) && $_GET["fecha2"]!=="")
{

    $qry = 
    sprintf("SELECT SUM(ITBIS) AS TOTAL_ITBIS FROM factura WHERE Fecha BETWEEN '%s' AND '%s' ORDER BY ID;"
        ,$_GET["fecha1"],$_GET["fecha2"]);
}//end if
else
{
    echo "Las fechas no pueden ser nulas";
    exit();
}

    $STATEMENT = $this->con()->query($qry);
    
    if($STATEMENT->num_rows==0)
    {
        echo "<div class='alert alert-danger' style='margin: 50px auto;width: 442px;'>
              <strong>No existen </strong> facturas en ese periodo.
              </div>";

    }//end if
    else
    {
        $row = $STATEMENT->fetch_array();
        echo "<center><div class='panel' style='width:60%;padding:10px;'><h4>";
        echo "El total de ITBIS en el periodo de ".$_GET["fecha1"]." y ".$_GET["fecha2"]." es de: ";        
        echo "<b>".$this->FIX($row['TOTAL_ITBIS'])."</b>";
        echo "</h4></div></center>";
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