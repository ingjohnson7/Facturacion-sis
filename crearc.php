<?php
include_once("funciones.php");
include_once("plantilla.php"); 
class crearc extends funciones
{

function __construct()
{


if(isset($_SESSION['ADM']))
{

$M = new funciones();
$P = new plantilla();
$P->menu();
?>
<br>

<body bgcolor="#FFEEDD">


<table id="contenedor" align="center" bgcolor="white" border="0">

<td id="cabecera" align="center" bgcolor="white" colspan="2">
Guzman Johnson Electro Industrial SRL.
&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">Fecha:<b><?php echo date("d-m-Y");?></b></font>
<br>
<h3>Cotizacion</h3>
</td>
<tr>
<td colspan="2" align="center">
		<form action="facc.php" method="post">
Cliente:
<?php $M->getClientes();?>
</td>
<tr>
<td colspan="2" >

<table border="0">
    <tr>
        <td>Descripcion del ITEM:</td>
    <tr>
        <td><textarea rows="4" cols="35" name="n1" class='form-control'></textarea></td>
        <td>
            
Unidad
<select name="n2" class='form-control'>
	<option>No</option>
    <option>Pulgada</option>
    <option>Centimetro</option>
    <option>Pie</option>
    <option>Metro</option>
    <option>Libra</option>
    <select/>
Precio
<input type="text" name="n3" size="10" value="0" class='form-control'>
        </td>
        <td>
Cantidad
<input type="text" name="n4" size="7" value="1" class='form-control'>
<input type="submit" value="=>" class='form-control'>
</td>
</table>
</form>
    
    <br>
<center>
Detalle:</center>

<table border="0" width="700" align="center" id="tabla1" class='table table-responsive'
<tr>
	<td width="70"><b># Cot.</b>
	</td>
	<td width="300"><b>Descripcion</b>
	</td>        
	<td width="70"><b>Unidad</b>
	</td>
	<td width="70"><b>Precio</b>
	</td>
	<td width="80"><b>Cantidad</b>
	</td>
	<td width="100"><b>Importe</b>
	</td>
	<td width="10"><b>X</b>
	</td>
	<tr>
<?php $M->getDetailc();?>

</table>

</td>
<tr>
	<td colspan="2" align="center">

ITBIS:
<input type="text" name="itbis" size="15" readonly="true" value="
<?php if($M->subTotal(3)>0){echo $M->FIX($M->ITBIS($M->subTotal(3)));}else{echo 0;}?>">
Sub total:
<input type="text" name="stotal" size="15" readonly="true" value="
<?php if($M->subTotal(3)>0){echo $M->FIX($M->subTotal(3));}else{echo 0;}?>">
Total:
<input type="text" name="total" size="15" readonly="true" value="
<?php if($M->subTotal(3)>0){echo $M->FIX($M->Total($M->ITBIS($M->subTotal(3)),$M->subTotal(3)));}else{echo 0;}?>"><br>

</td>

<tr>

<td colspan="2" align="center">
<a href="fac.php?fase=2" id="Boton1">Guardar y crear</a>

</td>
</table>

<?php 
}//end if
else
{
    include_once("log.php");	
	$L = new log(); 
}//end else

}//end construct


}//end class

new crearc();

?>