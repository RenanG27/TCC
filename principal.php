<?php
    session_start();
    include_once("conexao.php"); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <!--
<style> 
*{
	padding:0;
	marging:0;
	overflow:hidden;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>--->


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</head>
<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <img src="image/logo.png" width="4%%">
    <a class="navbar-brand" href="#">Etec</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">

          <button class="btn btn-dark dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="cad_usuario.php">Cadastrar</a></li>
            <li><a class="dropdown-item" href="index2.php">Listar Usuarios</a></li>
          </ul>
        </li>

          <!--<li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
            Alunos
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="cad_alunos.php">Cadastrar</a></li>
            <li><a class="dropdown-item" href="index2alunos.php">Alunos cadastrados</a></li>
          </ul>
          </li>-->
         
          <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
            Professores
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="cad_prof.php">Cadastrar</a></li>  
            <li><a class="dropdown-item" href="index_prof.php">Lista de Professores</a></li>
          </ul>
          </li>

          <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
            Escola
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="cad_cursos.php">Adicionar Curso</a></li>
            <li><a class="dropdown-item" href="cad_materia.php">Adicionar Matéria</a></li>
            <li><a class="dropdown-item" href="index_cursos.php">Listar Cursos</a></li>
            <li><a class="dropdown-item" href="index_materia.php">Listar Matérias</a></li>
          </ul>
          </li>-->
<!-- Teste >
          <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
            Matéria
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="adc_mat.php">Cadastrar</a></li>
            <li><a class="dropdown-item" href="cad_materia.php">Adicionar ao curso</a></li>
            <li><a class="dropdown-item" href="index_materia.php">Listar Matérias</a></li>
          </ul>
          </li>

          <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
            Cursos          
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
          <li><a class="dropdown-item" href="cad_cursos.php">Adicionar Curso</a></li>
          <li><a class="dropdown-item" href="index_cursos.php">Listar Cursos</a></li>
          </ul>
          </li>

-->
          <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
            Substituição
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
          <li><a class="dropdown-item" href="cad_subst.php">Cadastrar</a></li>
          <li><a class="dropdown-item" href="b_subst.php">Consultar</a></li>
          </ul>
          </li>

          <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
            Reposição
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="cad_rep.php">Cadastrar</a></li>
            <li><a class="dropdown-item" href="b_rep.php">Consultar</a></li>
          </ul>
          </li>

          <ul>
          <a href="sair.php"  type="button" class="btn btn-outline-danger" >Sair</a>
         
          
          </ul> 
      </ul>
    </div>
  </div>
</nav>
<?php
	if (isset($_SESSION['msg'])) 
	{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		
	}
  ?>
<img src="image/f.jpg" alt= "Trulli" width="100%" height="100%">
</body>
</html>
		