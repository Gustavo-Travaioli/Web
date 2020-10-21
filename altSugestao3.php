<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Alteração</title>
<html xml:lang="pt" lang="pt">
</head>
<body>
<h1>Alterar Sugestao</h1>

<?php
$host ="localhost";
$dbname ="BD_CORTES";
$user = 'root';
$pass = '';
try {
     $dbh = new PDO('mysql:host='.$host.';dbname='.$dbname,
                 $user, $pass, array(PDO::ATTR_PERSISTENT=>true));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare("update TB_SUGESTAO set DS_SUGESTAO=?, DS_ABREV=?  where ID_SUGESTAO=?");
    $stmt->bindParam(1, $descricao);
    $stmt->bindParam(2, $abreviacao);
	$stmt->bindParam(3, $id);

    $descricao = $_POST["descricao"];
    $abreviacao = $_POST["abreviacao"];
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
