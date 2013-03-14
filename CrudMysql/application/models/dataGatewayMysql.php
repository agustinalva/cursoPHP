<?php



/**
 * Read users from mysql
 * @param array $config
 * @throws Exception
 * @return array: $users | FALSE
 */
function readUsers($config)
{
	$cnx=connectDB($config);
	$query = "SELECT * FROM users";
	$result=mysqli_query($cnx,$query);
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$users [] = $row;
	}
	return $users;
}

/**
 * Connect to Mysql
 * @param array $config
 * @return resource $cnx
 */
function connectDB($config)
{
	// Conectar al servidor de DB
	$cnx = mysqli_connect($config['db.server'],$config['db.user'],
						  $config['db.password'],$config['db.database']);
	// Conectar a la BD
	//mysqli_select_db($config['db.database']);
	
	return $cnx;
}

/**
 * Disconnect from Mysql 
 * @param unknown $cnx
 */
function disconnectDB($cnx)
{
	mysqli_close($cnx);
	return;
}

/**
 * Read id user from mysql 
 * @param int $id
 * @param array $config
 * @return array $user
 */
function readUser($id, $config)
{
	// Conectar al servidor y la DB
	$cnx = mysqli_connect($config['db.server'],$config['db.user'],
			$config['db.password'],$config['db.database']);
	// Leer el usuario id
	$query="SELECT * FROM users WHERE iduser=".$id;
	$result=mysqli_query($cnx,$query);
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$user [] = $row;
	}
	
	// FIXME: --5.03.13--acl--Normalizar la base de datos
	$user[0]['pets']=explode(',',$user[0]['pets']);
	
	
	
	$query="SELECT * FROM users_has_sports WHERE users_iduser=".$id;
	
	echo $query;
	$result=mysqli_query($cnx,$query);
	$user[0]['sports']=mysqli_fetch_assoc($result);
	
	return $user[0];
	
	
	// Retornar un array 	
}

/**
 * Delete user from mysql
 * @param int $id
 * @param array $config
 * @return void;
 */
function deleteUser($id,$config)
{

}

/**
 * Update id user into mysql 
 * @param int $id
 * @param array $config
 * @param array $data
 */
function updateUser($id,$config, $data)
{
	// Conectar al servidor y a la DB
	
	// Actualizar usuario
	
	// Actualizar deportes del usuario
	
	
	
	
}

/**
 * Insert user into mysql
 * @param array $config
 * @param array $data
 * @return int $id
 */
function insertUser($config, $data)
{
	// Conectar al servidor y a la DB	
	$cnx = mysqli_connect($config['db.server'],$config['db.user'],
						  $config['db.password'],$config['db.database']);
	
	
	$data['photo']=insertPhoto($config['uploadDirectory']);
	
	echo "<pre>data:";
	print_r($data);
	echo "<pre>";
	
	// Insertar el usuario
	$query="INSERT INTO users SET 
				name = '".$data['name']."',
				email = '".$data['email']."', 
				password = '".$data['password']."',
				address = '".$data['address']."',
				description = '".$data['description']."',
				pets = '".implode(',',$data['pets'])."',
				photo = '".$data['photo']."',
				genders_idgender = ".$data['sex'].", 
				cities_idcity = ".$data['city']."
			";
	
	mysqli_query($cnx, $query);
	$id=mysqli_insert_id($cnx);
	

	// Insertar los deportes del usuario
	foreach ($data['sports'] as $key => $value)
	{	
		$query2="INSERT INTO users_has_sports SET
					users_iduser =".$id.",
					sports_idsport =".$value."
				";
		
		mysqli_query($cnx, $query2);
	}
		
	// Retornar el id de usuario
	
	return $id;
}

/**
 * Initialize user
 * 
 * @return array $user
 */
function initUser()
{
	$user=array(
			'name'=>'',
			'email'=>'',
			'password'=>'',
			'description'=>'',
			'address'=>'',
			'pets'=>array(),
			'sports'=>array(),
			'genders_idgender'=>'',
			'cities_idcity'=>''
	);
	return $user;
}

