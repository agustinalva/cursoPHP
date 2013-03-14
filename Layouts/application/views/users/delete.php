<?php 
$user=$viewVars['user'];
$title=$viewVars['title'];
?>
<form method="POST">
	<ul>
		<li>Seguro que quieres borrar a:<?=$user['name'];?></li>
		<li>Id: <input type="hidden" name="id" value="<?= (isset($_GET['id']))?$_GET['id']:'1';?>"/></li>
		<li>Submit: <input type="submit" name="submit" value="Si"/></li>
		<li>Submit: <input type="submit" name="submit" value="No"/></li>
		
	</ul>
</form>