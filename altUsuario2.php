<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Alteração</title>
<html xml:lang="pt" lang="pt">
</head>
<body>
	<h1>Alterar Usuários</h1>
	<?php
	$host ="localhost";
	$dbname ="BD_CORTES";
	$user = 'root';
	$pass = '';
	try {
 $dbh = new PDO('mysql:host='.$host.';dbname='.$dbname,
                 $user, $pass, array(PDO::ATTR_PERSISTENT=>true));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $dbh->prepare('SELECT ID_USUARIO,DS_LOGIN,DS_SENHA, ID_PERFIL from TB_USUARIO');
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
	<form method="post" action="altUsuario3.php">
	<br>ID Corte: <input type="text" name="id" value="<?php echo $result[0]["ID_USUARIO"]?>" readonly>
	<br>Descrição: <input type="text" name="login" value="<?php echo $result[0]["DS_LOGIN"]?>">
	<br>Abreviação: <input type="password" name="senha" value="<?php echo $result[0]["DS_SENHA"]?>">
    <br>Perfil:
	<?php
	//*/<br>Valor Estimado: <input type="text" name="id perfil" value="
         try {
		$dbh = new PDO('mysql:host='.$host.';dbname='.$dbname,
                 $user, $pass, array(PDO::ATTR_PERSISTENT=>true));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sth = $dbh->prepare('SELECT ID_PERFIL,DS_PERFIL from TB_PERFIL');
		$sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		echo "<SELECT NAME = id_perfil>"; //Inicia tabela e escreve cabecalho
		foreach($result as $row) { // escreve n linhas
			echo "<OPTION VALUE =".$row[ "ID_PERFIL"].">"; // inicia linha com tr

			echo $row[ "DS_PERFIL"];


			echo "</OPTION>"; // termina linha com /tr
		}
		echo "</SELECT>"; // fecha tabela
		$dbh = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.html'>voltar</a>";
		die();
	}
?>

	<br><input type="submit" name="Salvar" value="Salvar">
	</form>
<br><br><a href="index.html">voltar</a>
</body>
</html>
