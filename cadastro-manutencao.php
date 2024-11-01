<?php 
include('header.php');
include('database.php');
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
          
          <h1 class="tituloform" style="margin-top: 40px;">Registrar Manutenção</h1>
          <form action="salvar-manutencao.php" method="post">
            <input type="hidden" name="acao" value="salvar-manutencao">
                 <div class="input-label-form"> 
                    <div class="inputnormais">

                <label>Veiculo em manutencao: </label>
                <select name="veiculomanutencao" id="veiculomanutencao">
    <option value="">- Escolha -</option>
    <?php 
        $sql = "SELECT v.id, m.Nome 
                FROM veiculos v
                JOIN modelo m ON m.idModelo = v.Modelo_idModelo
                ORDER BY m.Nome";

        $res = $conn->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_object()) {
                echo "<option value='" . $row->id . "'>" . $row->Nome . "</option>";
            }
        } else {
            echo "<option>Não há modelos cadastrados</option>";
        }
    ?>  
</select>

                <label>Data da manutenção: </label>
                <input type="date" name="datamanutencao" id="datamanutencao">

                <label for="descricao">Descrição da manutenção: </label>
                <textarea style="height: 140px; font-size: 18px;" name="descricao" id="descricao"></textarea>
                
                <button class="botaoform" type="submit">Enviar</button>
                
       
                </div>
             
            </form>
          </div>
                
    </div>

    <script src="scriptmanutencao.js"></script>
</body>
</html>


