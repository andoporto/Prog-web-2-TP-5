<html>
	<head>
		<title>Formulario de registro</title>
	</head>
	<body>
		<h2>Ingrese sus datos</h2>
		<form action="registracion.php" method="POST">
			<p><label for="nombre">Nombre: </label><br>
			<input type="text" name="nombre"></p>
			<p><label for="apellido">Apellido: </label><br>
			<input type="text" name="apellido"></p>		
			<p><label for="email">Email: </label><br>
			<input type="text" name="email"></p>
			<p><label for="dni">DNI: </label><br>
			<input type="text" name="dni"></p>
		    <label for="sexo">Sexo: </label><br>                                          
	            <select name="sexo" id="ubicacion">
	                <option value="" selected="selected">-</option>
	                <option value="F">Femenino</option>
	                <option value="M">Masculino</option>      
	          	</select>
	          	<br /><br />
	          	Fecha
	        <input type="text" name="dia" size="2">
				<input type="text" name="mes" size="2">
				<input type="text" name="anio" size="4">
				<br>	
			
			<p><input type="submit" value="Registrarse" name="submit"></p>
			<p><input type="reset" value="Limpiar"></p>
		</form>	
		<?php
			if(isset($_POST["submit"]))
			{
				$nombre = trim($_POST["nombre"]);
				$apellido = trim($_POST["apellido"]);
				$email = trim($_POST["email"]);
				$sexo = trim($_POST["sexo"]);
				$dni = trim($_POST["dni"]);			
				$dia= trim($_POST["dia"]);
				$mes= trim($_POST["mes"]);
				$anio= trim($_POST["anio"]);
				$response = array();
				if($nombre == "" or $apellido == "" or $dni == "" or $email == "" or $sexo == "" or $dia== 0 or $mes== 0 or $anio== 0)
					$response[] = "Debes completar todos los campos";
				if((strlen($nombre) < 5)||(strlen($nombre) > 10))
					$response[] ="El nombre debe tener entre 5 y 10 caracteres";
				if(!(filter_var($nombre, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z]*$/"))))) 
					$response[]="Se deben ingresar solo letras";
				if((strlen($apellido) < 5)||(strlen($apellido) > 10))
					$response[] ="El apellido debe tener entre 5 y 10 caracteres";
				if(!(filter_var($apellido, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z]*$/"))))) 
					$response[]="Se deben ingresar solo letras";				
				if(!is_numeric($dni))
					$response[]="Debe tener solo numeros";
				if(!filter_var($email,FILTER_VALIDATE_EMAIL ))
					 "El email no es valido";
				if (!(checkdate($_REQUEST['mes'],$_REQUEST['dia'],$_REQUEST['anio'])))
			  		$response[] = "La fecha no es valida";
				if(empty($response)) 
					echo "<p> Sus datos se han enviado correctamente</p>"; 
				else
				{
					foreach($response as $r) 
					echo "Errores: ".$r."<br>"; 
				}
			}
		?>
		
	</body>
</html>