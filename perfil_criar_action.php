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

    if(isset($_POST)) {

        try {
            include("conexao.php");
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare("insert into usuario (email,senha,nome) values (?,?,?);");
            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $senha);
            $stmt->bindParam(3, $nome);
            $email=$_POST["email"];
            $senha=$_POST["senha"];
            $nome=$_POST["nome"];
            if($stmt->execute()) {
                header("Location: login.php");
                
            }
        } catch (PDOException $e) {

            echo "<div class='container-sm p-3 border border-secondary' id='cadastro'>";
            echo "<div class='alert alert-danger'>
            <strong>Erro: </strong>usuário já existe.
            </div>";

            echo "<p> <a href='cadastro.php' class='btn btn-rounded' id='btn'> Voltar </a></p>";
            echo "</div>";
            die();
            
            
        }
    }
    
    ?>
    
<?php include("footer.php"); ?>

</BODY>
</HTML>