<?php 
include('header.php');
include('database.php');


$sql = "SELECT v.id, v.Placa, m.nomeMarca AS nome_marca, mo.Nome AS nome_modelo 
        FROM veiculos AS v 
        INNER JOIN marca AS m ON v.Marca_idMarca = m.idMarca 
        INNER JOIN modelo AS mo ON v.Modelo_idModelo = mo.idModelo 
        WHERE v.id = " . intval($_REQUEST['id']); 

$res = $conn->query($sql);

if ($res) {
    $row = $res->fetch_object();
} else {
    echo "Erro na consulta: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/editarv.css">    
    <title>Editar Veículos</title>
   

</head>
<body>
    
    <div class="container">
        <img src="img/carros.png" class="background-image">
    </div>
    
    <div class="formulario">
        <form action="salvar-veiculos.php" method="POST">
            <h1 class="tituloform">Editar Veículos</h1>
            <input type="hidden" name="acao" value="editar-veiculos">
            <input type="hidden" name="id" value="<?php echo $row->id;?>">
            
            <label>Status:</label><br>
            <div class="inputsradio ">
                
                <input type="radio" class="inputs" value="disponivel" name="radinput" id="disponivel" checked>Disponível
                <input type="radio" class="inputs" value="alugado" name="radinput"  id="alugado">Alugado
                <input type="radio" class="inputs" value="manutencao" name="radinput" id="manutencao">Manutenção
            </div>
                    
            <div class="input-label-form">
                <label>Placa: </label>
                <input type="text" name="placa" id="placa" value="<?php echo $row->Placa;?>">
             
                <label>Marca:</label>
         
                <select name="marcaid">
                    <option>- Escolha -</option>
                    <?php 
                    
                    $sql = "SELECT * FROM marca";
                    $res = $conn->query($sql);

                    if($res->num_rows > 0){
                        while($row = $res->fetch_object()){
                            echo "<option value='".$row->idMarca."'>".$row->nomeMarca."</option>";
                        }  
                    }else{
                        echo "<option>Não há marcas cadastrada</option>";
                    }
                    

                    ?>
                </select>

                <label>Modelo:</label>
                <br>
                <button class="botaoform" type="submit">Salvar</button>
                <select name="modeloid">
                    <option>- Escolha -</option>
                    <?php 
                    
                    $sql = "SELECT * FROM modelo";
                    $res = $conn->query($sql);

                    if($res->num_rows > 0){
                        while($row = $res->fetch_object()){
                            echo "<option value='".$row->idModelo."'>".$row->Nome."</option>";
                        }
                        }else{
                            echo "<option>Não há modelos cadastrada</option>";
                        }

                    ?>  
                </select>
                        </div>  
                        
                    </form>
                </div>
                </body>
                </html> 