<?php
include_once 'funciones.php';
class log extends funciones
{
 function __construct()
    {


    	if($_SERVER['REQUEST_METHOD']=="POST")
    	{
    		
     if(isset($_POST['us']) && !empty($_POST['us'])){
     if(isset($_POST['cl']) && !empty($_POST['cl'])){
         

$us = $_POST['us'];
$cl = md5($_POST['cl']);

$CON = $this->con();
$STM = $CON->prepare("SELECT Nombre FROM user WHERE Nombre = ? AND Clave = ?");
$STM->bind_param("ss",$us,$cl);
$STM->execute();
$STM->store_result();

$filas = $STM->num_rows;

if($filas>0)
{
	session_start();
  $_SESSION['ADM']=$us;
  header("Location: index.php");
  $STM->close();

}
else
{
echo "No existe!! #".$filas;
}


}//if POST cl

}//end if POST us


}//end if SERVER
else
{

?>

<!--login modal-->

   <div class="container well" style="width: 40%;">
     <center>
       <h3>Identificate</h3>
          <form class="form col-md-12 center-block" method="post" action="log.php">
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="us" placeholder="Nombre de usuario">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" name="cl" placeholder="Clave">
            </div>
            <div class="form-group">
              <input type="submit" value="Entrar" class="btn btn-primary btn-lg btn-block">
              </div>
          </form>
</center>
      </div>




<?php
}//end else SERVER     
     
     
}//end construct

}//end class

new log();
?>