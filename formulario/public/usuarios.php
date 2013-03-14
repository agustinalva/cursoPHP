<!--  
<table border=1>
<tr>
  <th>id</th>
  <th>name</th>
  <th>email</th>
  <th>password</th>
  <th>address</th>
  <th>description</th>
  <th>sex</th>
  <th>city</th>
  <th>pets</th>
  <th>sports</th>
  <th>submit</th>
  <th>photo</th>
  <th>options</th>  
</tr>

<tr>
  <td>1</td>
  <td>a</td>
  <td>a</td>
  <td>a</td>
  <td>a</td>
  <td>a</td>
  <td>a</td>
  <td>a</td>
  <td>a</td>
  <td>a</td>
  <td>it</td>
  <td>1</td>
  <td>1</td>  
  <td><a href="#">update</a>&nbsp;<a href="#">delete</a></td>
</tr>
</table>

-->

<?php
// A partir del contenido de usuarios.txt crear tabla

// Configuracion
$file = "usuarios.txt";

// Leer fichero de datos
$content = file_get_contents($file);
$arrayFile = explode("\r", $content);

echo "<pre>";
print_r($arrayFile[0]);
echo "</pre>";


echo "	<a href=\"#\">Add</a>
  		<table border=1>
		<tr>
		  <th>id</th>
		  <th>name</th>
		  <th>email</th>
		  <th>password</th>
		  <th>address</th>
		  <th>description</th>
		  <th>sex</th>
		  <th>city</th>
		  <th>pets</th>
		  <th>sports</th>
		  <th>submit</th>
		  <th>photo</th>
		  <th>options</th>  
		</tr>";


 
// Recorrer para cada linea
foreach ($arrayFile as $key => $line)
{
	echo "<tr>";
	$arrayLine = explode("|", $line);
	// Recorrer para cada elemento
	foreach ($arrayLine as $key1 => $value)
	{
		echo "<td>";
		echo $value;
		echo "</td>";
	} 
	
	echo "<td><a href=\"formulario.php?id=".$key1."\">update</a>&nbsp;<a href=\"#\">delete</a></td>";
	
	echo "</tr>";
}

echo "</table>";

