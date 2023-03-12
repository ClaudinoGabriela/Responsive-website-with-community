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

<?php include("menu.php"); ?>

<?php

	
	include("conexao.php");

	try {

		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $dbh->prepare("select * from usuario where nome=? and senha=?");
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $senha);
        $nome = $_POST["nome"];
        $senha = $_POST["senha"];

		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(!empty($result)){
        $_SESSION["nome"] = $result[0]["nome"];
        $_SESSION["perfil"] = $result[0]["perfil"];
        header("Location: painel.php");

        } else {

            echo "<div class='container-sm p-3 border border-secondary' id='login'>";
            echo "<div class='alert alert-danger'>
            <strong>Erro: </strong>usuário ou senha inválidos.</div>";

            echo "<p> <a href='login.php' class='btn btn-rounded' id='btnvoltar'> Voltar </a></p>";
            echo "</div>";
      
    }
		
		$dbh = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='login.php'>voltar</a>";
		die();
	}

	?>

<?php include("footer.php"); ?>

</BODY>
</HTML>