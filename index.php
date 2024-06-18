<?php
    session_start();
    include_once("conexao.php"); //incluindo a conexão com o banco de dados
?>
<!DOCTYPE html>
<html lang="pt-br"> <!-- Definindo que os dados estarão em Português -->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<TITLE>Login de Acesso</TITLE>
        
        <!--  trabalhando com boodstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
            <!--<style>
        body{
            font-family: Arial, Helvetica, sans-serif;
             background-image: url("image/centro_paula.jpg");

       }
        div{
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: black;
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        button{
            background-color: green;
            border: none;
            padding: 15px;
            width: 80%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        button:hover{
            background-color: SlateBlue1;
            cursor: pointer;
			color: white;
        }
    </style>-->
  
	</head>
    <body>
            <div>
              <center><h1>Login de Acesso</h1> </center><br><br><br>
               </tr>
            <tr>
                <td>
                <?php
                    if(isset($_SESSION['msg']))
                    {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
                </td>

           </tr>
          
       <!--<td>
         <form action="proc_login.php" method="POST"> 
            <tr>
             <td>E-mail:   <input type="text" placeholder="E-mail" name= "email">
        <br><br>
            </tr>
            <tr>
             <td>Senha:   <input type="password" placeholder="Senha" name= "senha">
        <br><br>
            </tr>
            <tr>
                <button>Entrar no Sistema</button><br><br>
				 <button><a href="cad_usuario.php">Cadastrar</a></button>
             </tr>
       </form>
        </td>
		</tr> </table></p>
        --->

        <section class="vh-100">
  
  
        <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="image/centro.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

        <form action="proc_login.php" method="POST">

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Digite seu E-mail" name="email">
            <label class="form-label" for="form3Example3">Usuario</label>
          </div>
                 
          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Digite sua senha" name="senha">
            <label class="form-label" for="form3Example4">Senha</label>
          </div>
                  
          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <!--<div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Lembre-me
              </label>
            </div>-->
            <a href="#!" class="text-body"><!--Esqueceu sua senha?--></a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            
          </div>
        </form>
      </div>
    </div>
  </div>
  
  </body>
</html>