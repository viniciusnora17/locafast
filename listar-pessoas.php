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

$sql = "SELECT * FROM pessoas";

$res = $conn->query($sql);

$qtd = $res->num_rows;//Ele vai pegar do resultado a quantidade de linhas

if($qtd > 0){ //se a qtd de linhas for ma
    print "<table class='tabela'>";    
    print "<tr>";
    echo "<th>#</th>";
    echo "<th>Nome</th>";
    echo "<th>CPF</th>";
    echo "<th>Data de Nascimento</th>";
    echo "<th>Endereço</th>";
    echo "<th>Telefone</th>";
    echo "<th>Email</th>";
    echo "<th>Ações</th>";
    print "</tr>";
    while($row = $res->fetch_object()){
        print "<tr>";
        echo "<td>".$row ->id_pessoas."</td>";
        echo "<td>".$row ->nome."</td>";
        echo "<td>".$row ->CPF."</td>";
        echo "<td>".$row ->Data_Nascimento."</td>";
        echo "<td>".$row ->Endereco."</td>";
        echo "<td>".$row ->Telefone."</td>";
        echo "<td>".$row ->Email."</td>";
        echo "<td>
        <div class ='botoes'>
        <button onclick=\"redirect($row->id_pessoas)\" class='botaoeditar'>Editar</button>   
        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id_pessoas."'}else{console.log(123)}\" class='botaoexcluir'>Excluir</button>   
        </div>
        <td>";
        print "</tr>";
        
    }
    echo "</table>";
    
}else{
        echo "<p class='alert alert-danger'>Não encontrou resultados</p>";
    }
    ?>




<script src="script.js"></script>
    

</body>
</html>