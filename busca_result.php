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


	<?php
	
	include("conexao.php");	
	
	try {
	
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $dbh->prepare('SELECT * from forum WHERE texto LIKE ?');
		$stmt->bindParam(1, $texto);
		$texto = "%".$_POST["texto"]."%";
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(!empty($result)){
   
			foreach($result as $row) {
			  // Pegando os dados do fórum
		 
				  echo '<div class="container-sm p-3 border border-dark" id="ampliarforum">';
		 
					echo '<div class="row" id="titulo">';
					  echo '<div class="col"> <b>'. $titulo = $row["titulo"] . '</b></div></div>';
					  echo '<div class="row" id="textoforum">';
					  echo '<div class="col">'. $texto = $row["texto"] . '</div></div><br><br>';
		
				  
					echo '<div class="row" id="informacoesforum3">';
				  if(!empty($_SESSION["nome"]) ){
					if ( $row['usuario'] == $_SESSION["nome"] || $_SESSION["perfil"] == 'adm' ) {
							echo '<div class="col-sm-1" id="linksforum">';
							echo "<p> <a href='excluir_forum.php?id=".$row["id"]."'class='btn' id='btnexcluir'> Excluir </a></p></div>";
					}
				}
		 
		 
		  if(!empty($_SESSION["nome"]) ){
			// Permitindo que a pessoas que está logada possa ver o botão de responder o fórum
							echo '<div class="col-sm" id="linksforum">';
							echo "<p> <a href='comentar.php?id=".$row["id"]."' id='btncomentarforum'><b> Comentar </b></a></p></div>";
				 }
							echo '<div class="col-sm-7" id="inform">'. $row['data'] . '</div>';
							echo '<div class="col-sm-1" id="inform">'. $row['hora'] . '</div>';
							echo '<div class="col-sm-6" id="inform"> @'. $row['usuario'] . '</div></div>';
							echo '</div>';
			  }
				 
			}
		 
		} catch (PDOException $e) {
		  print "Error!: " . $e->getMessage() . "<br/><br><a href='abrir_forum.php'>voltar</a>";
		  die();
		}

		?>
		
		</div>
		
		<?php include("footer.php"); ?>

		</BODY>
		</HTML>
