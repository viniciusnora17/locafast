<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/listagemcss.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    h1{
        font-family: "Fira Sans", sans-serif;
        text-align: center;
        margin-top: 20px;
    }
</style>
<body>
    <?php 
include('header.php');
include('database.php');

$sql = "SELECT v.*, m.Nome, a.nomeMarca 
FROM veiculos v
JOIN marca a ON a.idMarca = v.Marca_idMarca
JOIN modelo m ON m.idModelo = v.Modelo_idModelo
ORDER BY m.Nome AND a.nomeMarca";

$res = $conn->query($sql);

$qtd = $res->num_rows;//Ele vai pegar do resultado a quantidade de linhas

if($qtd > 0){ //se a qtd de linhas for ma
    echo "<h1>Listagem de Veículos</h1>";
    print "<table class='tabela'>";    
    print "<tr>";
    echo "<th>#</th>";
    echo "<th>Placa</th>";
    echo "<th>Marca</th>";
    echo "<th>Modelo</th>";
    echo "<th>Status</th>";   
    echo "<th>Manutenção</th>";
    print "</tr>";
    while($row = $res->fetch_object()){
        print "<tr>";
        echo "<td>".$row ->id."</td>";
        echo "<td>".$row ->Placa."</td>";
        echo "<td>".$row ->nomeMarca."</td>";
        echo "<td>".$row ->Nome."</td>";
        echo "<td>".$row ->status."</td>";
        
        echo "<td>
        <div class ='botoes'>
        <button onclick=\"redirect($row->id)\" class='botaoeditar'>Editar</button>   
        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='salvar-veiculos.php?acao=excluir&id=".$row->id."'}else{false;}\" class='botaoexcluir'>Excluir</button>   
        </div>
        <td>";
        print "</tr>";
        
    }
    echo "</table>";
    
}else{
        echo "<p class='alert alert-danger'>Não encontrou resultados</p>";
    }
    ?>




<script src="scriptveiculos.js"></script>
    

</body>
</html>