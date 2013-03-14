<a href="users.php?action=insert">Add</a>
<table border=1>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>email</th>
		<th>password</th>
		<th>address</th>
		<th>description</th>
		<th>sex</th>
		<th>city</th>
		<th>pets</th>
		<th>sports</th>
		<th>submit</th>
		<th>photo</th>
		<th>options</th>
	</tr>
<?php foreach($users as $key => $line): ?>
	<tr>
		<?php foreach($line as $key1 => $value):?>
			<td><?=(is_array($value))?implode(',',$value):$value;?></td>
		<?php endforeach;?>
		<td>
			<a href="users.php?action=update&id=<?=$key;?>">update</a>
				&nbsp;
			<a href="users.php?action=delete&id=<?=$key;?>">delete</a>
		</td>		
	</tr>
<?php endforeach; ?>
</table>
