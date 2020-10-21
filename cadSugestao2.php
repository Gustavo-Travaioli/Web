<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Sistema de Cortes</title>
<meta charset="UTF-8">
</head>
<body>
<h1>Cadastro de Sugestão</h1>

<?php
$host ="localhost";
$dbname ="BD_CORTES";
$user = 'root';
$pass = '';
try {
	$dbh = new PDO('mysql:host='.$host.';dbname='.$dbname,
                 $user, $pass, array(PDO::ATTR_PERSISTENT=>true));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare("insert into TB_SUGESTAO (ID_SUGESTAO, DS_SUGESTAO, DS_ABREV) values (?,?,?);");
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $descricao);
    $stmt->bindParam(3, $abreviacao);

    $id = $_POST["id"];
    $descricao = $_POST["descricao"];
    $abreviacao = $_POST["abreviacao"];

    if($stmt->execute())
	echo "Sucesso!";

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/><br><a href='index.html'>voltar</a>";
    die();
}
?>

<br><br><a href="index.html">voltar</a>
</body>
</html>
