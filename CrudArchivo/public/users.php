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
$userFilename=$config['production']['userFilename'];
$uploadDir=$config['production']['uploadDirectory'];

// Include Models
include_once('../application/models/files/functions.php');
include_once('../application/models/files/filesFunctions.php');
include_once('../application/models/users/usersFunctions.php');


switch ($action)
{
	case 'insert':
		if($_POST)
		{						
			$name=insertPhoto($uploadDir);
			$_POST[]=$name;			
			writeDataToFile ($userFilename, $_POST);			
			header('Location: /users.php');
			exit;
		}
		else
		{
			include_once('../application/views/forms/user.php');
		}
	break;
	
	case 'update':
		if($_POST)
		{
			$dataArray=readDataFromFile($userFilename);
			$user=$dataArray[$_GET['id']];					
			$name=updatePhoto($user[11], $uploadDir);			
			$_POST[]=$name;
			$dataArray[$_POST['id']]=$_POST;			
			writeDataToFile($userFilename, $dataArray, TRUE);			
			header('Location: /users.php');
			exit;
		}
		else 
		{
			$dataArray=readDataFromFile($userFilename);
			$usuario=$dataArray[$_GET['id']];		
			$pets=commaToArray($usuario[8]);
			$sports=commaToArray($usuario[9]);		
			include_once('../application/views/forms/user.php');
		}
	break;
	
	case 'delete':
		if($_POST)
		{
			if($_POST['submit']=='Si')
			{		
				$dataArray=readDataFromFile($userFilename);
				$user=$dataArray[$_POST['id']];
				deleteFile($user[11], $uploadDir);			
				unset($dataArray[$_POST['id']]);
				writeDataToFile($userFilename, $dataArray, TRUE);
			}
			header('Location: /users.php');
			exit;
		}
		else 
		{
			$dataArray=readDataFromFile($userFilename);
			$usuario=$dataArray[$_GET['id']];
			include_once('../application/views/users/delete.php');
		}
	break;
		
	case 'select':
		$arrayLine=readDataFromFile($userFilename);
		include_once ('../application/views/users/select.php');
	break;	
	
	default:
		echo "Esto default";
	break;
	
}

