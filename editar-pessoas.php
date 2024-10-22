<?php 

    include('database.php');

    $sql = "SELECT * FROM pessoas WHERE id_pessoas=".$_REQUEST['id_pessoas'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    

?>

<form action="salvar-pessoas.php" method="post">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
         <div class="input-label-form">
        <label>Nome completo: </label> 
        <input type="text" name="nome" id="nome" value="<?php echo $row->nome; ?>"><br>
       
        
        <label>CPF:</label>
        <input type="number" name="cpf" id="cpf" value="<?php echo $row->cpf; ?>"><br>
        
        <label>Data de Nascimento:  </label> 
        <input type="date" name="data_nasc" id="data_nasc" value="<?php echo $row->data_nascimento; ?>"><br>
            
        <label>Endereço:</label>
        <input type="text" name="endereco" id="endereco" value="<?php echo $row->endereco; ?>"><br>
            
          
        <label>Telefone:</label>
        <input type="number" name="telefone" id="telefone" value="<?php echo $row->telefone; ?>"><br>

        <label>Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $row->email; ?>">  

        <button class="botaoform" type="submit">Enviar</button>
        </div>
         
        </form>