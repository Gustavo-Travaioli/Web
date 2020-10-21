<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Sistema de Cortes</title>
<html xml:lang="pt" lang="pt">
</head>
<body>
<h1>Cadastro de Usuário</h1>

<?php
$host ="localhost";
$dbname ="BD_CORTES";
$user = 'root';
$pass = '';
try {
	$dbh = new PDO('mysql:host='.$host.';dbname='.$dbname,
                 $user, $pass, array(PDO::ATTR_PERSISTENT=>true));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare("insert into TB_USUARIO (ID_USUARIO, DS_LOGIN, DS_SENHA, ID_PERFIL ) values (?,?,?,?);");
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $login);
    $stmt->bindParam(3, $senha);
    $stmt->bindParam(4, $id_perfil);

    $id = $_POST["id"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $id_perfil = $_POST["id_perfil"];

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
