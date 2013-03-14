<?php 
$user=$viewVars['user'];
$title=$viewVars['title'];
?>

<a href="/index/index">HOME</a>
<form method="POST" enctype="multipart/form-data">	
	<ul>
		<li>Email: <input type="text" name="email" value="<?= (isset($user['email'])&&$user['email']!='')?$user['email']:'';?>" /></li>
		<li>Password: <input type="password" name="password"/></li>
		<li>Submit: <input type="submit" name="submit" value="Enviar"/></li>
	</ul>
</form>