<?php

include_once'funciones.php';    

class delf extends funciones
{

function __construct()
{

if(isset($_SESSION['ADM']))
{

if(isset($_GET['from']) && isset($_GET['from']))
{
    $_SESSION['from']=$_GET['from'];     
    $_SESSION['id']=$_GET['id'];
}    
?>

<center>
    <h2>Autorizacion para borrar</h2>
    <form action="delf.php" method="post">
    Introducir clave:<input type="password" name="pass">
    <input type="submit" name="enviar" value="Aceptar">
    </form>
</center>
<?php
if($_SERVER['REQUEST_METHOD']==="POST")
{
$C = $this->con();
$U = $_SESSION['ADM'];
$qry =  "SELECT Clave FROM user WHERE Nombre = '$U';";
//echo $qry."<br>";
$STM = $C->query($qry);
if($STM->num_rows>0)
{
    $fila = $STM->fetch_array();
    if($fila['Clave']===$_POST['pass'])
    {
        $this->borrarFactura();
    }//end if
    else
    {
        echo "Clave incorrecta: ".$fila['Clave'];
    }//end else

}//end if
else
{
    echo "la consulta no arrojo nada";
}//end else

}//end if POST


}//end if SESSION

}//end construct




function borrarFactura()
{

$to = $_SESSION['from'];
  $tabla ="";
    if($to==="buscarf.php")
        {
            $tabla="factura";
            $tabla2="detalle";
            $nameID = "ID_factura";
        }
    else if($to==="buscarfi.php")
        {
            $tabla="factura_i";
            $tabla2="detallei";
            $nameID = "ID_factura";
        }
    else if($to==="buscarc.php")
        {
            $tabla="cotizacion";
            $tabla2="detallec";
            $nameID = "ID_cotizacion";
        } 

$qry = "DELETE FROM $tabla WHERE ID = ?;";
 $C=$this->con();
 $STM = $C->prepare($qry);
 $STM->bind_param("i",$_SESSION['id']);
 $STM->execute();
    if($STM->affected_rows > 0)
    {
        $STM->close();
        $STM=$C->prepare("DELETE FROM $tabla2 WHERE $nameID = ?;");
        $STM->bind_param("i",$_SESSION['id']);
        $STM->execute();
        if($STM->affected_rows > 0)
        {
            if(isset($_SESSION['id']))
            {
                unset($_SESSION['id']);
                unset($_SESSION['from']);
            }//end if
            header("Location: $to");
        }//end if
        else
        {
            echo "Error al borrar detalle.";
        }//ene else 
                
    }//end if
    else
    {
        echo "Error";
        echo "$qry";
    }//end else
}//end BORRAR


}//end class
new delf();
?>