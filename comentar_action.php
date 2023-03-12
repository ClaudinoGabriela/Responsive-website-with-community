<?php session_start(); ?>
<!DOCTYPE html>
<HTML lang="pt-br">
<HEAD>
    <TITLE> Ínicio </TITLE>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</HEAD>
<BODY id ="body">

<?php
date_default_timezone_set ("America/Sao_Paulo");
echo date_default_timezone_get ();
?>

<?php include("menu.php"); ?>

<?php

try {
    include("conexao.php");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("insert into respostas (texto, usuario, data, hora, idforum) values (?,?,?,?,?);");
    $stmt->bindParam(1, $texto);
    $stmt->bindParam(2, $nome);
    $stmt->bindParam(3, $data);
    $stmt->bindParam(4, $hora);
    $stmt->bindParam(5, $idforum);
    $texto=$_POST["texto"];
    $nome=$_SESSION["nome"];
    $data = date('y-m-d');
    date_default_timezone_set('America/Sao_Paulo');
    $hora = date('h:i:s');
    $idforum = $_SESSION["idforum"];
    if($stmt->execute()) {
        header("Location: abrir_forum.php");
        ?>
        <?php
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/><br><a href='comunidade.php'>Voltar</a>";
    die();
}


?>

</div>

<?php include("footer.php"); ?>

</body>
</html>