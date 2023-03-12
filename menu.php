
<!-- Usuário não logado -->
<?php if(empty($_SESSION["nome"]) ){ ?>
<nav class="navbar navbar-expand-sm fixed-top" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">COPRECY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comunidade.php">Comunidade</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Entrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sobre.php">Sobre</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Administrador -->
<?php } else if ($_SESSION["perfil"] == 'adm') { ?>
<nav class="navbar navbar-expand-sm fixed-top" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">COPRECY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comunidade.php">Comunidade</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="painel.php">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="administracao.php">Administração</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="sobre.php">Sobre</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Usuário comum -->
<?php } else if ($_SESSION["perfil"] == 'comum') { ?>
<nav class="navbar navbar-expand-sm fixed-top" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">COPRECY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comunidade.php">Comunidade</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="painel.php">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sobre.php">Sobre</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php } ?>