<?php
/**
 * Functions that are used to generate the data
 * @author Natalia M. Rodriguez Rodriguez
 * @copyright 2013
 */

/**
 * This function returns the string to write in the file
 * @param array $post that contains the post variables 
 * @param array $files that contains the files
 * @return string to write in the file
 */
 
function stringFormated($post, $files)
{
	$dataString="";
	
	foreach ($post as $key => $value)
	{
		if (strcmp($key, "submit") != 0)
		{
			if (is_array($value))
			{
				foreach ($value as $value_2)
				{					
					if (next($value))						
						$dataString .= $value_2.", ";
					else						
						$dataString .= $value_2;
				}
			}
			else				
				$dataString .= $value;
				
			$dataString .= " | ";
		}
	}
	
	foreach ($files as $value)
	{
		if (is_array($value))
		{
			foreach ($value as  $value_2)
			{
				if (next($value))					
					$dataString .= $value_2.", ";
				else					
					$dataString .= $value_2;
			}
				
		}
	}	
	
	return $dataString."\n";
}

/**
 * This function writes a string into a file
 * @param string $string string to write into the file
 * @param string $file name of the file
 * @return true is the string is correctly written, false in other case
 */

function writeToFile($string, $file)
{		
	// Otra forma
	
	$fileWritten = TRUE;	
	if (!$handler = fopen($file, 'a')) 
	{
		$fileWritten = FALSE;
		echo "Error en fopen";
		return $fileWritten;			
	}

	if (fwrite($handler, $string) === FALSE) 
	{
		$fileWritten = FALSE;
		echo "Error en fwrite";
		return $fileWritten;
	}
				
	fclose($handler);
		
	return $fileWritten;
}

/**
 * This function uploads a file to a directory, renaming if exists
 * @param string $ruta path of the file
 * @param string $name name of the file 
 * @return TRUE
 */

function uploadAndRenameFile($tmp_name, $ruta, $name)
{	
	if (file_exists($ruta."/".$name))
	{	// si existe
	// Buscar nombre
	
	$a = 0;
	$path_parts = pathinfo($ruta."/".$name);
	// Mientras que Nombre-[contador].jqg exista en directorio, aumento contador
	while (file_exists($ruta."/".$name))
	{
		$a++;
		// Cambiar el nombre y volver a intentar
		$name = $path_parts['filename']."-".$a.".".$path_parts['extension'];
	}
	// Al salir tendre el contador que no existe
	// Subir el fichero al directorio con el Nombre-[contador].jpg
	move_uploaded_file($tmp_name, $ruta."/".$name);
	}
	{	// no existe
	// Subir el fichero al directorio con el mismo nombre
	move_uploaded_file($tmp_name, $ruta."/".$name);
	}	
	return $name;
}