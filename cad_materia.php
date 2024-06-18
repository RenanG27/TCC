<?php
   session_start();
   include_once('conexao.php');
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar matéria</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</head>
	<style>

* {
    box-sizing: border-box;
    margin: 0;
	padding: 0;
}


body, html {
	width: 100%;
}

body{
	background-color: beige;
    font-family: Arial, Helvetica, sans-serif;
	font-size:17px;
	background-image: url("f_ca	ad.jpg");
}

label{
	font-size:18px;
	float:left;
}

#ajust{
	margin-left: 100px;
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

.cb_sql{
	width: 300px;
}

.label{
	width: 300px;
	margin-top:30px;
	color:white;
}

.label2{
	color:white;
}

#formGroupExampleInput{
	border-radius: 10px 20px;
	background-color:rgba(255, 255, 255, 0.6);
	font-family:arial black;
}


.form1{
	width:800px;
	margin-top: 50px;
}

h1{
	margin-top:50px;
	text-align:center;
	font-family:Arial black;
}

#form_1{
	border-radius: 60px 60px;
	border: 1px solid black;
	width: 500px;
	height: 600px;
	margin-bottom:50px;
	background-color:rgba(0, 0, 0, 0.5);
}

.modulo{
	width:80px;
}

.botao{
	margin-bottom: 30px;
}

.fundo{
	width:1295px;
	height:800px;
	display:inline-block;
}

.alinhar{
	margin-top:90px;
}
	</style>

	<body>
	<ul>
		<li><a href = "sair.php">Sair do Sistema</a></li>
		<li><a href = "principal.php">Voltar Principal</a></li>
	</ul>
	
		

		<center><h1>Cadastrar Matéria</h1>
		<?php
		if(isset ($_SESSION['msg']))
		{
		echo $_SESSION['msg'];
		unset ($_SESSION['msg']);
		
		}
		?>
		<div class="form1">
			<form method ="POST" id="form_1" action="pro_cad_materia.php">
			<div class="alinhar">
				<div class="label">
					<div class="mb-3">
						<!--Nome da matéria-->
						<label for="formGroupExampleInput" class="form-label">Nome:</label>
						<input type="text" name="nome" class="form-control" id="formGroupExampleInput" required placeholder="Digite o nome da matéria">
					</div>
				
						<!-- Selecione o modulo-->
						<div class="modulo">
							<label for="formGroupExampleInput" class="form-label">Modulo?: </label>
							<INput type="number" name="cu_mod" class="form-control" id="formGroupExampleInput" required placeholder="	"><br>
						</div>
				</div>

    <!-- Select de cursos-->
				<?php
						if (!$conn) {
					die('Não foi possível conectar ao MySQL');
					}
					$sql = "SELECT cu_nome FROM cursos";
					$resultado = mysqli_query($conn,$sql) or die(mysql_error()."<br>Erro ao executar a inserção dos dados");

					if (mysqli_num_rows($resultado)!=0){

					echo "<div class='label2'> <label id='ajust'> Qual curso tem essa matéria?</label></div>";
					echo '<div class="cb_sql"><select class="form-select" aria-label="Default select example" name="cu_nome" id="formGroupExampleInput"> "Escolha o curso"
					<option value=" " selected="selected"></option></div>';
					while($elemento = mysqli_fetch_array($resultado))
					{
					$nomeItem = $elemento['cu_nome'];
					echo '<option value="'.$nomeItem.'">'.$nomeItem.'</option>';
					}
					echo '</select>';
					}


				?><br>

				<!--Select de professores -->
				<?php
						if (!$conn) {
							die('Não foi possível conectar ao MySQL');
						}
					$sql = "SELECT nome FROM professor";
					$resultado = mysqli_query($conn,$sql) or die(mysql_error()."<br>Erro ao executar a inserção dos dados");

						if (mysqli_num_rows($resultado)!=0){

					echo "<div class='label2'> <label>Qual professor administra essa matéria?</label></div>";
					echo '<div class="teste"><select class="form-select" aria-label="Default select example" name="prof_nome" id="formGroupExampleInput"> "Escolha o professor"
					<option value=" " selected="selected"></option></div>';
					while($elemento = mysqli_fetch_array($resultado))
					{
					$nomeItem = $elemento['nome'];
					echo '<option value="'.$nomeItem.'">'.$nomeItem.'</option>';
					}
					echo '</select>';
					}
				?> <br>
			
					<div class="botao">
						<input type="submit" class="btn btn-outline-light" value="Cadastrar">
					</div>
			</div>
				</form>
		</div>

		

				</body>
			</html>