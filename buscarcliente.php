<?php 
include_once("funciones.php");
include_once("plantilla.php");
class buscarcliente extends funciones
{

function __construct()
{

?>
<html>
<head>
<title>Buscar cliente</title>
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



<form method="post" action="buscarcliente.php">
  
  <label for="filtro">Filtrar por:</label>
  <select name="filtro" id="filtro">
    <option>Nombre</option>
    <option>Direccion</option>
    <option>Telefono</option>
    <option>RNC</option>
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
        $this->getClientesFull($_POST['filtro'],$_POST['valor']);
    }
}//end if
else
{
    $this->getClientesFull();
}

}//end if
else
{
    include_once("log.php");	
	$L = new log();
}//end else



}//end construct


function getClientesFull($filtro="",$valor="")
{
	$qry = "SELECT * FROM cliente ORDER BY ID;";
	if($filtro!=="" && $valor!=="")
	{
		$qry = "SELECT * FROM cliente  WHERE $filtro = '$valor' ORDER BY ID;";
	}
    $STATEMENT = $this->con()->query($qry);
    echo "<center>";
    echo "<table class='table table-responsive'>";
    echo "<tr class='success'>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>Direccion</th>";
    echo "<th>Correo</th>";
    echo "<th>Telefono</th>";
    echo "<th>RNC</th>";
    echo "<th>Fecha reg.</th>";
    echo "<th>Accion</th>";    
    echo "<tr class='active'>";
    while($row = $STATEMENT->fetch_array())
        {
        	echo "<td>".$row['ID']."</td>";
            echo "<td>".$row['Nombre']."</td>";
            echo "<td>".$row['Direccion']."</td>";
            echo "<td>".$row['Correo']."</td>";
            echo "<td>".$row['Telefono']."</td>";
            echo "<td>".$row['RNC']."</td>";
            echo "<td>".$row['Fecha']."</td>";
            echo "<td><a href='editcliente.php?action=edit&id=".$row['ID']."'>Editar</a> - 
                 <a href='DEL.php?from=buscarcliente.php&id=".$row['ID']."'>Borrar</a></td>";            
            echo "<tr class='active'>";
        
        }
    echo "</table>";
    echo "</center>";    
    //$STATEMENT->close();

}//end getClienteFull



}//end class
new buscarcliente();
?>