<?php
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/style-menu.css" type="text/css" media="screen">
  <link rel="stylesheet" href="CSS/font-awesome/css/font-awesome.css" >
  <link rel="stylesheet" href="CSS/styles.css" type="text/css" media="screen">
  <link rel="stylesheet" href="CSS/estilos.css" type="text/css" >
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

  <script src="JS/menu.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
    <![endif]-->

<?php 
class plantilla
{
  public function menu($title="Facturacion")
  {
    echo "<title>$title</title>";
    ?>


</head>
  
 
 <div class="mainWrap">
 
    <nav>
    <ul class="menu">
   <li><a href="index.php"><i class="icon-home"></i>&nbsp;INICIO</a></li>
  <li><a  href="#"><i class="icon-print"></i>&nbsp;FACTURAS</a>
     <ul class="sub-menu">
     <li><a href="crearf.php">Crear</a></li>
     <li><a href="buscarf.php">Buscar</a></li>
     <li><a href="verncf.php">Ver relacion NCF</a></li>    
     <li><a href="veritbis.php">Ver impuestos</a></li>  
     </ul>
  </li>
  <li><a  href="#"><i class="icon-print"></i>&nbsp;FACTURAS SIN ITBIS</a>
     <ul class="sub-menu">
     <li><a href="crearfi.php">Crear</a></li>
     <li><a href="buscarfi.php">Buscar</a></li>
     </ul>
  </li>
  <li><a  href="#"><i class="icon-list"></i>&nbsp;COTIZACIONES</a> 
     <ul class="sub-menu">
   <li><a href="crearc.php">Crear</a></li>
   <li><a href="buscarc.php">Buscar</a></li>
   </ul>
  </li>
  <li><a  href="#"><i class="icon-user"></i>&nbsp;CLIENTES</a>
    <ul class="sub-menu">
   <li><a href="newcliente.php">Nuevo</a></li>
   <li><a href="buscarcliente.php">Buscar</a></li>
   </ul>
  </li>
  
  <li><a  href="config.php"><i class="icon-cog"></i>&nbsp;CONFIGURACIONES</a>
<ul class="sub-menu">
   <li><a href="backupbd.php">Respaldar BD</a></li>
   </ul>
  </li>
  <li><a  href="out.php"><i class="icon-off"></i>&nbsp;SALIR</a></li>
  </ul>
  </nav>
  
        
 </div><!--end mainWrap-->

    <?php
  }//end menu

}//end class
?>
 