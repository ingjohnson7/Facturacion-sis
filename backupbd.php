<? 
// Nombre del archivo de con el cual queremos que se guarde la base de datos 
$filename = "C:\Respaldo.sql";  
// Cabezeras para forzar al navegador a guardar el archivo 
header("Pragma: no-cache"); 
header("Expires: 0"); 
header("Content-Transfer-Encoding: binary"); 
header("Content-type: application/force-download"); 
header("Content-Disposition: attachment; filename=$filename"); 

$usuario="root";  // Usuario de la base de datos, un ejemplo podria ser 'root' 
$passwd="";  // Contraseña asignada al usuario 
$bd="gje";  // Nombre de la Base de Datos a exportar 

// Funciones para exportar la base de datos 
$executa = "C:\\wamp\\bin\\mysql\\mysql5.6.17\\bin\\mysqldump.exe -u $usuario --password=$passwd --opt $bd"; 
system($executa, $resultado); 

// Comprobar si se a realizado bien, si no es asi, mostrará un mensaje de error 
if ($resultado) 
	{
	    echo "<H1>Error ejecutando comando: $executa</H1>\n"; 
	}
	else
	{//<script>window.location='index.php'</script>
		echo "Bien";
	} 

?>