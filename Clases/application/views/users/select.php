<?php 
$users=$viewVars['users'];
$title=$viewVars['title'];
?>
<a href="/index/index">Home</a>
Usuario: <?=$_SESSION['iduser'];?>
<a href="/author/logout">Logout</a>
<h1><?=$title;?></h1>

<a href="/users/insert">Add</a>
<table border=1>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>email</th>
		<th>password</th>
		<th>address</th>
		<th>description</th>
		<th>pets</th>
		<th>photo</th>
		<th>sex</th>
		<th>city</th>
		<th>sports</th>
		<th>options</th>		
	</tr>
<?php foreach($users as $key => $line): ?>
	<tr>
		<?php foreach($line as $key1 => $value):?>
			<td><?=(is_array($value))?implode(',',$value):$value;?></td>
		<?php endforeach;?>
		<td>
			<a href="/users/update/id/<?=$line['iduser'];?>">update</a>
				&nbsp;
			<a href="/users/delete/id/<?=$line['iduser'];?>">delete</a>
		</td>		
	</tr>
<?php endforeach; ?>
</table>
