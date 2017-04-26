<?php 
include_once("funciones.php");
include_once("plantilla.php");
class editarf extends funciones
{

function __construct()
{

if(isset($_SESSION['ADM']))
{


$P = new plantilla();
$P->menu();
$C = $this->con();

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_SESSION['id']))
    {
        
        echo $_SESSION['id'];
    }//end if

    
    $this->updateF($_POST['ncf'],$_POST['cliente'],$_POST['fecha'],$_SESSION['id']);
    
}//end if
else if(isset($_GET['action']) && $_GET['action']==="edit")
{
if(!isset($_SESSION['id']))
{
    $_SESSION['id']=$_GET['id'];
    //echo $_SESSION['id'];
}//end if


    $qry = "SELECT * FROM factura WHERE ID = ".$_SESSION['id'];  
    
    $STATEMENT = $this->con()->query($qry);
    if($STATEMENT->num_rows > 0)
    {
        $row = $STATEMENT->fetch_array();
        echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
        echo "<center>";
        echo "<table class='table' style='width:400px;'>";
        echo "<tr class='success'>";
        echo "<th>ID</th>";
        echo "<td>".$row['ID']."</td><tr>";
        echo "<th>NCF</th>";
        echo "<td><input type='text' name='ncf' value='".$row['NCF']."'></td><tr>";        
        echo "<th>Cliente</th>";
        echo "<td><input type='text' name='cliente' value='".$row['Nombre_cliente']."'></td><tr>";     
        echo "<th>Total</th>";
        echo "<td>".$row['Total']."</td><tr>";
        echo "<th>Fecha</th>";        
        echo "<td><input type='text' name='fecha' value='".$row['Fecha']."'></td><tr>";
        echo "<th><input type='submit' class='btn'></th>";        
        

    echo "</table>";
    echo "</center>";    
    echo "</form>";
    //$STATEMENT->close();

        
    }//end if
    else
    {

        echo "<div class='alert alert-danger' style='margin: 50px auto;width: 442px;'>
              <strong>No existe!</strong> la factura.
              </div>";


    }//end else
    $STATEMENT->close();
       
}//end else if
?>
<center>
<button class="btn" data-toggle="collapse" data-target="#demo">Mostrar detalles</button>

<div id="demo" class="collapse">
HIDE mE!!!!
</div>
</center>



<?php

}//end if
else
{
    include_once("log.php");	
	$L = new log();
}//end else



}//end construct


function updateF($filtro="",$valor="")
{
if(isset($_POST['cliente']) && $_POST['cliente']!=="" &&
        isset($_POST['ncf']) && $_POST['ncf']!=="" &&
        isset($_POST['fecha']) && $_POST['fecha']!=="")
    {

     
     $C = $this->con();
     $id = $_SESSION['id'];                          

                        
                $qry = "UPDATE factura SET NCF = ?, Nombre_cliente = ?, Fecha = ? WHERE ID = ?;";
                $n1 = $_POST['ncf'];
                $n2 = $_POST['cliente'];
                $n3 = $_POST['fecha'];

                $STATEMENT = $C->prepare($qry);                
                $STATEMENT->bind_param("sssi",$n1,$n2,$n3,$id);                
                $STATEMENT->execute();
                
                if($STATEMENT->affected_rows > 0)
                {
                     echo "<div class='alert alert-success' style='margin: 50px auto;width: 442px;'>
                           <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                           <strong>Exito!</strong> La factura se actualizo con exito.
                           </div>";
                     $STATEMENT->close();
                     if(isset($_SESSION['id'])){unset($_SESSION['id']);} 
                }
                else
                {
                     echo "<div class='alert alert-danger' style='margin: 50px auto;width: 442px;'>
                           <strong>Error!</strong> ocurrio un error al guardar la factura.
                           </div>";
                }
    }//end if           


}//end updateF



}//end class
new editarf();
?>