<?php

class controllers_frontController
{
	protected $config;
	private $layout;
	
	public function __construct($route)
	{
		
		$route = $route -> getRoute();
		
		$this->config = $_SESSION['register']['config'];	
				
		$controller ="controllers_".$route['controller']."Controller";
		$action = $route['action']."Action";
		
		$instance = new $controller;
		$this->content = $instance->$action(); 
		
		$layoutVars=array('content'=>$this->content,
				'title'=>'Mi application');
		$this->layout = controllers_helpers_actionHelpers::renderLayout("layout.php", $layoutVars);		
	}
	
	public function __destruct()
	{
		echo $this->layout;
	} 
	
	
	
	
}