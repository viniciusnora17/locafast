<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/listagemcss.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    
    h1{
        font-family: "Fira Sans", sans-serif;
        text-align: center;
        margin-top: 20px;
    }
</style>
    <title>Document</title>
</head>
<body>
    
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
    
    $qtd = $res->num_rows;
    
    if($qtd > 0){ 
        echo "<h1>Listagem de Manutenções</h1>";
        print "<table class='tabela'>";    
        print "<tr>";
        echo "<th>#</th>";
        echo "<th>Veículo</th>";
        echo "<th>Data</th>";
        echo "<th>Descrição</th>";
        echo "<th>Ação</th>";
        print "</tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            echo "<td>".$row->idManutencao."</td>";
            echo "<td>".$row->Placa." - ".$row->nomeMarca." ".$row->modeloNome."</td>";
            echo "<td>".$row->dataManutencao."</td>";
            echo "<td>".$row->descricao."</td>";
            
            echo "<td>
            <div class='botoes'>
            <button onclick=\"redirect($row->idManutencao)\" class='botaoeditar'>Editar</button>   
            <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->idManutencao."'}else{console.log(123)}\" class='botaoexcluir'>Excluir</button>   
            </div>
            </td>";
            print "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='alert alert-danger'>Não encontrou resultados</p>";
    }
    ?>
    
    <script src="scriptlistaraluguel.js"></script>
</body>
</html>
