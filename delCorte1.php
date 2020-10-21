<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Sistema de Cortes</title>
<html  xml:lang="pt" lang="pt">
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
	$sth = $dbh->prepare('SELECT ID_CORTE,DS_CORTE,DS_ABREV,VL_PRECO_KG from TB_CORTE');
	$sth->execute();
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	echo "<table border=1><tr><td>ID CORTE</td><td>CORTE</td><td>ABREV</td><td>PRECO KG</td><td></td></tr>"; //Inicia tabela e escreve cabecalho
	foreach($result as $row) { // escreve n linhas
		echo "<tr>"; // inicia linha com tr
		echo "<td>"  .  $row[ "ID_CORTE"] . "</td>"; // cada celula comeca com td e termina com /td
		echo "<td>"  .  $row[ "DS_CORTE"]. "</td>";
		echo "<td>"  .  $row[ "DS_ABREV"]. "</td>";
		echo "<td>"  .  $row[ "VL_PRECO_KG"]. "</td>";
		echo "<td>"  .  "<a href='delCorte2.php?id=".$row["ID_CORTE"]."'>Excluir</a>"  .  "</td>";
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
