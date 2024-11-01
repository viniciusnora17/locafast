<?php 
include('header.php');
include('database.php');


$sql = "SELECT m.idManutencao, m.descricao, m.dataManutencao, 
             v.Placa, v.status, modelo.Nome AS modeloNome, marca.nomeMarca 
            FROM manutencao m
            JOIN veiculos v ON m.Veiculos_id = v.id
            JOIN modelo ON v.Modelo_idModelo = modelo.idModelo
            JOIN marca ON v.Marca_idMarca = marca.idMarca";

        $res = $conn->query($sql);

        $row = $res->fetch_object();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastrov.css">    
    <title>Editar Manutenção</title>

    <style>
        
        select{
            width: 500px;
            height: 45px;
            margin-left: 30px;

        }

        label{
            margin-left: 30px;
        }

        input{
            height: 45px;
            margin-left: 30px;
        }

        h1{
           margin-left: -50px;
           margin-bottom: 20px;
        }

        .inputradio{
            display: flex;
            justify-content: baseline;
            gap: 1;
        }



    </style>
</head>
<body>
    
    <div class="container">
        <img src="img/carros.png" class="background-image">
    </div>
    
    <div class="formulario">
        <form action="salvar-manutencao.php" method="POST">
            <h1 class="tituloform">Editar Manutenção</h1>
            <input type="hidden" name="acao" value="editar-manutencao">
            <input type="hidden" name="id" value="<?php echo $row->id;?>">

            <div class="input-label-form">
                <label>Veiculo: </label><br>
                <input type="text" name="veiculomanutencao" id="veiculomanutencao" value="<?php echo $row->modeloNome; ?>">
                <label>Data:</label><br>
                <input type="text" name="datamanutencao" id="datamanutencao" value="<?php echo $row->dataManutencao; ?>">
                    
                <label>Descrição:</label><br>
                <input type="text" name="descricao" id="descricao" value="<?php echo $row->descricao?>"><br>

                <br>
                <label>Status:</label>
                <div class="inputradio">
                    <input type="radio" value="disponivel" name="radinput" id="disponivel" checked><p>Disponível</p>
                    <input type="radio" value="alugado" name="radinput" id="alugado"><p>Alugado</p>
                    <input type="radio" value="manutencao" name="radinput" id="manutencao"><p>Em manutenção</p>
                </div>

                <button class="botaoform" type="submit">Salvar</button>
            </div>
        </form>
    </div>  
</body>
</html> 