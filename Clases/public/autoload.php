<?php

function __autoload($var)
{
	try	{
		$path = str_replace('_', '/', $var).".php";
		if(file_exists('../application/'.$path))
			include_once ('../application/'.$path);
		else
			throw new Exception("File not found");
	}
	catch (Exception $e)
	{
		echo '--- Exception: ',  $e->getMessage(), "\n";
	}

}