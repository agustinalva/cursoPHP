<?php

echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";

echo "<pre>File: ";
print_r($_FILES);
echo "</pre>";

// Configuracion
$usersFilename="usuarios.txt";
include_once 'functions.php';

// Si NO no borrar
if($_POST['submit']=='No')
{
	header('Location: /usuarios.php');
	exit;
}

// Si SI borrar

// Leer datos de archivo usuarios
$datos=file_get_contents($usersFilename);

// Convertir en arrray datos
$datos=explode("\r", $datos);

// Tomar el usuario y extraer la imagen
$user=explode("|",$datos[$_POST['id']]);
$name=$user[11];

// Borrar la imagen
$uploads_dir = "/uploads";
$ruta = $_SERVER['DOCUMENT_ROOT'].$uploads_dir;
unlink($ruta."/".$name);

// Quitar la linea de datos
unset($datos[$_POST['id']]);


// Convertir en string datos
$datos=implode("\r",$datos);

// Reescribir el archivo usuarios
file_put_contents($usersFilename, $datos);
