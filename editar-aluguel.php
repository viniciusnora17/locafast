<?php 
    include('header.php');
    include('database.php');

    $idAluguel = $_REQUEST['id'];

    if (!isset($idAluguel)) {
        die("ID do aluguel não fornecido.");
    }
 
    $sql = "SELECT 
    ra.idAluguel,
    ra.Status,
    ra.dataReserva,
    ra.data_devolucao,
    m.Nome AS modelo_nome,
    p.nome AS cliente_nome,
    ra.Veiculos_id,        
    ra.Pessoas_id          
    FROM 
        reserva_aluguel ra
    JOIN 
        veiculos v ON ra.Veiculos_id = v.id
    JOIN 
        modelo m ON v.Modelo_idModelo = m.idModelo
    JOIN 
        pessoas p ON ra.Pessoas_id = p.id_pessoas
    WHERE 
        ra.idAluguel";

    $res = $conn->query($sql);
 
    $row = $res->fetch_object();

?>

<link rel="stylesheet" href="css/editar-pessoas.css"> 
<link rel="stylesheet" href="css/cadastroa.css"> 

<title>Editar Aluguel</title>
<div class="container">
    <img src="img/carros.png" class="background-image">
    </div>

    
    <div class="formulario">
        <form action="salvar-aluguel.php" method="POST">
          <h1 class="tituloform">Editar Aluguel</h1>
     
      <input type="hidden" name="acao" value="editar-aluguel">
      <input type="hidden" name="idAluguel" value="<?php echo $row->idAluguel; ?>">
      <input type="hidden" name="veiculos_id" value="<?php echo $row->id; ?>"> 
      <input type="hidden" name="pessoas_id" value="<?php echo $row->id_pessoas; ?>"> 
      
         <div class="input-label-form">

             <br>
             
             <label>Data da reserva:</label><br>
             <input type="text" name="datareserva" id="datareserva" value="<?php echo $row->dataReserva;?>"><br>
             
             <label>Data da devolução:</label> <br>
             <input type="text" name="datadevolucao" id="datadevolucao" value="<?php echo $row->data_devolucao;?>"><br>
             
             <label>Nome Veiculo:</label>
             <select name="veiculos_id">
                    <option>- Escolha -</option>
                    <?php 
                    
                    $sql = "SELECT * FROM veiculos v JOIN modelo m ON m.idModelo = v.Modelo_idModelo";
                    $res = $conn->query($sql);

                    if($res->num_rows > 0){
                        while($row = $res->fetch_object()){
                            echo "<option value='".$row->id."'>".$row->Nome."</option>";
                        }  
                    }else{
                        echo "<option>Não há marcas cadastrada</option>";
                    }
                    

                    ?>
                </select>
             <br>
             
             <label>Clientes:</label>

             <select name="pessoas_id">
                    <option>- Escolha -</option>
                    <?php 
                    
                    $sql = "SELECT * FROM pessoas";
                    $res = $conn->query($sql);

                    if($res->num_rows > 0){
                        while($row = $res->fetch_object()){
                            echo "<option value='".$row->idPessoas."'>".$row->nome."</option>";
                        }
                        }else{
                            echo "<option>Não há modelos cadastrada</option>";
                        }

                    ?>  
                </select>


             
             <label>Status: </label> <br>
             <div class="inputradio">
                 <input value="concluido" type="radio" name="radinput" id="concluido">Concluido
                 <input value="cancelada" type="radio" name="radinput" id="cancelado">Cancelada
                 <input value="confirmada" type="radio" name="radinput" id="confirmada" checked>Confirmada
             </div>
             <button class="botaoform" type="submit">Salvar</button>
            </div>
 
    </div>
</form>
            
</div>

