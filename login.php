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

<div class="container-sm p-3 border border-secondary" id="login">
    <h3> LOGIN </h3>
    <p> Faça seu login para conseguir participar do nosso fórum </p>
    <form class="needs-validation" method="post" action="perfil_entrar_action.php">
        <div class="mb-3 mt-3">
          <label for="text">Nome de usuário:</label>
            <input type="text" class="form-control" id="nome" placeholder="Digite seu nome de usuário" name="nome" required>
        </div>
        <div class="mb-3">
          <label for="pwd">Senha:</label>
            <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" name="senha" required>
        </div>  
        <div class="mb-3">
            <input type = "submit" class="btn btn-primary" value="ENTRAR" id="btn">
        </div>
        <div class="mb-3">
            <p> Não tem conta? <a href="cadastro.php"><b>CADASTRE-SE</b></a></p>
        </div>
      </form>
</div>

      <br><br>
      <?php include("footer.php"); ?>

</BODY>
</HTML>