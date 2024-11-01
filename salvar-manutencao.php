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
                header("Location: listar-manutencao.php");
        }else{
                echo "<script>alert('Não foi possivel cadastrar');</script>";
        }


        break;
        exit;

        case 'editar-manutencao':
                
             $descricao = $_POST['descricao'];
             $datamanutencao = $_POST['datamanutencao'];   
             $veiculosmanutencao = $_POST['veiculomanutencao'];
             $status = $_POST['radinput'];

             $sql = "UPDATE manutencao SET
             descricao ='{$descricao}',
             dataManutencao ='{$datamanutencao}',
             Veiculos_id ='{$veiculosmanutencao}'  
             WHERE
             idManutencao = ".$_REQUEST['id'];
        
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