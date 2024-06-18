<?php
   session_start();
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cursos</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</head>
	<style>
	body{
            font-family: Arial, Helvetica, sans-serif;
             background-color: #F5F5F5;

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
	</style>
	<body>
	
		<center><h1>Cursos Oferecidos</h1>
	
			<?php
			if(isset ($_SESSION['msg'])) 
		{
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		
		}
		?>
		<form method ="POST" action="">
		<table class="table table-striped table-hover">
 
		
  <thead>
  
    <tr>
      <th scope="col">#</th>
      <th scope="col">ÁREA DA SAÚDE</th>
      <th scope="col">ATUAÇÃO EM CAMPO E ANIMAIS</th>
      <th scope="col">TECNÓLOGIA</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>MEDICINA</td>
      <td>MEDICINA VETERINÁRIA</td>
      <td>ANÁLISE E DESENVOLVIMENTO DE SISTEMA</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>ODONTOLOGIA</td>
      <td>ZOOTECNIA</td>
      <td>SISTEMA DE INFORMAÇÃO</td>
    </tr>
	<th scope="row">3</th>
      <td>BIOMEDICINA</td>
      <td>AGROPECUÁRIA</td>
      <td>ENGENHARIA DE SOFTWARE</td>
    <tr>
      <th scope="row">4</th>
      <td>ENFERMAGEM</td>
      <td>ENGENHARIA MECÂNICA</td>
      <td>CIÊNCIA DA COMPUTAÇÃO</td>
    <tr>
	<th scope="row">5</th>
      <td>PSICOLOGIA</td>
      <td>AGRONEGÓCIO</td>
      <td>SISTEMAS PARA INTERNET</td>
	  <tr>
	  <th scope="row">5</th>
      <td>PSICOLOGIA</td>
      <td>ENGENHARIA MECÂNICA</td>
      <td>ENGENHARIA DE COMPUTAÇÃO</td>
    <tr>
  </tbody>
</table>
		</form>
	</body>
</html>