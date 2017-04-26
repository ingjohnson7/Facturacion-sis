<link rel="stylesheet" type="text/css" href="bootstrap.css">

<?php
class funciones
{
    
    public function con()
    {
//$conex = new mysqli("sql207.eshost.com.ar","eshos_17312865","sliceoflif3","eshos_17312865_gje");
	    $conex = new mysqli("localhost","root","","gje");
        
        if ($conex->connect_error) 
            {
               die("Connection failed: " . $conex->connect_error);
            }
        return $conex;
    }//end function con
    
function FIX($number)
{
    $temp="";	
    $val = "";
    $tiene_punto =(substr_count($number, ".")>0)?true:false;
    
    if($tiene_punto)
	{
		//los numeros despues del punto
		$temp2 = substr($number, -2);
         
        //los numeros despues del punto sin el .
		$temp4 = substr($temp2, -2);

		 
		if(strstr($temp4, "."))
		{
			$temp4 = substr($temp4, -1)."0";
			
			//los numeros antes del punto
		    $temp1 = substr($number, 0,-2);
		  
		}
		else
		{
			//los numeros antes del punto
		    $temp1 = substr($number, 0,-3);
		  
		}
		
	    $temp3 = substr($number, 0,-3);
	    $temp = str_split($temp1);
	    $val2=".".$temp4;
	    
	}//end if
	else
	{
      	$temp = str_split($number);
      	$val2 = ".00";
	}//end else
	
	    if(count($temp) ==1 || count($temp)==2 || count($temp)==3)
		{
		    $val = implode($temp);			
		}
		else if(count($temp) ==4)
		{
			$val = $temp[0].",".$temp[1].$temp[2].$temp[3];
		}
		else if(count($temp) ==5)
		{
			$val = $temp[0].$temp[1].",".$temp[2].$temp[3].$temp[4];
		}
		else if(count($temp) ==6)
		{
			$val = $temp[0].$temp[1].$temp[2].",".$temp[3].$temp[4].$temp[5];
		}
		else if(count($temp) ==7)
		{
			$val = $temp[0].",".$temp[1].$temp[2].$temp[3].",".$temp[4].$temp[5].$temp[6];
		}
		$val.=$val2;

	return $val;
}//end FIX

   
function addDetail($n1,$n2,$n3,$n4,$tabla)
{
	if(!empty($n1)){
	if(!empty($n2)){
	if(!empty($n3)){
    if(!empty($n4)){

                $C = $this->con();
                $cod = 0;
		        $imp = $n3*$n4;
		        $id=0;
		        $qry="";
		        
    if($tabla==="factura_i")
	{
	    $id = $this->maxid(2);
        $qry = "INSERT INTO detallei VALUES (?,?,?,?,?,?,?);";
	            
    }//end if
	else
	{
		$id = $this->maxid(1);
        $qry = "INSERT INTO detalle VALUES (?,?,?,?,?,?,?);";	            
    }//end else
	
                
	            $STATEMENT = $C->prepare($qry);
                
                $STATEMENT->bind_param("iissddd",$cod,$id,$n1,$n2,$n3,$n4,$imp);
                
                $STATEMENT->execute();
                
                if($STATEMENT->affected_rows > 0)
                {
                     echo "bien";
                     $STATEMENT->close();
		        }
		        else
		        {
	                 echo "error";
		        }

    }else{
		echo "Ningun valor vacio!";
	}

                
	}else{
		echo "Ningun valor vacio!";
	}

	}else{
		echo "Ningun valor vacio!";
	}

	}else{
		echo "Ningun valor vacio!";
	}
}//end function addDetail

function getDetail($from){

	$C = $this->con();
	$ID = 0;
	$qry="";
	if($from==="crearfi.php")
	{
	    $ID = $this->maxid(2);				
		$qry = "SELECT * FROM detallei WHERE ID_factura = $ID;";
    }//end if
	else
	{
		$ID = $this->maxid(1);
		$qry = "SELECT * FROM detalle WHERE ID_factura = $ID;";
    }//end else
	    $STATEMENT = $C->query($qry);
        
              
	if( $STATEMENT->num_rows > 0)
            {
	while($row = $STATEMENT->fetch_assoc())
                {
		echo "<td>".$row['ID_factura']."</td>";
		echo "<td>".$row['Descripcion']."</td>";
		echo "<td>".$row['Unidad']."</td>";
		echo "<td>".$this->FIX($row['Precio'])."</td>";
		echo "<td>".$row['Cantidad']."</td>";
	    echo "<td>".$this->FIX($row['Importe'])."</td>";
		echo "<td><a href='DEL.php?id=".$row['ID']."&from=".$from."'>Del</a></td><tr>";
	        }
            }
            //$STATEMENT->close();

}//end function getDetail

//========================================COTIZACION


function getDetailc(){

	$C = $this->con();
	$ID = $this->maxid(3);
	$qry = "SELECT * FROM detallec WHERE ID_cotizacion = $ID;";
    $STATEMENT = $C->query($qry);
        
              
	if( $STATEMENT->num_rows > 0)
    {
	while($row = $STATEMENT->fetch_assoc())
        {
		echo "<td>".$row['ID_cotizacion']."</td>";
		echo "<td>".$row['Descripcion']."</td>";
		echo "<td>".$row['Unidad']."</td>";
		echo "<td>".$this->FIX($row['Precio'])."</td>";
		echo "<td>".$row['Cantidad']."</td>";
	    echo "<td>".$this->FIX($row['Importe'])."</td>";	
		echo "<td><a href='DEL.php?id=".$row['ID']."&from=crearc.php'>Del</a></td><tr>";
	    }//end while
    }//end if
            //$STATEMENT->close();

}//end function getDetailc


function addDetailc($n1,$n2,$n3,$n4)
{
	if(!empty($n1)){
	if(!empty($n2)){
	if(!empty($n3)){
    if(!empty($n4)){

                $C = $this->con();
                $cod = 0;
		        $imp = $n3*$n4;
		        
		        $id = $this->maxid(3);
        		$qry = "INSERT INTO detallec VALUES (?,?,?,?,?,?,?);";	            
   
	
                
	            $STATEMENT = $C->prepare($qry);
                
                $STATEMENT->bind_param("iissddd",$cod,$id,$n1,$n2,$n3,$n4,$imp);
                
                $STATEMENT->execute();
                
                if($STATEMENT->affected_rows > 0)
                {
                     echo "bien";
                     $STATEMENT->close();
		        }
		        else
		        {
	                 echo "error";
		        }

    }else{
		echo "Ningun valor vacio!";
	}

                
	}else{
		echo "Ningun valor vacio!";
	}

	}else{
		echo "Ningun valor vacio!";
	}

	}else{
		echo "Ningun valor vacio!";
	}
}//end function addDetailc


function addCotizacion($n1){
	if(!empty($n1))
	{
		$C = $this->con();	
		$fecha = date("d-m-Y");

			$id = $this->maxid(3);
			 
			$subt = $this->subTotal();
			$itbis = $this->ITBIS($subt);
		    $total = $this->Total($itbis,$subt);

		    $qry = "INSERT INTO cotizacion VALUES (?,?,?,?,?,?)";
		    $STM = $C->prepare($qry);
		    $STM->bind_param("isddds",$id,$n1,$itbis,$subt,$total,$fecha);
		
		
		$STM->execute();

		if($STM->affected_rows > 0)
		{
			echo "La cotizacion se guardo.<br>";
			echo "<a href='creardoc.php?id=".$id."'>Click aqui para descargar</a>";
		}//end if
		else
		{
			echo "<br>Error";
		}//end else	    
   



	}//end if 
	else
	{
		echo "Se debe especificar un cliente.!";
	}//end else
}//end function addCotizacion

    


//========================================END COTIZACION
function NCF($f=1)
{

    $tabla =($f==1)?"factura":"factura_i";    
    $C = $this->con();        
	$qry = "SELECT MAX(ID + 1) AS NCF FROM $tabla;";
	$STATEMENT = $C->query($qry);
    $row = $STATEMENT->fetch_assoc();
	$ncf=0;
	$temp = "A0100100101";

	if($tabla==="factura_i")
	{
		$temp = "A0100100114";
	}//end if
	
	if(strlen($row['NCF'])==1){
		$ncf = $temp."0000000".$row['NCF'];
	}else if(strlen($row['NCF'])==2){
		$ncf = $temp."000000".$row['NCF'];
	}else if(strlen($row['NCF'])==3){
		$ncf = $temp."00000".$row['NCF'];
	}else if(strlen($row['NCF'])==4){
		$ncf = $temp."0000".$row['NCF'];
	}else if(strlen($row['NCF'])==5){
		$ncf = $temp."000".$row['NCF'];
	}
    $STATEMENT->close();
	return $ncf;
}//end function NCF


function maxid($f=1){

    $tabla ="";
    if($f===1)
    {$tabla="factura";}
    else if($f===2)
    {$tabla="factura_i";}
    else if($f===3)
    {$tabla="cotizacion";} 
    
    $C = $this->con();        
	$qry = "SELECT MAX(ID + 1) AS ID FROM $tabla";
	$STATEMENT = $C->query($qry);
	
	    $row = $STATEMENT->fetch_array();
	//$STATEMENT->close();

	return $row['ID'];
}//end function maxid

function subTotal($tabla=1){
	$qry = "";
	if($tabla==1)
	{
		$qry = "SELECT SUM(Importe) AS Subtotal FROM detalle WHERE ID_factura = ".$this->maxid(1);	

	}//end if
	elseif($tabla==2)
	{
		$qry = "SELECT SUM(Importe) AS Subtotal FROM detallei WHERE ID_factura = ".$this->maxid(2);	
	}//end else
	elseif($tabla==3)
	{
		$qry = "SELECT SUM(Importe) AS Subtotal FROM detallec WHERE ID_cotizacion = ".$this->maxid(3);	
	}//end else
	$C = $this->con();
	$STATEMENT = $C->query($qry);
        $row = $STATEMENT->fetch_array();
        //$STATEMENT->close();
        return $row['Subtotal'];
}//en dfunction subTotal


function ITBIS($subTotal){
	$ITBIS = (18 * $subTotal)/100;
	return $ITBIS;
}//end function ITBIS

function Total($ITBIS,$subTotal){
	$Total = $ITBIS + $subTotal;
	return $Total;
}//end funtion Total

function addCliente($n1,$n2,$n3,$n4,$n5)
{

	            $C = $this->con();
	            $id = 0;
                $fecha = date("d-m-Y");

		        //print "$id,$n1,$n2,$n3,$n4,$n5,$fecha<br>";		
		        $qry = "INSERT INTO cliente VALUES (?,?,?,?,?,?,?);";
	            

	            $STATEMENT = $C->prepare($qry);                
                $STATEMENT->bind_param("issssis",$id,$n1,$n2,$n3,$n4,$n5,$fecha);                
                $STATEMENT->execute();
                
                if($STATEMENT->affected_rows > 0)
                {
                     echo "<div class='alert alert-success'>
                           <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                           <strong>Exito!</strong> El cliente se agrego con exito.
                           </div>";
                     $STATEMENT->close();
		        }
		        else
		        {
	                 echo "<div class='alert alert-danger'>
                           <strong>Error!</strong> ocurrio un error al guardar el cliente.
                           </div>";
		        }
    
}//end addCliente



function getClientes()
{
    $STATEMENT = $this->con()->query("SELECT Nombre FROM cliente ORDER BY ID;");
    echo "<select name='ncliente' class='form-control'>";
    while($row = $STATEMENT->fetch_array())
        {
          echo "<option>".$row['Nombre']."</option>";
        
        }
    echo "</select>";    
    $STATEMENT->close();
}//end function getClientes

function getRNC($cliente)
{
	
	$STM = $this->con()->query("SELECT RNC FROM cliente WHERE Nombre = '$cliente';");

		$row = $STM->fetch_array();
		return $row['RNC'];
	
}//end function getRNC

function addFactura($n1,$tabla="factura"){
	if(!empty($n1))
	{
		$C = $this->con();	
		$fecha = date("Y-m-d");
		$estado = "PENDIENTE";
		if($tabla==="factura_i")
		{			
			
			$id = $this->maxid(2);
			$ncf = $this->NCF(2); 
			$total = $this->subTotal(2);
			
            echo "$id,$ncf,$n1,$total,$fecha";
		 	$qry = "INSERT INTO factura_i VALUES (?,?,?,?,?,?)";
		    $STM = $C->prepare($qry);
	     	$STM->bind_param("issdss",$id,$ncf,$n1,$total,$fecha,$estado);
		
		}//end if
		else
		{

			$id = $this->maxid(1);
			$ncf = $this->NCF(1); 
			$subt = $this->subTotal();
			$itbis = $this->ITBIS($subt);
		    $total = $this->Total($itbis,$subt);

		    $qry = "INSERT INTO factura VALUES (?,?,?,?,?,?,?,?)";
		    $STM = $C->prepare($qry);
		    $STM->bind_param("issdddss",$id,$ncf,$n1,$itbis,$subt,$total,$fecha,$estado);
		
		}//end else
		
		$STM->execute();

		if($STM->affected_rows > 0)
		{
			echo "La factura se guardo.<br>";
			echo "<a href='creardoc.php?id=".$id."'>Click aqui para descargar</a>  -  ";
			echo "<a href='crearf.php'>Volver</a>";
		}//end if
		else
		{
			echo "<br>Error";
		}//end else	    
   
        $STM->close();
        $C->close();


	}//end if 
	else
	{
		echo "Se debe especificar un cliente.!";
	}//end else
}//end function addFactura

    
    
    
}
//$t = new funciones();
//echo $t->FIX(38680.4)."<br>";

?>