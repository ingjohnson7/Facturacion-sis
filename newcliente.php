<link rel="stylesheet" href="estilosCliente.css" type="text/css">

<?php
include_once("funciones.php");
include_once("plantilla.php"); 
if(isset($_SESSION['ADM']))
{


$M = new funciones();
$P = new plantilla();
$P->menu();

?>

<!-- 
Design register pure CSS
Developed by @mrjopino
-->
<br>
<h2>REGISTRAR CLIENTE</h2>
<div class="Registro">
<form method="post" action="newcliente.php">

<span class="fontawesome-user"></span>
<input type="text" required placeholder="Nombre de cliente" name="nombre" autocomplete="off">

<span class="fontawesome fa-car"></span>
<input type="text" id="direccion" required placeholder="Direccion" name="direccion" value="no" autocomplete="off">

<span class="fontawesome-envelope-alt"></span>
<input type="text" id="correo" required placeholder="Correo" name="correo" value="@.com" autocomplete="off">

<span class="fontawesome-phone"></span>
<input type="text" id="telefono" required placeholder="Telefono" name="telefono" value="8090000000" autocomplete="off">

<span class="fontawesome-envelope-alt"></span>
<input type="text" id="rnc" required placeholder="RNC" name="rnc" autocomplete="off">

<input type="submit" value="Guardar" title="Registra tu cuenta">
</form>
</center>


<?php	


if($_SERVER['REQUEST_METHOD']==="POST")
{
		$M->addCliente($_POST['nombre'],
			$_POST['direccion'],
			$_POST['correo'],
			$_POST['telefono'],
			$_POST['rnc']);


}//end if



}//end if
else
{
    include_once("log.php");	
	$L = new log();
}//end else

?>