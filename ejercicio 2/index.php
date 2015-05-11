<head>
	<title></title>
</head>
<body>
<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "prueba2";
 
 
 function conectarBaseDeDatos($host,$user,$pass,$db)
	{
		mysql_connect($host,$user,$pass) or die("Error al conectarse al servidor");
		mysql_select_db($db) or die("Error al conectarse la base de datos");
	
		return $link;
	}
	
	$enlace = conectarBaseDeDatos($host,$user,$pass,$db);
	
	if($enlace)
		echo "Conectado exitosamente";
/*		
	$consulta = mysql_query('SELECT * FROM producto WHERE id > 5 AND id < 20' , $link);
	$fila = mysql_fetch_row($consulta);	
	
	$consulta2=	'INSERT INTO 'producto' ('idproductos', 'barras', 'nombre', 'laboratorio', 'costo', 'venta') VALUES
(50,"0" ,"Aerotina", 81, 0, 6),(200, '2', 'Platsul', 81, 0, 1.94',$link);
	*/
	while ($fila = mysql_fetch_array($consulta)) 
	{
		echo $fila['id'] . $fila['nombre'] . $fila['clave'] . "<br>";			
	}	
	
 ?>
 
 
</body>
</html>