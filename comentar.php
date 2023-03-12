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

<div class="container-sm p-3 border" id="criarforum">

<h1> RESPONDER </h1>

  <form method="post" class="needs-validation" action="comentar_action.php">
    <div class="mb-3 mt-3">
      <label for="text"> Texto:</label>
      <textarea class="form-control" rows="1" id="texto" name="texto" required></textarea>
    </div>
    <button type="submit" class="btn" id="btnpublicar">Publicar</button>
    <a href='abrir_forum.php' class='btn btn-rounded' id="btnvoltar">Voltar</a>
  </form>
</div>

<br><br>

<?php include("footer.php"); ?>

</body>
</html>