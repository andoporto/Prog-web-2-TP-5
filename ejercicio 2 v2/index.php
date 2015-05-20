<head>
	<title></title>
</head>
<body>
<?php 

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "prueba2";
	
	$enlace = conectarBaseDeDatos($host,$user,$pass,$db);
	
	if($enlace)
		echo "Conectado exitosamente";
		
	echo '<br><br>';
	
	$cadena	= "SELECT * FROM productos WHERE idproductos > 3 AND idproductos < 100";
	$resultado=ejecutar($cadena,$enlace);
	$cadena	= "INSERT INTO productos (idproductos, barras,nombre,laboratorio,costo,venta) VALUES (50,'0' ,'Aerotina', 81, 0, 6),(200, '2', 'Platsul', 81, 0, 1.94)";
	$resultado=ejecutar($cadena,$enlace);
	
	echo '<br><br>';	

	
	 
	function conectarBaseDeDatos($host,$user,$pass,$db)
	{
		$link=mysql_connect($host,$user,$pass) or die("Error al conectarse al servidor");
		mysql_select_db($db) or die("Error al conectarse la base de datos");
		
		return $link;
	}	
	
	function ejecutar($cadena,$enlace)
	{
		$consulta = mysql_query($cadena,$enlace);
		$numerofilas = mysql_num_rows($consulta);
		if($numerofilas)
		{
			while ($fila = mysql_fetch_array($consulta))
				echo $fila['idproductos'] . " - " . $fila['barras'] . " - " . $fila['nombre']." - ".$fila['laboratorio']." - ".$fila['costo']." - ".$fila['venta'] . "<br>";			
		}
		$registros=mysql_affected_rows();	
		if($registros)
			echo "Registros dados de alta";
		else
			echo "no se pudo dar de alta";	
		
		
		return $consulta;			
	}
	
	
 ?>
 
 
</body>
</html>