<?php 

echo "";

//Configuracion
$userFilename="usuarios.txt";


// leer datos del archivo
$datos=file_get_contents($userFilename);

//Pasar datos a un array
$arraydatos = explode("/r", $datos);

// lee posición "id"
$usuario= $arraydatos[$_GET['id']];

// convertir en array




?>

<!DOCTYPE html>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<body>	
		<h1>Mi formulario</h1>		
		<form action="procesa.php" method="post" enctype="multipart/form-data" >		
			<div style="color:#0000FF">			
				Id.: <input type="hidden" name="id" value="01"><br><br>
				Nombre: <input type="text" name="name" value="<?= ($usuario[1]!='')?$suario[1]:" "?>"><br><br>
				Email: <input type="text" name="email" value="<?= ($usuario[2]!='')?$suario[2]:" "?>" ><br><br>
				Contraseña: <input type="password" name="password"><br><br>
				Dirección: <input type="text" name="direction" value="<?= ($usuario[4]!='')?$suario[4]:" "?>"><br><br>
				Descripción: <textarea name="description"></textarea><br><br>
				Sexo: <br><input type="radio" name="sex" value="male">Hombre<br>
					      <input type="radio" name="sex" value="female">Mujer<br>
					      <input type="radio" name="sex" value="others">Otros<br><br>
			    Ciudad: <select name="city">
						  <option value="coruna">A Coruña</option>
						  <option value="vigo">Vigo</option>
						  <option value="pontevedra">Pontevedra</option>
						  <option value="ourense">Ourense</option>
						</select><br><br> 
				Mascotas: <br><input type="checkbox" name="pets[]" value="perro">Perro<br>
						  <input type="checkbox" name="pets[]" value="gato">Gato<br>
						  <input type="checkbox" name="pets[]" value="caballo">Caballo<br><br>
			    Deportes: <br><select multiple name="sports[]">
								  <option value="futbol">Futbol</option>
								  <option value="baloncesto">Baloncesto</option>
								  <option value="balonmano">Balonmano</option>
								  <option value="tenis">Tenis</option>
							   </select><br><br>
				Imagen: <input type="file" name="image"><br><br> 
				<image scr="<?="/uploads/".$usuario[11];?> width=100px/>
				<input type="button" name="button" value="Button">
				<input type="submit" name="submit" value="Submit" >
				<input type="button" name="boton" value="Reset">					   		
			</div> 		
		</form>	
	</body>
</html> 