<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/listagemcss.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    h1{
        font-family: "Fira Sans", sans-serif;
        text-align: center;
        margin-top: 20px;
    }
</style>
</head>
<body>
    <?php 

include('header.php');

include('database.php');

$sql = "SELECT 
ra.idAluguel,
ra.Status,
ra.dataReserva,
ra.data_devolucao,
m.Nome AS modelo_nome,
p.nome AS cliente_nome
FROM 
reserva_aluguel ra
JOIN 
veiculos v ON ra.Veiculos_id = v.id
JOIN 
modelo m ON v.Modelo_idModelo = m.idModelo
JOIN 
pessoas p ON ra.Pessoas_id = p.id_pessoas";

$res = $conn->query($sql);

$qtd = $res->num_rows;//Ele vai pegar do resultado a quantidade de linhas

if($qtd > 0){ 
    echo "<h1>Listagem de Aluguel</h1>";
    echo "<table class='tabela'>";    
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Status:</th>";
    echo "<th>Data da reserva </th>";
    echo "<th>Data de devolução</th>";
    echo "<th>Veiculo</th>";
    echo "<th>Cliente</th>";
    echo "<th>Valor</th>";
    echo "<th>Ações</th>";
    
    print "</tr>";
    while($row = $res->fetch_object()){
        print "<tr>";
        echo "<td>".$row->idAluguel."</td>";
        echo "<td>".$row->Status."</td>";
        echo "<td>".$row->dataReserva."</td>";
        echo "<td>".$row->data_devolucao."</td>";
        echo "<td>".$row->modelo_nome."</td>";
        echo "<td>".$row->cliente_nome."</td>";
        echo "<td>"."</td>";
        echo "<td>
        <div class ='botoes'>
        <button onclick=\"redirect($row->idAluguel)\" class='botaoeditar'>Editar</button>   
        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->idAluguel."'}else{console.log(123)}\" class='botaoexcluir'>Excluir</button>   
        </div>
        <td>";
        print "</tr>";
        
    }
    echo "</table>";
    
}else{
        echo "<p class='alert alert-danger'>Não encontrou resultados</p>";
    }
    ?>




<script src="scriptlistaraluguel.js"></script>
    

</body>
</html>