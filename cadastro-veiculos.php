<?php 
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastrov.css">    
    <title>Cadastrar Veículos</title>
</head>
<body>
    
    <div class="container">
        <img src="img/carros.png" class="background-image">
        </div>
    
        
        <div class="formulario">
          
          <h1 class="tituloform">Cadastrar Veículo</h1>
          <form action="salvar-veiculos.php" method="post">
            <input type="hidden" name="acao" value="salvar-veiculos">
                 <div class="input-label-form">
                    <div class="inputnormais">

                <label>Placa: </label>
                <input type="text" name="placa">

                <label>Categoria:</label>
                <select name="categoriaid" id="categoriaid">

                <option value="">- Escolha -</option>
                    <?php 
                        include('database.php');

                        $sql = "SELECT * FROM categoria";
                        $res = $conn->query($sql);
    
                        if($res->num_rows > 0){
                            while($row = $res->fetch_object()){
                                echo "<option value='".$row->idCategoria."'>".$row->Nome."</option>";
                                }
                            }else{
                                echo "<option>Não há categorias cadastradas</option>";
                            }     
                    ?>  

                </select>

                <label>Marca:</label>
                <select name="marcaid" id="marcaid">
                    <option value="">- Escolha -</option>
                    <?php 
                        include('database.php');

                        $sql = "SELECT * FROM marca";
                        $res = $conn->query($sql);
    
                        if($res->num_rows > 0){
                            while($row = $res->fetch_object()){
                                echo "<option value='".$row->idMarca."'>".$row->nomeMarca."</option>";
                                }
                            }else{
                                echo "<option>Não há marcas cadastradas</option>";
                            }
        
                    ?>  
                </select>


                <label>Modelo:</label>
                <select name="modeloid" id="modeloid">
                <option value="">- Escolha -</option>
                    <?php 
                        include('database.php');

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

                <label>Status:</label>
                <div class="inputradio">
                    <input type="radio" value="disponivel" name="radinput" id="disponivel"><p>Disponível</p>
                    <input type="radio" value="alugado" name="radinput" id="alugado"><p>Alugado</p>
                    <input type="radio" value="manutencao" name="radinput" id="manutencao"><p>Em manutenção</p>
                </div>
                
                        <button class="botaoform" type="submit">Enviar</button>
       
                </div>
             
            </form>
          </div>
                
    </div>
</body>
</html>


