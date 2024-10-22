<?php 
    include('header.php');
    include('database.php');

    $sql = "SELECT * FROM pessoas WHERE id_pessoas=".$_REQUEST['id'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();

?>

<link rel="stylesheet" href="css/editar-pessoas.css"> 

<title>Cadastrar Veiculos</title>
<div class="container">
    <img src="img/carros.png" class="background-image">
    </div>

    
    <div class="formulario">
      <form action="salvar-pessoas.php">

      <h1 class="tituloform">Editar Pessoa</h1>

      <input type="hidden" name="acao" value="<?php echo $row->id_pessoas;?>">
         <div class="input-label-form">

        <label>Nome completo: </label> <br>
        <input type="text" name="nome" id="nome" value="<?php echo $row->nome;?>"><br>
       
        <label>CPF:</label><br>
        <input type="number" name="cpf" id="cpf" value="<?php echo $row->CPF;?>"><br>
        
        <label>Data de Nascimento:</label> <br>
        <input type="date" name="data_nasc" id="data_nasc" value="<?php echo $row->Data_Nascimento;?>"><br>
            
        <label>Endereço:</label> <br>
        <input type="text" name="endereco" id="endereco" value="<?php echo $row->Endereco;?>"><br>
            
          
        <label>Telefone:</label> <br>
        <input type="number" name="telefone" id="telefone" value="<?php echo $row->Telefone;?>"><br>
            

        <label>Email:</label> <br>
        <input type="email" name="email" id="email" value="<?php echo $row->Email;?>">  

        <button class="botaoform" type="submit">Salvar</button>
        </div>

      
    </div>
</form>
            
</div>