<?php
include_once("funciones.php");
$to = $_GET['from'];
  $tabla ="";
    if($to==="crearf.php")
        {$tabla="detalle";}
    else if($to==="crearfi.php")
        {$tabla="detallei";}
    else if($to==="crearc.php")
        {$tabla="detallec";} 
    else if($to==="buscarcliente.php")
        {$tabla="cliente";}

    $F = new funciones();

$C = $F->con();
 $qry = "DELETE FROM $tabla WHERE ID = ?;";
 $STM = $C->prepare($qry);
 $STM->bind_param("i",$_GET['id']);
 $STM->execute();
    if($STM->affected_rows > 0)
    {
        header("Location: $to");        
    }
    else
    {
        echo "Error";
        echo "$qry";
    }







?>