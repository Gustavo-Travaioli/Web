<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Alteração</title>
<html xml:lang="pt" lang="pt">
</head>
<body>
	<h1>Alterar Cortes</h1>
	<?php
	$host ="localhost";
	$dbname ="BD_CORTES";
	$user = 'root';
	$pass = '';
	try {
    $dbh = new PDO('mysql:host='.$host.';dbname='.$dbname,
                 $user, $pass, array(PDO::ATTR_PERSISTENT=>true));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $dbh->prepare('SELECT ID_SUGESTAO,DS_SUGESTAO,DS_ABREV from TB_SUGESTAO where ID_SUGESTAO = ?');
		$stmt->bindParam(1, $id);
		$id = $_GET["id"];
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbh = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.html'>voltar</a>";
		die();
	}
	?>
	<form method="post" action="altSugestao3.php">
	<br>ID Corte: <input type="text" name="id" value="<?php echo $result[0]["ID_SUGESTAO"]?>" readonly>
	<br>Descrição: <input type="text" name="descricao" value="<?php echo $result[0]["DS_SUGESTAO"]?>">
	<br>Abreviação: <input type="text" name="abreviacao" value="<?php echo $result[0]["DS_ABREV"]?>">

	<br><input type="submit" name="Salvar" value="Salvar">
	</form>
<br><br><a href="index.html">voltar</a>
</body>
</html>
