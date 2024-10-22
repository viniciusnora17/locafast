<?php 

include('database.php');
switch($_REQUEST['acao']){
    case 'cadastrar':
        
       
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $data_nasc = $_POST['data_nasc'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        $sql = "INSERT INTO pessoas (nome, cpf, data_nascimento, endereco, telefone, email) 
                VALUES('{$nome}', '{$cpf}', '{$data_nasc}', '{$endereco}', '{$telefone}', '{$email}')";

        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Cadastro feito com sucesso');</script>"; 
                header("Location: listar-pessoas.php");
        }else{
                echo "<script>alert('Não foi possivel cadastrar');</script>";
        }

        exit;
        break;

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
             data_nasc ='{$data_nasc}',
             endereco = '{$endereco}',
             telefone ='{$telefone}',
             email ='{$email}'
             WHERE
             id = ".$_REQUEST['id'];
        
        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Editado com sucesso');</script>"; 
                header("Location: listar-pessoas.php");
        }else{
                echo "<script>alert('Não foi possivel editar');</script>";
                header("Location: listar-pessoas.php");
} 
        break;

        case 'excluir':

                $sql = "DELETE FROM pessoas WHERE id_pessoas=".$_REQUEST['id_pessoas'];

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