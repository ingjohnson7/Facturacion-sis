<?php 
include_once("funciones.php");
include_once("plantilla.php");
if(isset($_SESSION['ADM']))
{


$M = new funciones();
$P = new plantilla();
$P->menu();
?>
<br>

<body bgcolor="#FFEEDD">

<center>
<div class="container panel" style="border:solid 1px #000; border-radius:7px;background-color: #FFF; 
padding: 10px; width: 50%;">

<div class="row">
<div class="col-sm-12">
<h3>Guzman Johnson Electro Industrial</h3>

<font size="3">Fecha de factura:<b><?php echo date("d-m-Y");?></b></font>
<br><br>

Numero de NCF</font>
<input class="form-control" style="background-color: #FFF;" type="text" id="ncf" name="n1" readonly="true" value="<?php echo $M->NCF(1);?>">
<br>

<form action="fac.php" method="post">
Cliente:
<?php $M->getClientes();?>
<br>

<div class="row" style="">
<div class="col-sm-6">
Descripcion del ITEM:
<textarea rows="4" cols="35" name="n1" class="form-control"></textarea>
</div>
       
<div class="col-sm-3">
           
Unidad
<select name="n2" class="form-control">
    <option>No</option>    
    <option>Pulgada</option>
    <option>Centimetro</option>
    <option>Pie</option>
    <option>Metro</option>
    <option>Libra</option>
    <select/>
Precio
<input type="text" name="n3" size="10" value="0" class="form-control">
</div>
<div class="col-sm-3">
       
Cantidad
<input type="number" name="n4" size="7" value="1" max="20" class="form-control">
<input type="submit" value="=>" class="btn btn-success">
 </div>

</div>

</form>
 
    <br>

    <br>
<center>
Detalle de la factura:</center>

<table style="width:700;" class="table table-striped">
<tr>
	<th width="70"><b>Factura</b>
	</th>
	<th width="300"><b>Descripcion</b>
	</th>        
	<th width="70"><b>Unidad</b>
	</th>
	<th width="70"><b>Precio</b>
	</th>
	<th width="80"><b>Cantidad</b>
	</th>
	<th width="100"><b>Importe</b>
	</th>
	<th width="10"><b>X</b>
	</th>
	<tr>
<?php $M->getDetail("crearf.php");?>

</table>

<div class="row">
	
<div class="col-sm-4">
ITBIS RD$:<b>
<input type="text" class="form-control" name="itbis" size="15" readonly="true" value="
<?php if($M->subTotal()>0){echo $M->FIX($M->ITBIS($M->subTotal()));}else{echo 0;}?>"></b>
</div>
<div class="col-sm-4">
Sub total RD$:<b>
<input type="text" class="form-control" name="stotal" size="15" readonly="true" value="
<?php if($M->subTotal()>0){echo $M->FIX($M->subTotal());}else{echo 0;}?>"></b>
</div>
<div class="col-sm-4">
Total RD$:<b>
<input type="text" class="form-control" name="total" size="15" readonly="true" value="
<?php if($M->subTotal()>0){echo $M->FIX($M->Total($M->ITBIS($M->subTotal()),$M->subTotal()));}else{echo 0;}?>">	</b>	
</div>
</div>
<br><br>	
<a href="fac.php?fase=2" class="btn btn-primary">Crear</a>

</div>
<?php 
}
else
{
    include_once("log.php");	
	$L = new log(); 
}
?>