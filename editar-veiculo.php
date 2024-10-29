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
    <link rel="stylesheet" href="css/cadastrov.css">    
    <title>Editar Veículos</title>
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
        <form action="salvar-veiculos.php" method="POST">
            <h1 class="tituloform">Editar Veículos</h1>
            <input type="hidden" name="acao" value="editar-veiculos">
            <input type="hidden" name="id" value="<?php echo $row->id;?>">

            <div class="input-label-form">
                <label>Placa: </label><br>
                <input type="text" name="placa" id="placa" value="<?php echo $row->Placa;?>"><br>
                
                <label>Marca:</label><br>
                <select name="marcaid" id="marca">
                    <option value="<?php echo $row->Marca_idMarca; ?>"><?php echo $row->nome_marca; ?></option>
                   
                </select><br>
                
                <label>Modelo:</label><br>
                <select name="modeloid" id="modelo">
                    <option value="<?php echo $row->Modelo_idModelo; ?>"><?php echo $row->nome_modelo; ?></option>

                </select><br>

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