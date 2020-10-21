<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Title here!</title>
<meta charset="UTF-8">
</head>
<body>
	<h1>Lista de Alunos</h1>
<?php
$host ="localhost";
$dbname ="exemplo";
$user = 'postgres';
$pass = 'ifsp';
try {
	$dbh = new PDO("pgsql:dbname=$dbname;host=$host", $user, $pass ); 
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sth = $dbh->prepare('SELECT * from aluno');
	$sth->execute();
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row) {
		foreach($row as $value){
			echo "$value - ";
		}
		echo "<br>";
	}
	$dbh = null;
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
	die();
}
?>

<br><br><a href="index.php">voltar</a>
</body>
</html>