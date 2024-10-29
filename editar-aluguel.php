<?php 
    include('header.php');
    include('database.php');

    $sql = "SELECT * FROM reserva_aluguel WHERE idAluguel=".$_REQUEST['id'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();

?>

<link rel="stylesheet" href="css/editar-pessoas.css"> 
<link rel="stylesheet" href="css/cadastroa.css"> 

<title>Editar pessoas</title>
<div class="container">
    <img src="img/carros.png" class="background-image">
    </div>

    
    <div class="formulario">
        <form action="salvar-pessoas.php" method="POST">
          <h1 class="tituloform">Editar Aluguel</h1>
     
      <input type="hidden" name="acao" value="editar-aluguel">
      <input type="hidden" name="id" value="<?php echo $row->idAluguel;?>">
         <div class="input-label-form">

        <label>Status: </label> <br>
        <div class="inputradio">
            <input value="concluido" type="radio" name="radinput" id="radinput">Concluido
            <input value="cancelada" type="radio" name="radinput" id="radinput">Cancelada
            <input value="confirmada" type="radio" name="radinput" id="radinput" checked>Confirmada
        </div>
        <br>
       
        <label>Data da reserva:</label><br>
        <input type="date" name="datareserva" id="cpf" value="<?php echo $row->dataReserva;?>"><br>
        
        <label>Data da devolução:</label> <br>
        <input type="date" name="datadevolucao" id="data_nasc" value="<?php echo $row->data_devolucao;?>"><br>
            
        <label>Nome Veiculo:</label>
        <select name="nomeVeiculo" id="nomeVeiculo">

                <option value="">- Escolha -</option>
                    <?php 

                        $sql = "SELECT veiculos.id, modelo.nome FROM  veiculos INNER JOIN modelo ON modelo.idModelo = veiculos.Modelo_idModelo";

                        $res = $conn->query($sql);

                        if($res->num_rows > 0){
                            while($row = $res->fetch_object()){
                                echo "<option value='".$row->id."'>".$row->nome."</option>";
                                }
                            }else{
                                echo "<option>Não há marcas cadastradas</option>";
                            }

                    ?>  
                </select>
                <br>
            
        <label>Clientes:</label>
        
        
        <?php 
       echo "<select name='nomeVeiculo' id='nomeVeiculo'>";
        echo "<option value='".$row->id."'>".$row->nome."</option>";

        $sql = "SELECT nome FROM pessoas";

        $res = $conn->query($sql);

        if($res->num_rows > 0){
            while($row = $res->fetch_object()){
                echo "<option value='".$row->id_pessoas."'>".$row->nome."</option>";
                }
            }else{
                echo "<option>Não há marcas cadastradas</option>";
            }
    ?> 
         
</select>        
        
        <button class="botaoform" type="submit">Salvar</button>
        </div>

      
    </div>
</form>
            
</div>

