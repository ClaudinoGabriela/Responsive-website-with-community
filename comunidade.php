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

<div class="container-sm p-3" id="comunidade">

<h1> COMUNIDADE </h1>
<p> Esta é a nossa comunidade. Aqui você pode desabafar sobre seus casos de bullying/cyberbullying,
    ajudar e conscientizar outras pessoas. Tudo isso pode ser feito de forma anônima. Só é preciso criar uma conta com
    um nome fictício de usuário.</p>


    <form method="post" action="busca_result.php">
	<div class="form-group">
		<input type="text" class="form-control" id="texto" name="texto" placeholder="Buscar">
    </div><br>
    <input type="submit" name="buscar" value="Buscar" class="btn btn-primary" id="btnpublicar">
</form>
<br>
    
        <!-- Permitir que o usuário veja o botão de "criar forum" apenas se estiver logado -->
        <?php if(!empty($_SESSION["nome"]) ){ ?>
        <a href="criar_forum.php" class="btn" id="btnnovoforum">Novo Fórum</a><br><br>
        <?php } ?>

<?php 

include("conexao.php");
	
	try {	
		
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sth = $dbh->prepare('SELECT id, titulo, texto, usuario, data, hora from forum');
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
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
    }
    
?>
    
</div>

<?php include("footer.php"); ?>

</BODY>
</HTML>