<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; Filename=Guzman Johnson Electo Industrial - Factura.doc");

include_once("funciones.php");
$F = new funciones();
$C = $F->con();

$STM = $C->query("SELECT * FROM factura WHERE ID = ".$_GET['id'].";");

if($STM->num_rows > 0)
{
	$row = $STM->fetch_assoc();

function getDetail()
{
	
	$ID = $_GET['id'];
	$qry = "SELECT * FROM detalle WHERE ID_factura = $ID";
    $STATEMENT = $GLOBALS['C']->query($qry);
        
              
	if( $STATEMENT->num_rows > 0)
    {
	  while($row = $STATEMENT->fetch_assoc())
      {
	   	  echo "<td>".$row['ID_factura']."</td>";
		  echo "<td>".$row['Descripcion']."</td>";
		  echo "<td>".$row['Unidad']."</td>";
		  echo "<td>".$GLOBALS['F']->FIX($row['Precio'])."</td>";
		  echo "<td>".$row['Cantidad']."</td>";
	      echo "<td>".$GLOBALS['F']->FIX($row['Importe'])."</td><tr>";
	  }//end while
    
    }//end if
    //$STATEMENT->close();

}//end getDetail
function totales()
{
	$ID = $_GET['id'];
	$qry = "SELECT SUM(Importe) AS Total FROM detalle WHERE ID_factura = $ID;";
    $STM = $GLOBALS['C']->query($qry);
    $fila = $STM->fetch_array();
    $subt = $fila['Total'];
    $itbis = ($subt * 18)/100;
    $total = $GLOBALS['F']->FIX($subt+$itbis);  
    return array('subt' => $GLOBALS['F']->FIX($subt),
                 'itbis' => $GLOBALS['F']->FIX($itbis),
                 'total' => $total);
}//end totales

?>

<html>
<META charset="UTF-8">

<body>
	<head>
		<style>
.table1
{
	width:100%;
    color:#110000;
    font-family:Tahoma;
    font-size:18px;
    background-color:white;

}
#table2
{
   width:100%;
   border: none;
}
#table2 .table3 td
{
   color:#110000;
   font-family:Tahoma;
   font-size:17px; 
   border-top:solid 1px #000020;
   border-left:solid 1px #000020;
   border-bottom:solid 1px #000020;
   border-right: solid 1px #000020; 

}
#top
{
	width:100%;
	border:solid 2px black;
    color:#110000;
    font-family:Tahoma;
    font-size:18px;
    background-color:white;
    border-radius: 20px;
}
.table1 td
{
	padding:5px;
	border:solid 1px black;
}
#bot
{
	width:100%;
	vertical-align: bottom;
    color:#110000;
    font-family:Tahoma;
    font-size:18px;
    background-color:white;
    border-radius: 20px;
 
}

		</style>
	</head>

<table align="center" id="top">
<tr>
	<td align="left" width="70%">
		<b><font size="5">Guzmán Johnson Electro Industrial SRL.</font></b>
	</td>
	<td align="right" width="30%">
		<font size="2"><b>Fecha:</b><?php echo $row['Fecha'];?></font>
	</td>
	<tr>
	<td align="left" colspan="2">
		TEL: 849-227-2425, 809-688-0797  RNC: 131191568  
	</td>
     <tr>
	<td align="left" colspan="2">
		Email: gjelectroindustrial@gmail.com  
	</td>
	
	<tr>
	<td colspan="2">
		<i>C/ María Montez #74, Villa Juana D.N.</i><br>
	</td>
	<tr>
	<td colspan="2">
		<i>Factura con valor fiscal NCF: </i>
		<?php echo $row['NCF'];?>
	</td>
	<tr>
		<td colspan="2"><hr size="70%" color="black">
		</td>
		<tr>
			<td><b>Cliente:</b> <?php echo $row['Nombre_cliente'];?>
			</td>
			<td width="70%"><b>RNC:</b> <?php echo $F->getRNC($row['Nombre_cliente']);?>
			</td>

</table>
<br>
<center>
	<font size="4" face="Tahoma">Detalle factura:</font>
<br>
<table class="table1">
<tr>
	<td width="5%"><b>Factura</b>
	</td>
	<td width="30%"><b>Descripcion</b>
	</td>        
	<td width="8%"><b>Unidad</b>
	</td>
	<td width="9%"><b>Precio</b>
	</td>
	<td width="6%"><b>Cantidad</b>
	</td>
	<td width="12%"><b>Importe</b>
	</td>
	<tr>
<?php 
getDetail(); 
$TOTALES = totales();
?>
</table>

<br><br><br>
<table  id="table2">
	<tr><td align="right">

<table class="table3">

	<tr><td><b>Subtotal</b></td>
    <td><?php echo "   RD$ ".$TOTALES['subt']?></td>	
    <tr><td>
	<b>ITBIS(18%)</b></td>
	<td><?php echo "  RD$ ".$TOTALES['itbis']?></td>
    <tr><td>
    <b>Total</b></td>
	<td><?php echo "    RD$ ".$TOTALES['total']?></td>
	</tr>
</table>

</td>        
</table>

<br><br><br>
<table id="bot">
	<tr>
		<td align="left">Preparado por:<br>____________</td>
		<td align="right">Recibido por:<br>____________</td>
	
</table>


</center>
</html>
</body>

<?php 

}//end if
else
{
	echo "La factura con el ID = ".$_GET['id']." no existe";
}//end else

?>
