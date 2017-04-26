<?php 

include_once("funciones.php");
$M = new funciones();	
if($_SERVER['REQUEST_METHOD']=="POST")
{


    $M->addDetail($_POST['n1'],
               $_POST['n2'],
    	      $_POST['n3'],
    	      $_POST['n4']);
    if(isset($_POST['ncliente']) && $_POST['ncliente']!="")
    {
    	$_SESSION['Cliente'] = $_POST['ncliente'];
    }
	
 
}//end if 

if(isset($_GET['fase']))
{
	if(isset($_SESSION['Cliente']))
	{
		$M->addFactura($_SESSION['Cliente']);    

	}//end if
	else
	{
		echo "No se a especificado un cliente.";
	}//end else
	    

}//end if
else
{
	
	header("Location: crearf.php");
}//end else    
   

?>