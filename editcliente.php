<link href="estilosCliente.css" type="text/css" rel="stylesheet">

<?php
include_once("funciones.php");
include_once("plantilla.php");
class editcliente 
{
	function __construct()
	{
if(isset($_SESSION['ADM']))
{



$M = new funciones();
$P = new plantilla();
$P->menu();

if(isset($_GET['action']) && $_GET['action']=="edit")
{
	if(!isset($_SESSION['id']))
    {
        $_SESSION['id']=$_GET['id'];
        //echo $_SESSION['id'];
    }//end if


	$id = $_SESSION['id'];
	$STM = $M->con()->query("SELECT * FROM cliente WHERE ID = $id;");
	if($STM->num_rows > 0)
	{
		$row = $STM->fetch_assoc();
		//$this->estilos();
	}//end if
?>

<!-- 
Design register pure CSS
Developed by @mrjopino
-->
<title>Actualizar cliente</title>
<p class="texto">Actualizar datos cliente</p>
<div class="Registro">
<form method="post" action="editcliente.php">
Nombre
<input type="text" value="<?php echo $row['Nombre']?>" name="nombre" autocomplete="off">
Direccion
<input type="text" id="direccion" value="<?php echo $row['Direccion']?>" name="direccion" autocomplete="off">
Correo
<input type="text" id="correo" value="<?php echo $row['Correo']?>" name="correo" autocomplete="off">
Telefono
<input type="text" id="telefono" value="<?php echo $row['Telefono']?>" name="telefono" autocomplete="off">
<br>RNC<br>
<input type="text" id="rnc" value="<?php echo $row['RNC']?>" name="rnc" autocomplete="off">

<input type="submit" value="Guardar" title="Actualizar">
</form>
</center>


<?php	
}//end if GET
else
{
	echo "<h2>No se ha especificado un cliente.</h2>";
}//end else

if($_SERVER['REQUEST_METHOD']==="POST")
{
	if(isset($_POST['nombre']) && $_POST['nombre']!=="" &&
		isset($_POST['rnc']) && $_POST['rnc']!=="" )
	{

     
	 $C = $M->con();
	 $id = $_SESSION['id'];                          

		        		
		        $qry = "UPDATE cliente SET Nombre = ?, Direccion = ?, Correo = ?,
		         Telefono = ?, RNC = ? WHERE ID = ?;";
	            $n1 = $_POST['nombre'];
	            $n2 = $_POST['direccion'];
	            $n3 = $_POST['correo'];
	            $n4 = $_POST['telefono'];
	            $n5 = $_POST['rnc'];

	            $STATEMENT = $C->prepare($qry);                
                $STATEMENT->bind_param("ssssii",$n1,$n2,$n3,$n4,$n5,$id);                
                $STATEMENT->execute();
                
                if($STATEMENT->affected_rows > 0)
                {
                     echo "<div class='alert alert-success'>
                           <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                           <strong>Exito!</strong> El cliente se actualizo con exito.
                           </div>";
                     if(isset($_SESSION['id'])){unset($_SESSION['id']);} 
                     $STATEMENT->close();
		        }
		        else
		        {
	                 echo "<div class='alert alert-danger'>
                           <strong>Error!</strong> ocurrio un error al guardar el cliente.
                           </div>";
		        }
	}//end if nombre y rnc        

}//end if POST


}//end if SESSION
else
{
    include_once("log.php");	
	$L = new log();
}//end else

}//end construct

}//end class
new editcliente();