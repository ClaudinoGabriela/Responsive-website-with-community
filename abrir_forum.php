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

<div class="container-sm p-3" id="abrirforum">

<h1> COMUNIDADE </h1>
<p> Esta é a nossa comunidade. Aqui você pode desabafar sobre seus casos de bullying/cyberbullying,
    ajudar e conscientizar outras pessoas. Tudo isso pode ser feito de forma anônima. Só é preciso criar uma conta com
    um nome fictício de usuário.</p>

<?php
 
// Pegando o id do forum
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["id"])){
    $_SESSION["idforum"] = $_GET["id"];
  }
}
?>
 
 
<?php
 
echo "<input type='hidden' id='id_ciclo' name='idforum' value='".$_SESSION["idforum"]."'>";
 
include("conexao.php");
 
try {
  $sth = $dbh->prepare('select * from forum where id = '.$_SESSION["idforum"].' ');
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
 
  if(!empty($result)){
   
    foreach($result as $row) {
      // Pegando os dados do fórum
 
          echo '<div class="container-sm p-3 border border-dark" id="ampliarforum">';
 
            echo '<div class="row" id="titulo">';
              echo '<div class="col"> <b>'. $titulo = $result[0]["titulo"] . '</b></div></div>';
              echo '<div class="row" id="textoforum">';
              echo '<div class="col">'. $texto = $result[0]["texto"] . '</div></div><br><br>';

          
            echo '<div class="row" id="informacoesforum3">';
          if(!empty($_SESSION["nome"]) ){
            if ( $row['usuario'] == $_SESSION["nome"] || $_SESSION["perfil"] == 'adm' ) {
                    echo '<div class="col-sm" id="linksforum">';
                    echo "<p> <a href='excluir_forum.php?id=".$row["id"]."'class='btn' id='btnexcluir'> Excluir </a></p></div>";
            }
        }
                    echo '<div class="col-sm-1" id="linksforum">';
                    echo "<p> <a href='comunidade.php'><b> Voltar </b></a></p></div>";
 
 
  if(!empty($_SESSION["nome"]) ){
    // Permitindo que a pessoas que está logada possa ver o botão de responder o fórum
                    echo '<div class="col-sm" id="linksforum">';
                    echo "<p> <a href='comentar.php?id=".$row["id"]."' id='btncomentarforum'><b> Comentar </b></a></p></div>";
         }
                    echo '<div class="col-sm-7" id="inform">'. $row['data'] . '</div>';
                    echo '<div class="col-sm-1" id="inform">'. $row['hora'] . '</div>';
                    echo '<div class="col-sm" id="inform"> @'. $row['usuario'] . '</div></div>';
         
      }
          echo '</div>';
    }
 
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/><br><a href='abrir_forum.php'>voltar</a>";
  die();
}
 
  try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $sth = $dbh->prepare('select id,texto,usuario,data,hora from respostas where idforum = '.$_SESSION["idforum"].' ');
    $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
       
        if(isset($_SESSION["idforum"])) {
 
            //Pegando os dados da resposta
                foreach($result as $row) {
            echo '<div class="container p-3 border border-dark" id="coments">';
 
              echo '<div class="row" id="textoforum">';
                echo '<div class="col">'. $row['texto'] . '</div></div>';
 
                echo '<div class="row" id="informacoesforum3">';
            if(!empty($_SESSION["nome"]) ){
                if ( $row['usuario'] == $_SESSION["nome"] || $_SESSION["perfil"] == 'adm' ) {
 
                          
                            echo '<div class="col-sm" id="linksforum">';
                            echo "<br><p> <a href='excluir_comentario.php?id=".$row["id"]."'class='btn' id='btnexcluir'> Excluir </a></p></div>";
                }
            }
                            echo '<div class="col-sm-8" id="inform">'. $row['data'] . '</div>';
                            echo '<div class="col-sm-1" id="inform">'. $row['hora'] . '</div>';
                            echo '<div class="col-sm" id="inform"> @'. $row['usuario'] . '</div>'; 
                          echo '</div>';
                          echo '</div>';
                          
        }
        
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