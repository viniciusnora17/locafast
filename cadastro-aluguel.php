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
    <title>Cadastrar Aluguel</title>
</head>
<body>
    
    <div class="container">
        <img src="img/carros.png" class="background-image">
        </div>
    
        
        <div class="formulario">
          
          <h1 class="tituloform">Cadastrar Aluguel</h1>
          <form action="salvar-aluguel.php" method="post">
            <input type="hidden" name="acao" value="salvar-aluguel">
                 <div class="input-label-form">
                    <div class="inputnormais">

                    <!-- <label>Status:</label> -->
                    <!-- <div class="inputradio">
                    <input type="radio" value="concluido" name="radinput" id="concluido"><p>Concluido</p>
                    <input type="radio" value="cancelado" name="radinput" id="alugado"><p>Cancelado</p>
                    <input type="radio" value="confirmada" name="radinput" id="manutencao"><p>Confirmada</p>
                </div> -->

                <label>Data da reserva: </label>
                <input type="date" name="datareserva" id="datareserva">

                <label>Data de devolução: </label>
                <input type="date" name="datadevolucao" id="datadevolucao">
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

                <label>Pessoas:</label>
                <select name="pessoasalugar" id="pessoasalugar" required>
                    <option value="">- Escolha -</option>
                    <?php 

                        $sql = "SELECT * FROM pessoas";
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
         
                    <label>Valor da diaria será de:</label>
                    <span id="spanjs"></span>

                    
                </div>
                <button onclick="enviar()" class="botaoform" type="submit">Enviar</button>
               
       
            </form>
          </div>
                
    </div>

    <script src="scriptaluguel.js"></script>
</body>
</html>


