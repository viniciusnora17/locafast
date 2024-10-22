<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                 <button onclick=\"location.href='editar-pessoas.php&id=".$row->id_pessoas."';\" class='botaoeditar'>Editar</button>   
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


<style>
@import url('https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    .tabela{
            
        display: flex; 
        justify-content: center; 
        align-items: center;
        border: 1px solid black;
        align-items: center;
        width: 1350px;
        border-collapse: collapse;
        margin: auto;
        margin-top: 50px;
        
        
    }

    th{
        background-color: lightgrey;
        width: 1000px;
    }

    td, tr, th{
        font-size: 13px;
        
        height: 50px;
        text-align: center;
        font-family: "Fira Sans", sans-serif;
    }

    .botoes{
        display: flex;
        justify-content: center;
        gap: 20px;
        width: 300px;   
        margin-left: 55px;
    }

    .botaoeditar{

        width: 100px;
        height: 30px;
        border: none;
        cursor: pointer;
        background-color: #0275d8;
        color: white;
    }

    .botaoexcluir{
        width: 100px;
        height: 30px;
        border: none;
        cursor: pointer;
        background-color: #d9534f;
        color: white;
    }
</style>

</body>
</html>