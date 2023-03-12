<?php session_start(); ?>
<?php include("login_verificar.php"); ?>
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

<div class="container-sm p-3" id="painel">
<h3> ADMINISTRAÇÃO </h3>
<?php 

include("conexao.php");
	
	try {	
		
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sth = $dbh->prepare("select usuario.nome from usuario;");
		$sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($result)){

                echo '<div class="table-responsive" id="tabeladiv">
                <table class="table" id="tabela"> ';

                echo '<thead>';

                echo'<th>Usuário</th>';
                echo'<th>Deletar usuário</th>';

                echo '</thead>';

                echo'<tbody>';
            
            // escrevendo resultado do SELECT
            foreach($result as $row) {
                
                    echo '<td>'. $row['nome'] . '</td>';
                    echo "<td><a href='excluir_usuario.php?nome=".$row["nome"]."'class='btn' id='btnexcluir'> Deletar </a></td>";
                echo '</tbody>';
            
            
            }
            echo '</table></div>';
            
        }
        

		$dbh = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='painel.php'>voltar</a>";
		die();
    }
    
?>
</div>

<?php include("footer.php"); ?>

</BODY>
</HTML>