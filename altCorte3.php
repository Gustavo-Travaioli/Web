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

    $stmt = $dbh->prepare("update TB_CORTE set DS_CORTE=?, DS_ABREV=? ,VL_PRECO_KG=? where ID_CORTE=?");
    $stmt->bindParam(1, $descricao);
    $stmt->bindParam(2, $abreviacao);
    $stmt->bindParam(3, $valor);
	$stmt->bindParam(4, $id);

    $descricao = $_POST["descricao"];
    $abreviacao = $_POST["abreviacao"];
    $valor = $_POST["valor"];
	$id = $_POST["id"];

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
