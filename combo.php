<?php header("Content-type: text/html; charset=utf-8");

include_once('conexao.php');



if (!$conn) {
 die('Não foi possível conectar ao MySQL');
}
 $sql = "SELECT nome FROM professor";
 $resultado = mysqli_query($conn,$sql) or die(mysql_error()."<br>Erro ao executar a inserção dos dados");

if (mysqli_num_rows($resultado)!=0){
 echo '<form name="Combobox" action="processalista.php" method="POST">';
 echo '<select name="itens" id="itens">
 <option value=" " selected="selected">Escolha um professor:</option>';
 while($elemento = mysqli_fetch_array($resultado))
 {
   $nomeItem = $elemento['nome'];
   echo '<option value="'.$nomeItem.'">'.$nomeItem.'</option>';
 }
 echo '</select>';
echo '<input type="submit" name="btnEnvia" value="Enviar">';
echo '</form>';
}
?>