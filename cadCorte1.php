<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html xml:lang="pt" lang="pt">
  <head>
    <link href="menu.css" rel="stylesheet" type= "text/css">
    <html  xml:lang="pt" lang="pt-br">
    <title>Sistema de Cortes</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  </head>
  <body class="fundo">
    <h1>Cadastro de Corte</h1>
    <p><img src ="boitr.png" align="center" width="900" height="500"></p>
    <form method="post" action="cadCorte2.php">
    <table>
      <td class="coluna1">
        <tr class="texto">ID do corte<br><input type="number" name="id" class="textBox"></tr>
        <tr class="texto">Descrição do corte<br><input type="text" name="descricao" class="textBox"></tr>
        <tr class="texto">Abreviação do corte<br><input type="text" name="abreviacao" class="textBox"></tr>
        <tr class="texto">Valor estimado<br><input type="text" name="valor" class="textBox"></tr>
        <tr><br><input type="submit" name="Salvar" value="Salvar" class="button"></tr>
      </td>
    </table>
    </form>
    <br><a href="index.html" class="texto">Voltar</a>
  </body>
</html>
