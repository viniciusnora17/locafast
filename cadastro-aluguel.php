<?php 
include('database.php');
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastroaluguel.css">    
    <title>Cadastrar Veículos</title>
</head>
<body>
    
    <div class="container">
        <img src="img/carros.png" class="background-image">
        </div>
    
        
        <div class="formulario">
          
          <h1 class="tituloform">Cadastrar Aluguel</h1>
          <form action="salvar-veiculos.php" method="post">
            <input type="hidden" name="acao" value="salvar-veiculos">
                 <div class="input-label-form">
                    <div class="inputnormais">

                    <label>Status:</label>
                <div class="inputradio">
                    <input type="radio" value="concluido" name="radinput" id="concluido"><p>Concluido</p>
                    <input type="radio" value="cancelado" name="radinput" id="alugado"><p>Cancelado</p>
                    <input type="radio" value="confirmada" name="radinput" id="manutencao"><p>Confirmada</p>
                </div>


                <label>Data da reserva: </label>
                <input type="date" name="datareserva" id="datareserva">

                <label>Data de devolução: </label>
                <input type="date" name="datadevolucao" id="datadevolucao">

                <label>Placa Veiculo:</label>
                <select name="veiculosalugar" id="veiculosalugar">

                <option value="">- Escolha -</option>
                    <?php 

                        $sql = "SELECT * FROM veiculos";
                        $res = $conn->query($sql);
    
                        
                    ?>  

                </select>

                <label>Pessoas:</label>
                <select name="pessoasalugar" id="pessoasalugar">
                    <option value="">- Escolha -</option>
                    <?php 
                      

                        $sql = "SELECT * FROM pessoas";
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


                <label>Valor:</label>
                <select name="locacao" id="locacao">
                <option value="">- Escolha -</option>
                    <?php 
                     

                        $sql = "SELECT * FROM modelo";
                        $res = $conn->query($sql);
    
                        if($res->num_rows > 0){
                            while($row = $res->fetch_object()){
                                echo "<option value='".$row->idModelo."'>".$row->Nome."</option>";
                                }
                            }else{
                                echo "<option>Não há modelos cadastradas</option>";
                            }
        
                    ?>  
                </select>

              
                
                        <button class="botaoform" type="submit">Enviar</button>
       
                </div>
             
            </form>
          </div>
                
    </div>

    <script src="script.js"></script>
</body>
</html>


