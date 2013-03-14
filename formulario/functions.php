<?php

/**
 * Recibe un array, de máximo dos dimensiones,
 * y lo muestra por pantalla.
 *
 * @param array array de entrada
 * @return true
 */
function muestraArray($array)
{
	foreach ($array as $key => $value)
	{

		echo $key.": ";
		if(is_array($value))
		{
			/* Aqui hay que poner algo */
			// 			foreach ($value as $value2)
				// 				echo $value2.",";
			echo implode(',', $value);
		}
		else
		{
			echo $value;
		}
		echo "<br/>";
	}

	return TRUE;
}


/**
 * Upload a file to directory
 * @param array $arrayFiles
 * @return string $name
 */
function SubirArchivo($arrayFiles)
{
	$uploads_dir = "/uploads";
	$tmp_name = $arrayFiles["photo"]["tmp_name"];
	$name = $arrayFiles["photo"]["name"];
	$ruta = $_SERVER['DOCUMENT_ROOT'].$uploads_dir;
	$url = $uploads_dir;

	// Comprobar si el nombre existe en el diretorio
	if(file_exists($ruta."/".$name))
	{	// Si existe BuscarNombre
		$a=0;
		$path_parts = pathinfo($ruta."/".$name);
		// Mientras que Nombre-[contador].jpg EXISTA en directorio
		while(file_exists($ruta."/".$name))
		{
			// Aumento contador
			$a++;
			// Cambiar el nombre y volver a intenter
			$name=$path_parts['filename']."-".$a.".".$path_parts['extension'];
		}
		// Al salir tendre el contador que no existe
		// Subir el fichero al directorio con el nuevo nombre
		move_uploaded_file($tmp_name, $ruta."/".$name);
	}

	else	// No existe
	{
		// Subir el fichero al directorio con el mismo nombre
		move_uploaded_file($tmp_name, $ruta."/".$name);
	}
	
	return $name;
}


/**
 * Recibe un array, de máximo dos dimensiones,
 * y lo separa por comas.
 *
 * @param array array de entrada
 * @return array comma separated
 */
function cambiaArray($array)
{
	$array2 = array();
	
	foreach ($array as $key => $value)
	{
		if(is_array($value))
			$array2[]=implode(',', $value);
		else
			$array2[]=$value;				
	}
	return $array2;
}



