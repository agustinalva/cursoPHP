<?php
/**
 * Index Controller
 * 
 * @version 1.0 
 * 
 */


class controllers_indexController extends controllers_abstractController
{
	
	public $content;
	
	public function __construct()
	{
		
	}
	
	public function indexAction()
	{
		$this->content=controllers_helpers_actionHelpers::renderView('index/index.php', $viewVars);
		return $this->content;
	}
	
	public function errorAction()
	{
		
	}	
	
	
		
	
}



