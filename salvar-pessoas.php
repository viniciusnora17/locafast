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
                echo "<script>alert('Cadastro feito com sucesso'); 
                window.location.href='listar-pessoas.php'</script>"; 
                
        }else{
                echo "<script>alert('Não foi possivel cadastrar');</script>";
        }


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
             data_nascimento ='{$data_nasc}',
             endereco = '{$endereco}',
             telefone ='{$telefone}',
             email ='{$email}'
             WHERE
             id_pessoas = ".$_REQUEST['id'];
        
        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Editado com sucesso');window.location.href='listar-pessoas.php'</script>"; 
                
        }else{
                echo "<script>alert('Não foi possivel editar');</script>";
              
} 
        break;

        case 'excluir':

                $sql = "DELETE FROM pessoas WHERE id_pessoas=".$_REQUEST['id'];

                $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Excluido com sucesso');</script>"; 
                echo "<script>window.location.href='listar-pessoas.php';</script>"; 
        }else{
                echo "<script>alert('Não foi possivel excluir');</script>";
                echo "<script>window.location.href='listar-pessoas.php';</script>"; 
} 

                break;
}              