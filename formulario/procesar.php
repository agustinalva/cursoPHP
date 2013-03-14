<?php
echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";

echo "<pre>File: ";
print_r($_FILES);
echo "</pre>";

include_once 'functions.php';

muestraArray($_POST);

$uploads_dir = "/uploads";
$tmp_name = $_FILES["photo"]["tmp_name"];
$name = $_FILES["photo"]["name"];
$ruta = $_SERVER['DOCUMENT_ROOT'].$uploads_dir;
$url = $uploads_dir;

$name=SubirArchivo($_FILES);

// Mostar imagen
echo "<img src=\"".$url."/".$name."\" width=100px />";

$file = "usuarios.txt";

$array=cambiaArray($_POST);
$content=implode('|',$array);
$content.="|".$name."\r";

file_put_contents($file, $content, FILE_APPEND);





















