<?php
/**
 * Users Controller
 * 
 * @version 1.0 
 * 
 */

class controllers_usersController extends controllers_abstractController
{
	public function __construct()
	{
		
	}
	
	
	public function selectAction()
	{
		$model = new models_users_users($_SESSION['register']['config']);
		$users = $model->readUsers();
		
		$model = new models_ws_ws($_SESSION['register']['config']);
		$users = $model->readUsers();
		
		
		echo "<pre>Users: ";
		print_r($users);
		echo "</pre>";
		die;
		$viewVars=array('users'=>$users,
						'title'=>'Usuarios de la aplicación');
		$this->content=controllers_helpers_actionHelpers::renderView('users/select.php', $viewVars);
		return $this->content;
	}
	
	public function insertAction()
	{
		if($_POST)
		{
			$id=insertUser($config, $_POST);
			header('Location: /users/select');
			exit;
		}
		else
		{
			$user=initUser();
			$viewVars=array('user'=>$user,
					'title'=>'Delete Usuarios');
			$this->content=controllers_helpers_actionHelpers::renderView('forms/user.php', $viewVars);
			return $this->content;
		}
	}
	
	public function updateAction()
	{
		if($_POST)
		{
			updateUser($_REQUEST['id'], $config, $_POST);
			header('Location: /users/select');
			exit;
		}
		else
		{
			$user=readUser($_REQUEST['id'], $config);
			$viewVars=array('user'=>$user,
					'title'=>'Delete Usuarios');
			$this->content=controllers_helpers_actionHelpers::renderView('forms/user.php', $viewVars);
			return $this->content;
		}
	}
	
	public function deleteAction()
	{
		if($_POST)
		{
			if($_POST['submit']=='Si')
				deleteUser($_REQUEST['id'],$config);
			header('Location: /users/select');
			exit;
		}
		else
		{
			$user=readUser($_REQUEST['id'], $config);
			$viewVars=array('user'=>$user,
					'title'=>'Delete Usuarios');
			$this->content=controllers_helpers_actionHelpers::renderView('users/delete.php', $viewVars);
			return $this->content;
		}
	}
	
	public function indexAction()
	{
		
	}
	
	public function errorAction()
	{
		
	}
	
	public function debugAction()
	{
		
	}
	
}