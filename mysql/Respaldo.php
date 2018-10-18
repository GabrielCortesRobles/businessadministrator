<?php 
/////////////// creamos la funcion para connectarnons a la bd 
function &get_conn() 
{ 
   global $conn; 
   $myServer = "(mysql.buscatureta.com)"; 
   $myUser   = "al7234725746"; 
   $myPass   = "al7845756344"; 
   $myDB     = "buscaturetabase";  
     
   if(!$conn) 
   { 
      $conn = mssql_connect($myServer, $myUser, $myPass) 
         or die("Couldn't connect to SQL Server on $myServer"); 
      mssql_select_db($myDB, $conn) 
         or die("Couldn't select database $myDB"); 
   } 
   return $conn; 
} 
     
// llamamos a la conexion 
$conn =& get_conn(); 

// preparamos el procedimiento  
$stmt=mssql_init("restore", $conn);  
//myprocedure = medallero en mi caso 
 /*    
// le entregamos los parametros esto para el procedimiento almacenado //medallero no se ocupa 
mssql_bind($stmt, "@id",    $id,    SQLINT4,    FALSE); 
mssql_bind($stmt, "@name",  $name,  SQLVARCHAR, FALSE); 
mssql_bind($stmt, "@email", $email, SQLVARCHAR, FALSE);     
*/

     
// lo ejecutamos 
$result = mssql_execute($stmt); 

// lo asociamos a unn valor de retornon 
$row = mssql_fetch_assoc($result); 
     
// a c1 le asignamos el valor de la tabla 
 $c1=$row["PAIS"]; 

//lo mostramos en pantalla 
echo    "".$c1; 

?>