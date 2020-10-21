<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Sistema de Cortes</title>
<html xml:lang="pt" lang="pt">
</head>
<body>
	<h1>Cadastro de Usuário</h1>
	<form method="post" action="cadUsuario2.php">
	<br><br>ID usuário: <input type="number" name="id">
	<br><br>Login: <input type="text" name="login">
	<br><br>Senha: <input type="password" name="senha">
    <br><br>Perfil:

 <?php
$host ="localhost";
$dbname ="BD_CORTES";
$user = 'root';
$pass = '';

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
	<br><br><input type="submit" name="Salvar" value="Salvar">
	</form>
<br><br><a href="index.html">voltar</a>
</body>
</html>
