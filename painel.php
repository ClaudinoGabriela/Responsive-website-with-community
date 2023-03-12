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

<div class="container-sm p-3 border" id="painel">
<h3> PERFIL </h3>
<img class="img-fluid rounded"  src="img/avatar.png" id="avatar">
<br><br>
<p> <a href="sair.php">Sair</a>

<br><br>

<h3> GERENCIAR MEUS FÓRUNS E RESPOSTAS </H3>


<?php 

include("conexao.php");
	
	try {	
		
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sth = $dbh->prepare("select distinct f.id, f.titulo, f.texto, f.usuario, f.data, f.hora from forum f left join respostas r on r.idforum = f.id where f.usuario = '".$_SESSION["nome"]."' or r.usuario  = '".$_SESSION["nome"]."'");
		$sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($result)){

            echo '<div class="table-responsive" id="tabeladiv">
                <table class="table" id="tabela"> ';
                echo '<thead>';
                echo '<tr>';

                echo'<th>Título</th>';
                echo'<th>Data</th>';
                echo'<th>Hora</th>';
                echo'<th>Usuário</th>';
                echo'</tr>';
                echo'</thead>';

                echo'<tbody>';
                echo'<tr>';
            
            // escrevendo resultado do SELECT
            foreach($result as $row) {

                echo '<td><a href="abrir_forum.php" id="tituloforum">' . $row['titulo'] . '</a>';
                echo "<p><a href='abrir_forum.php?id=".$row["id"]."' id='linkabrirforum'> Abrir </a></p></td>";
                
                    echo '<td>'. $row['data'] . '</td>';
                    echo '<td>'. $row['hora'] . '</td>';
                    echo '<td>'. $row['usuario'] . '</td>';
                    echo '</tr>';
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
<br><br>

<?php include("footer.php"); ?>

</BODY>
</HTML>