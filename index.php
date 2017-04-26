<?php
include_once("plantilla.php");
class index extends plantilla
{

function __construct()
{


if(isset($_SESSION['ADM']))
{

//echo "Session iniciada";

$this->menu();
?>


<br><br><br>
<center>
<img src="IMAGENES/logo.png"/>
</center>


<?php 

}//end if
else
{
	include_once("log.php");	


}//end else


}//end construct

}//end class

new index();
?>
