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

<div class="container-sm p-3 border border-secondary" id="cadastro">
    <h3>CADASTRO</h3>
    <p> Cadastre-se para conseguir participar do nosso fórum </p>
    <form method="post" action="perfil_criar_action.php" class="needs-validation">
        <div class="mb-3 mt-3">
          <label for="user"> Nome de usuário:</label>
          <input type="user" class="form-control" id="nome" placeholder="Ex: Coprecy" name="nome" required>
        </div>
        <div class="mb-3 mt-3">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Ex: Coprecy@gmail.com" name="email" required>
        </div>
        <div class="mb-3">
          <label for="pwd">Senha:</label>
          <input type="password" class="form-control" id="senha" placeholder="Crie uma senha" name="senha" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" values="Cadastrar" id="btn"> Cadastrar </button>
        </div>
   </form>

</div>
<br><br>
<?php include("footer.php"); ?>
</BODY>
</HTML>