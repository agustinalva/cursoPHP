<?php

class models_users_users
{
	protected $link;
	
	public function __construct()
	{
		$this->link = models_dataGatewayMysql::newInstance()->link;			
	}
	
	public function readUsers()
	{		
		$query = "SELECT * FROM users";
		$result = mysqli_query($this->link,$query);		
		
		while ($row = mysqli_fetch_assoc($result))
		{
		
			$query2 = "SELECT * FROM users_has_sports WHERE users_iduser=".$row['iduser'];
			$result2 = mysqli_query($this->link,$query2);
		
			$sports=array();
			while ($sport = mysqli_fetch_assoc($result2))
				$sports[]=$sport['sports_idsport'];
		
			$row['sports']=implode(',',$sports);
			$users [] = $row;
		}		
		return $users;
	}
	
	function readUser($id, $config)
	{
		
	}
	
	function deleteUser($id,$config)
	{
		
	}
	
	function updateUser($id,$config, $data)
	{
		
	}
	
	function insertUser($config, $data)
	{
		
	}
	
	function initUser()
	{
		
	}
	
	function readUsersFromWS()
	{
		$server='http://framework.zend.com/rest';
		$client = new Zend_Rest_Client($server);		
		$users = $client->readUsers()->get();
		return $users; 
	}
	
}