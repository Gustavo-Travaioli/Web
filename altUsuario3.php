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

    $stmt = $dbh->prepare("update TB_USUARIO set DS_LOGIN=?, DS_SENHA=? ,ID_PERFIL=? where ID_USUARIO=?");
    $stmt->bindParam(1, $login);
    $stmt->bindParam(2, $senha);
    $stmt->bindParam(3, $id_perfil);
    $stmt->bindParam(4, $id);


    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $id_perfil = $_POST["id_perfil"];
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
