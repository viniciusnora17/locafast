<?php 
include('database.php');

                
switch($_REQUEST['acao']){   
        case 'salvar-veiculos':
        $placa = $_POST['placa'];
        $marcaid = $_POST['marcaid'];
        $modeloid = $_POST['modeloid'];
        $status = $_POST['radinput'];

    
        $sql = "INSERT INTO veiculos (Placa,  Marca_idMarca, Modelo_idModelo, status) 
                VALUES('{$placa}', {$marcaid}, {$modeloid}, '{$status}')";


        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Veículo cadastrado com sucesso');</script>"; 
                header('location: index.php');
                
        }else{
                echo "<script>alert('Não foi possivel cadastrar o veículo');</script>";
        }
        exit;
        break;
        
        case 'editar-veiculos':
                
                $placa = $_POST['placa'];
                $marcaid = $_POST['marcaid'];
                $modeloid = $_POST['modeloid'];
                $status = $_POST['radinput'];
             

             $sql = "UPDATE veiculos SET
             Placa ='{$placa}',
             Marca_idMarca ='{$marcaid}',
             Modelo_idModelo ='{$modeloid}',
             status = '{$status}'
             WHERE
             id = ".$_REQUEST['id'];
        
        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Editado com sucesso');</script>"; 
                header("Location: listar-pessoas.php");
        }else{
                echo "<script>alert('Não foi possivel editar');</script>";
              
} 
        break;
    }

?>