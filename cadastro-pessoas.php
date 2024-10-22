<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleform.css">
    <title>Cadastro</title>
</head>
<body>

<?php 
include('header.php');
?>


  <div class="container">
    <img src="img/carros.png" class="background-image">
    </div>

    
    <div class="formulario">
      
      <h1 class="tituloform">Cadastrar-se</h1>
      <form action="salvar-pessoas.php" method="post">
        <input type="hidden" name="acao" value="cadastrar">
         <div class="input-label-form">
        <label>Nome completo: </label> 
        <input type="text" name="nome" id="nome"><br>
       
        
        <label>CPF:</label>
        <input type="number" name="cpf" id="cpf"><br>
        
        <label>Data de Nascimento:  </label> 
        <input type="date" name="data_nasc" id="data_nasc"><br>
            
        <label>Endereço:</label>
        <input type="text" name="endereco" id="endereco"><br>
            
          
        <label>Telefone:</label>
        <input type="number" name="telefone" id="telefone"><br>
            

        <label>Email:</label>
        <input type="email" name="email" id="email">  

        <button class="botaoform" type="submit">Enviar</button>
        </div>
         
        </form>
      </div>
            


</div>



  

</body>
</html>