<?php
class models_ws_ws
{

	function readUsers()
	{
		$model = new models_users_users($_SESSION['register']['config']);
		$users = $model->readUsers();
		
		return $users;
	}
	
}