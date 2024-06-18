<?php
   session_start();
   include_once('conexao.php');
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Adicionar matéria</title>
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
	height: 250px;
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

img{
		width: 25px;
	height: 25px;
	}

.tb_Alinha{
    width: 400px;
}

	</style>

	<body>
	<ul>
		<li><a href = "sair.php">Sair do Sistema</a></li>
		<li><a href = "principal.php">Voltar Principal</a></li>
	</ul>
	
		

		<center><h1>Cadastrar Matéria</h1>
		
		<div class="form1">
			<form method ="POST" id="form_1" action="pro_adc_materia.php">
			<div class="alinhar">
				<div class="label">
					<div class="mb-3">
						<!--Nome da matéria-->
						<label for="formGroupExampleInput" class="form-label">Nome:</label>
						<input type="text" name="nome" class="form-control" id="formGroupExampleInput" required placeholder="Digite o nome da matéria">
					</div>
				</div>
			
					<div class="botao">
						<input type="submit" class="btn btn-outline-light" value="Cadastrar">
					</div>
			</div>
				</form>
		</div>




        <?php
	if (isset($_SESSION['msg'])) //verificando o conteudo da variavel e mostrando
	{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		
	}
	//Receber o Numero da pagina
	$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
	$pagina = (!empty($pagina_atual)) ?$pagina_atual : 1;
	
	//setar a quantidade de itens por pagina
	$qnt_result_pg = 4;
	
	//calcular o inicio visualização
	$inicio = ($qnt_result_pg *$pagina) - $qnt_result_pg;
	
	$sql = "SELECT * FROM adc_mat LIMIT $inicio, $qnt_result_pg";
	$comando = mysqli_query($conn, $sql);
	
	?>

<div class="tb_alinha">
	<div class="m-5">
		<table class="table table-hover table-bg	">
			<thead>
				<tr>
				<th scope="col">#</th>
				<th scope="col">Nome</th>
				<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($row_adc_mat = mysqli_fetch_assoc($comando) )
					{
						echo "<tr>";
						echo "<td>" . $row_adc_mat['codigo'] . "</td>";
						echo "<td>" . $row_adc_mat['nome'] . "</td>";
						echo "<td><a href='edit_adc_mat.php?codigo=" . $row_adc_mat['codigo'] . "'><img src='image/edit.png'></a>
						 <a href='delete_adc_mat.php?codigo=" . $row_adc_mat['codigo'] . "'><img src='image/delete.png'> </a> </td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
    </div>
	
		<?php
	
	$sql = "SELECT COUNT(codigo) AS num_result FROM adc_mat";
	$resultado_pg = mysqli_query ($conn, $sql);
	$row_pg = mysqli_fetch_assoc($resultado_pg);
	
	$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
	
	
	$max_links = 2;
	echo "<a href='adc_mat.php?pagina=1'>Primeira</a> ";
	
	for ($pag_ant = $pagina = $max_links; $pag_ant <= $pagina = 1; $pag_ant++)
	{
		if ($pag_ant>=1)
		{
			echo "<a href ='adc_mat.php?pagina=$pag_ant'>$pag_ant</a>";
		}
			
	}
	
	echo "$pagina ";
	
	for($pag_dep = $pagina + 1; $pag_dep <= $pagina = $max_links; $pag_dep++)
	{
		if($pag_dep <= $quantidade_pg)
		{
			echo "<a href='adc_mat.php?pagina=$pag_dep'>$pag_dep</a>";
		}
	}
	
	echo "<a href='adc_mat.php?pagina=$quantidade_pg'> Ultima</a>";
	
	?>


				</body>
			</html>