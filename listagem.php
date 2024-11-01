<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/listagem.css">
    <title>Document</title>
</head>
<body>
    <?php 
        include("header.php");
    ?>
<div class="container">
    <img src="img/carros.png" class="background-image">
    </div>

    <h1>Listagens</h1>

    <div class="containers">
        <div class="container-branco">
            <h2 id="h2-1">Listar Pessoas</h2>
            <p>Tabela de todas as pessoas que já alugaram um carro, ou já passaram alguma vez aqui na LocaFast </p>
            <a class="hiperlink" href="listar-pessoas.php">Acessar</a>
        </div>
       
        <div class="container-branco2">
            <h2 id="h2-2">Listar Veículos</h2>
            <p>Tabela onde mostra todos os veículos que tem na concessionária, listados aqui</p>
            <a class="hiperlink" href="listar-veiculos.php">Acessar</a>
        </div>
        
        <div class="container-branco3">
            <h2 id="h2-3">Listar Alugueis</h2>
            <p>Tabela que mostra as pessoas que realizaram o aluguel, junto com o veículo que foi alugado</p>
            <a class="hiperlink" href="listar-aluguel.php">Acessar</a>
        </div>

        <div class="container-branco4">
            <h2 id="h2-3">Listar Manutenção</h2>
            <p>Tabela que mostra as manutenções que foram realizadas em um dos veículos </p>
            <a class="hiperlink" href="listar-manutencao.php">Acessar</a>
        </div>
    </div>

  
    
</body>
</html>