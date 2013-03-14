<?php
/**
 * Users Controller
 * 
 * @version 1.0 
 * 
 */

if(isset($_GET['action']))
	$action=$_GET['action'];
else 
	$action = 'select';

// Read config
$config=parse_ini_file('../application/configs/config.ini',true);
$config=$config['production'];
// $config = ReadConfig ('../application/configs/config.ini', 'development');


// Include Gateways
include_once('../application/models/dataGatewayMysql.php');

// Include actionHelpers
include_once('../application/controllers/helpers/actionHelpersFunctions.php');
include_once('../application/controllers/helpers/viewFunctions.php');


// Include viewHelpers
include_once('../application/views/helpers/helpersFunctions.php');

// Include Models
include_once('../application/models/files/functions.php');
include_once('../application/models/files/filesFunctions.php');
include_once('../application/models/users/usersFunctions.php');



switch ($action)
{
	case 'insert':
		if($_POST)
		{						
			$id=insertUser($config, $_POST);
			header('Location: /users.php');
			exit;
		}
		else
		{	
			ob_start();
				$user=initUser();
				include_once('../application/views/forms/user.php');
			$content=ob_get_clean();
			ob_end_flush();
		}
	break;
	
	case 'update':
		if($_POST)
		{
			updateUser($_GET['id'], $config, $_POST);			
			header('Location: /users.php');
			exit;
		}
		else 
		{
			ob_start();
				$user=readUser($_GET['id'], $config, $_POST);
				include_once('../application/views/forms/user.php');
			$content=ob_get_clean();
			ob_end_flush();
		}
	break;
	
	case 'delete':
		if($_POST)
		{
			if($_POST['submit']=='Si')
				deleteUser($_GET['id'],$config);
			header('Location: /users.php');
			exit;
		}
		else 
		{
			ob_start();
				$user=readUser($_GET['id'], $config);
				include_once('../application/views/users/delete.php');
			$content=ob_get_clean();
			ob_end_flush();
		}
	break;
		
	case 'select':
		$users=readUsers($config);
		$viewVars=array('users'=>$users,
						'title'=>'Usuarios de la aplicación');
		$content=renderView($config, 'users/select.php', $viewVars);		
	break;	
	
	default:
		echo "Esto default";
	break;	
}

$layoutVars=array('content'=>$content,
				  'title'=>'Mi application');
$layout=renderLayout($config, "layout.php", $layoutVars);

echo $layout;









