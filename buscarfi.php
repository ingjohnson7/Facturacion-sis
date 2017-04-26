<?php 
include_once("funciones.php");
include_once("plantilla.php");
class buscarfi extends funciones
{

function __construct()
{

?>
<html>
<head>
<title>Buscar facturas sin ITBIS</title>
<link href="estilos.css" type="text/css" rel="stylesheet">


</head>
<?php 
if(isset($_SESSION['ADM']))
{


$P = new plantilla();
$P->menu();

?>

<br>
<center>
<button class="btn" data-toggle="collapse" data-target="#demo">Mostrar filtro</button>

<div id="demo" class="collapse">



<form method="post" action="buscarf.php">
  
  <label for="filtro">Filtrar por:</label>
  <select name="filtro" id="filtro">
    <option>Nombre_cliente</option>
    <option>NCF</option>
    <option>Fecha</option>
  </select>


    <label for="valor">Valor:</label>
    <input type="text" size="20" name="valor" id="valor">

  <button type="submit" class="btn btn-default">Filtrar</button>
</form>

</div>
</center>
<br>
<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if($_POST['filtro']!=="" && $_POST['valor']!=="")
    {
        $this->getFactura($_POST['filtro'],$_POST['valor']);
    }
}//end if
else
{
    $this->getFactura();
}

}//end if
else
{
    include_once("log.php");	
	$L = new log();
}//end else



}//end construct


function getFactura($filtro="",$valor="")
{
	$qry = "SELECT * FROM factura_i WHERE ID !=0 ORDER BY ID;";
	if($filtro!=="" && $valor!=="")
	{

		$qry = "SELECT * FROM factura_i WHERE $filtro = '$valor' ORDER BY ID;";
	}
    $STATEMENT = $this->con()->query($qry);
    
    if($STATEMENT->num_rows===0)
    {
        echo "<div class='alert alert-danger' style='margin: 50px auto;width: 442px;'>
              <strong>No existe!</strong> una factura con $filtro = $valor.
              </div>";

    }//end if
    else
    {
        echo "<center>";
    echo "<table class='table'>";
    echo "<tr class='success'>";
    echo "<th>ID</th>";
    echo "<th>NCF</th>";
    echo "<th>Cliente</th>";
    echo "<th>Total</th>";
    echo "<th>Fecha</th>";
    echo "<th>Estado</th>";
    echo "<th>Accion</th>";    
    echo "<tr class='active'>";

    
    while($row = $STATEMENT->fetch_array())
        {
        	echo "<td>".$row['ID']."</td>";
            echo "<td>".$row['NCF']."</td>";
            echo "<td>".$row['Nombre_cliente']."</td>";
            echo "<td>".$this->FIX($row['Total'])."</td>";
            echo "<td>".$row['Fecha']."</td>";
            echo "<td>".$row['Estado']."</td>";            
            echo "<td><a href='editarfi.php?action=edit&id=".$row['ID']."'>Editar</a>";
            echo "<a href='delf.php?from=buscarfi.php&id=".$row['ID']."'>-Eliminar</a>";          
            echo "<a href='creardoci.php?id=".$row['ID']."'>-Descargar</a>";                           
            if($row['Estado']==="PENDIENTE")
            {echo "-<a href='".$_SERVER['PHP_SELF']."?accion=pagar&id=".$row['ID']."'>Pagar</a></td>";}
            else
            {echo "-Pagar</td>";}  echo "<tr class='active'>";
        
        }
    echo "</table>";
    echo "</center>";    
    //$STATEMENT->close();

    }//end else

}//end getClienteFull



}//end class
new buscarfi();
?>