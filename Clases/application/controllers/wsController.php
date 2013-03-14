<?php
class controllers_wsController extends controllers_abstractController
{
	protected $model;
	
	public function __construct()
	{
		$this->model = new models_ws_ws($_SESSION['register']['config']);
	}

	public function indexAction()
	{
		echo "esto sera el servidor REST";

		
		
		
		exit();
	}
	
	public function clientAction()
	{
		echo "esto sera el cliente REST";
		
		include ('../library/Zend/Rest/Client.php');
		
		$server='http://10.0.3.122:8081/ws2/index';		
		
		
		$client = new Zend_Rest_Client($server);
		$users = $client->readUsers()->post();
		
				$html="";
				foreach($users as $key1 => $value1)
				foreach($value1 as $key => $value)
					{
						$html.="<ul><li>".$key.":";
							foreach($value as $key2 => $value2)
								{
									$html.="<ul>";
									$html.="<li>".$key2.":".$value2."</li>";
									$html.="</ul>";
								}
							$html.="</li></ul>";
						}
		
				echo $html;
		
		echo "<pre>Users";
		print_r($users);
		echo "</pre>";
		
		exit();
			
	}
	
	public function errorAction()
	{
		
	}
	
	public function debugAction()
	{
		
	}
}