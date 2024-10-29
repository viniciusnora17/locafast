<?php 
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/modelo.css">    
    <title>Cadastrar Modelos</title>
</head>
<body>
    
    <div class="container">
        <img src="img/carros.png" class="background-image">
        </div>
    
        
        <div class="formulario">
          
          <h1 class="tituloform">Cadastrar Modelo</h1>
          <form action="salvar-modelo.php" method="post">
            <input type="hidden" name="acao" value="salvar-modelo">
                 <div class="input-label-form">
                    <div class="inputnormais">

                <label for="modelo">Qual modelo você deseja cadastrar: </label>
                <input type="text" name="modelo" id="modelo">

                <label>Marca:</label>
                <select name="marca_idmarca" id="idmarca">
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


                <label>Categoria:</label>
                <select name="categorianame" id="categoriaid">
                    <?php 
                        include('database.php');

                        $sql = "SELECT * FROM categoria";
                        $res = $conn->query($sql);
    
                        if($res->num_rows > 0){
                            while($row = $res->fetch_object()){
                                echo "<option value='".$row->idCategoria."'>".$row->Nome."</option>";
                                }
                            }else{
                                echo "<option>Não há marcas cadastradas</option>";
                            }
        
                    ?>  
                </select>
                
                        <button class="botaoform" type="submit">Enviar</button>
                
       
                </div>
             
            </form>
          </div>
                
    </div>
</body>
</html>


