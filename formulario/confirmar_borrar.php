<?php 
echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";

echo "<pre>Get: ";
print_r($_GET);
echo "</pre>";


// Configuracion
$userFilename="usuarios.txt";

// Leer datos del archivo de usuarios
$datos=file_get_contents($userFilename);

// Pasar datos a un array
$arrayDatos=explode("\r",$datos);

// Leer posicion id del array
$usuario=$arrayDatos[$_GET['id']];

//Convertir en array
$usuario=explode("|",$usuario);

echo "<pre>";
print_r($usuario);
echo "</pre>";


if(!empty($usuario[8]))
	$pets=explode(',',$usuario[8]);
else
	$pets=array();

if(!empty($usuario[9]))
	$sports=explode(',',$usuario[9]);
else
	$sports=array();


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Confirmar Borrar</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="robots" content="noarchive,noindex">
<meta name="description" content="Formulario">
<meta name="keywords" content="Formulario">
</head>
<body>

<div id="wrapper">

<form action="procesar_delete.php" method="POST">
	<ul>
		<li>Id: <input type="hidden" name="id" value="<?= (isset($_GET['id']))?$_GET['id']:'1';?>"/></li>
		<li>Submit: <input type="submit" name="submit" value="Si"/></li>
		<li>Submit: <input type="submit" name="submit" value="No"/></li>
		
	</ul>
</form>



</div>

<div class="bottom">
</div>
</body>
</html>
