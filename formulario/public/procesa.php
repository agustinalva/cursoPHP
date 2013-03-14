<?php
require 'functions.php';
// Mostramos el contenido de $_POST y $_FILES en arrays
echo "<pre>";
print_r($_POST);
echo "<pre/>";

//echo "<hr/>";

echo "<pre>";
print_r($_FILES);
echo "<pre/>"; 

echo "<hr/>";


// Subimos la imagen (en principio la guarda en dir. temporal).
// Cambiamos la imagen de directorio
$uploads_dir = "/uploads"; 

$tmp_name = $_FILES["image"]["tmp_name"];
$name = $_FILES["image"]["name"];
$ruta =$_SERVER["DOCUMENT_ROOT"].$uploads_dir;
$url=$uploads_dir;
//move_uploaded_file($tmp_name, $ruta."/".$name);

// Al subir el archivo de la foto, si existe, que le cambie el nombre
// Ej. Nombre del fichero: file.php
// Comprobamos si el nombre existe en el directorio

$name = uploadAndRenameFile($tmp_name, $ruta, $name);


// Mostramos los datos en una columna tipo clave:valor
foreach ($_POST as $key => $value)
{
	echo $key.": ";
	if (is_array($value))
	{
		echo "<br>";
		foreach ($value as $value_2)		
			echo "- ".$value_2."<br>";		
	}
	else 	
		echo $value."<br>";		
}

foreach ($_FILES as $key => $value)
{
	echo $key.": ";
	if (is_array($value))
	{
		echo "<br>";
		foreach ($value as $key_2 => $value_2)		
			echo "- ".$key_2.": ".$value_2."<br>";		
	}
	else 	
		echo $value."<br>";		
}	

echo "<hr/>";

// Mostrar imagen
echo "<img src=\"".$url."/".$name."\" width=100px />";
	
echo "<hr/>";

// Mostramos los datos como queremos que se vean en el fichero
$string = stringFormated($_POST, $_FILES);
echo $string;

$file = "C:\\natalia.txt";

echo $file;

// Guardamos los datos en un fichero
if (writeToFile($string, $file))
	echo "Usuario añadido correctamente al archivo";	
else 
	echo "No se ha podido añadir al archivo el usuario";


// Otra forma de copiar al fichero
$file = "usuarios.txt";
$content = implode('|', $_POST);
$content .= "|".$name."\r";

file_put_contents($file, $content, FILE_APPEND);