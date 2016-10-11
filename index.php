<?php reqiuire_once('function.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>MYSQL DATABASE BACKUP</title>
</head>

<body>
	<form action="function.php" method="post">
		Host : <input type="text" name="host" /><br>
		Username : <input type="text" name="user" /><br>
		Password : <input type="text" name="pass" /><br>
		Database : <input type="text" name="dbname" /><br>
		Table : <input type="text" name="table" /><br>
		<select name="pilih">
		  <option value="backup">Backup</option>
		  <option value="restore">Restore</option>
		</select>
		<input name="submit" type="submit" value="Backup Database!" />
		<input name="restore" type="submit" value="Restore Database!" />
	</form>
</body>