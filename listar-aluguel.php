<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/listagemcss.css">
</head>
<body>
    <?php 

include('header.php');

include('database.php');

$sql = "SELECT * FROM reserva_aluguel";

$res = $conn->query($sql);

$qtd = $res->num_rows;//Ele vai pegar do resultado a quantidade de linhas

if($qtd > 0){ 
    print "<table class='tabela'>";    
    print "<tr>";
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
        echo "<td>".$row->Veiculos_id."</td>";
        echo "<td>".$row->Pessoas_id."</td>";
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