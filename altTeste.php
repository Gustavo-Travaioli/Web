<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Alteração</title>
<meta charset="UTF-8">
</head>
<body>
	<h1>Editar Cortes</h1>
<?php
$host ="localhost";
$dbname ="BD_CORTES";
$user = 'root';
$pass = '';
		try {
			$dbh = new PDO('mysql:host='.$host.';dbname='.$dbname,
						 $user, $pass, array(PDO::ATTR_PERSISTENT=>true));
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sth = $dbh->prepare('SELECT ID_CORTE,DS_CORTE from TB_CORTE');
			$sth->execute();			
			
								
					$result = "SELECT ID_CORTE,DS_CORTE from TB_CORTE";
					$linha = $sth->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_FIRST);
          do
          {
            //$otp= new tipo($linha[0], $linha[1]);
            $mens.="<OPTION value= '".$linha[0]"'>"."</OPTION>";
            
          }while($linha = $sth->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT));
								
		$dbh = null;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/><br><a href='index.html'>voltar</a>";
			die();
		}
?>