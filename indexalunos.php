<?php
    session_start();
    include_once("conexao.php"); //incluindo a conexão com o banco de dados
?>
<!DOCTYPE html>
<html lang="pt-br"> <!-- Definindo que os dados estarão em Português -->
    <HEAD>
        <meta charset="UTF-8">

 

        <TITLE>Login de Acesso</TITLE>
        
        <!--  trabalhando com boodstrap--> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 

    </HEAD>

 

    <BODY>

 

<!--    
    <div class="card text-white bg-primary my-3" style="max-width: 18rem;">
  <div class="card-header">Card</div>
  <div class="card-body">
    <h5 class="card-title">Criando seu Primeiro Card</h5>
    <p class="card-text">Algum texto de exemplo rápido para desenvolver o título do cartão e compor a maior parte do conteúdo do cartão.</p>
  </div>
</div>
<div class="row bg-danger">
    <div class="col-6 d-flex justify-content-center">
        <button class="btn btn-success my-6">Teste</button>
    </div>
</div>

 

<div class="container">
  <div class="row">
    <div class="col-md-4 text-center">
      Coluna 01
    </div>
    <div class="col-md-4 text-center">
      Coluna 02
    </div>
    <div class="col-md-4 text-center">
      Coluna 03
    </div>
  </div>
</div>

 

-->

 

 

        <table border="1" width="740" align="center">

 

            <tr> 
                <td><img src="sislogo.gif" width="740" height="180" border="0"></td>
            </tr>

 

            <tr>
                <td bgcolor=#606060><p align="center"><font color="#FFFFFF">Login de Acesso ao Sistema</font></p></td>

 

            </tr>
            <tr>
                <td 
                <?php
                //mostrando a msg de login e senha inválidos!
                    if(isset($_SESSION['msg']))
                    {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
                </td>

 

            </tr>
            <tr>
        <td>
         <form action="principal.php" method="POST">  <!-- apontando para a tela principal-->
            <tr>
             <td>Nome:  <input type="text" size="55" name="nome"  placeholder="Digite o seu nome"></td>
            </tr>
            <tr> 
             <td>Cpf:  <input type="" size="55" name="cpf" placeholder="Digite o seu cpf"></td>
            </tr> 
            <tr> 
               <td><input type="submit" value="Acesso ao Sistema"></td>
             </tr>

 

        </form>
        </td>

 

        </tr> </table></p>
        

 

</BODY>

 

</HTML>