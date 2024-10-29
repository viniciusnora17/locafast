<?php 

include('database.php');
switch($_REQUEST['acao']){
    case 'salvar-manutencao':
        
        $veiculomanutencao = $_POST['veiculomanutencao'];
        $datamanutencao = $_POST['datamanutencao'];
        $descricao = $_POST['descricao'];
     

        $sql = "INSERT INTO manutencao (Veiculos_id, dataManutencao,
        descricao) 
                VALUES('{$veiculomanutencao}', '{$datamanutencao}', '{$descricao}')";

        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Cadastro feito com sucesso');</script>"; 
                header("Location: -pessoas.php");
        }else{
                echo "<script>alert('Não foi possivel cadastrar');</script>";
        }


        break;
        exit;

        case 'editar':
                
             $nome = $_POST['nome'];
             $cpf = $_POST['cpf'];   
             $data_nasc = $_POST['data_nasc'];
             $endereco = $_POST['endereco'];
             $telefone = $_POST['telefone'];
             $email = $_POST['email'];

             $sql = "UPDATE pessoas SET
             nome ='{$nome}',
             cpf ='{$cpf}',
             data_nascimento ='{$data_nasc}',
             endereco = '{$endereco}',
             telefone ='{$telefone}',
             email ='{$email}'
             WHERE
             id_pessoas = ".$_REQUEST['id'];
        
        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Editado com sucesso');</script>"; 
                header("Location: listar-pessoas.php");
        }else{
                echo "<script>alert('Não foi possivel editar');</script>";
              
} 
        break;

        case 'excluir':

                $sql = "DELETE FROM pessoas WHERE id_pessoas=".$_REQUEST['id'];

                $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Excluido com sucesso');</script>"; 
                header("Location: listar-pessoas.php");
        }else{
                echo "<script>alert('Não foi possivel excluir');</script>";
                header("Location: listar-pessoas.php");
} 

                break;
}              