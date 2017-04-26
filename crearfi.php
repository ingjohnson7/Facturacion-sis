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


<table id="contenedor" align="center" bgcolor="white" border="0">

<td id="cabecera" align="center" bgcolor="white" colspan="2">
Guzman Johnson Electro Industrial SRL.
&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">Fecha:<b><?php echo date("d-m-Y");?></b></font>
<br><br>

Factura valida para credito fiscal NCF</font>
<input type="text" id="ncf" name="n1" readonly="true" value="<?php echo $M->NCF(2);?>">
</td>
<tr>
	<td colspan="2" align="center">
		<form action="faci.php" method="post">
Cliente:
<?php $M->getClientes();?>
</td>
<tr>
<td colspan="2" >

<table border="0">
    <tr>
        <td>Descripcion del ITEM:</td>
    <tr>
        <td><textarea rows="4" cols="35" name="n1"></textarea></td>
        <td>
            
Unidad
<select name="n2">
    <option>Pulgada</option>
    <option>Centimetro</option>
    <option>Pie</option>
    <option>Metro</option>
    <option>Libra</option>
    <select/><br><br>
Precio
<input type="text" name="n3" size="10" value="0">
        </td>
        <td>
Cantidad
<input type="text" name="n4" size="7" value="1">
<input type="submit" value="=>">
</td>
</table>
</form>
    
    <br>
<center>
Detalle de la factura:</center>

<table border="0" width="700" align="center" id="tabla1">
<tr>
	<td width="70"><b>Factura</b>
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
<?php $M->getDetail("crearfi.php");?>

</table>

</td>
<tr>
	<td colspan="2" align="center">

Total:
<input type="text" name="total" size="15" readonly="true" value="
<?php if($M->subTotal(2)>0){echo $M->FIX($M->subTotal(2));}else{echo 0;}?>"><br>

</td>

<tr>

<td colspan="2" align="center">
<a href="faci.php?fase=2" id="Boton1">Guardar y crear</a>

</td>
</table>

<?php 
}
else
{
    include_once("log.php");	
	$L = new log(); 
}
?>