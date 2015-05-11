<head>
	<title></title>
</head>
<body>
<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "prueba2";
 
	

    function conectarBaseDeDatos($host, $user, $pass, $db) {
            return (mysql_connect($host, $user, $pass) && mysql_select_db($db));
    }
     
    if (conectarBaseDeDatos($host, $user, $pass, $db)) 
            echo "Conectado exitosamente";
     else 
            echo "Error al conectarse a la base de datos";
    


	
 ?>
 
 
</body>
</html>