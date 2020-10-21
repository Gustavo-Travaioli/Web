<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Sistema de Cortes</title>
<meta charset="UTF-8">
</head>
<body>
	<h1>Excluir Corte</h1>
<?php
$host ="localhost";
$dbname ="BD_CORTES";
$user = 'root';
$pass = '';
try {
 	$dbh = new PDO('mysql:host='.$host.';dbname='.$dbname,
                 $user, $pass, array(PDO::ATTR_PERSISTENT=>true));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	$sth = $dbh->prepare('SELECT ID_USUARIO,DS_LOGIN,DS_SENHA, ID_PERFIL from TB_USUARIO');
	$sth->execute();
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	echo "<table border=1><tr><td>ID USUARIO</td><td>LOGIN</td><td>SENHA</td><td>ID PERFIL</td><td></td></tr>"; //Inicia tabela e escreve cabecalho
	foreach($result as $row) { // escreve n linhas
		echo "<tr>"; // inicia linha com tr
		echo "<td>"  .  $row[ "ID_USUARIO"] . "</td>"; // cada celula comeca com td e termina com /td
		echo "<td>"  .  $row[ "DS_LOGIN"]. "</td>";
		echo "<td>"  .  $row[ "DS_SENHA"]. "</td>";
		echo "<td>"  .  $row[ "ID_PERFIL"]. "</td>";
		echo "<td>"  .  "<a href='delUsuario2.php?id=".$row["ID_USUARIO"]."'>Excluir</a>"  .  "</td>";
		echo "</tr>"; // termina linha com /tr
	}
	echo "</table>"; // fecha tabela
	$dbh = null;
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/><br><a href='index.html'>voltar</a>";
	die();
}
?>

<br><br><a href="index.html">voltar</a>
</body>
</html>
