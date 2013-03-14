<?php
abstract class abstractController implements toOut
{
	abstract function myAbstractFunction();

	
	function toArray()
	{
		
	}
	
	function toString()
	{
	
	}	
	
	final function toJson()
	{
	
	}
	
	function myFunction()
	{
		echo "asd";
	}
	
	
}

class abstractController extends abstractController 
{
	function __construct()
	{
		
		$this->myFunction();
	}
	
	function myAbstractFunction()
	{
		
	}
	
	function toArray()
	{
		
	}
	
	
	
	
}





interface toOut
{
	public function toArrays();
	public function toString();
	public function toJson();	
}


