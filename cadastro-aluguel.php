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
            <input type="hidden"  value="salvar-categoria.php">
                 <div class="input-label-form">
                    <div class="inputnormais">

                    <!-- <label>Status:</label> -->
                    <!-- <div class="inputradio">
                    <input type="radio" value="concluido" name="radinput" id="concluido"><p>Concluido</p>
                    <input type="radio" value="cancelado" name="radinput" id="alugado"><p>Cancelado</p>
                    <input type="radio" value="confirmada" name="radinput" id="manutencao"><p>Confirmada</p>
                </div> -->

                <label>Data da reserva: </label>
                <input onchange="enviar()" type="date" name="datareserva" class="calculo">

                <label>Data de devolução: </label>
                <input  onchange="enviar()" type="date" name="datadevolucao" class="calculo">
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
         
                    <label>Valor da diaria será de: <span class="valor"></span></label>
                    <input type="hidden" name="locacao" class="valor" id="calcular">
               
                </div>
                <button onclick="enviar()" class="botaoform" type="submit">Enviar</button>
       
            </form>
          </div>
                
    </div>
    
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
    <script src="scriptaluguel.js"></script>
</body>
</html>


