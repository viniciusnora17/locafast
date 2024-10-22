<?php 
include('database.php');
switch($_REQUEST['acao']){
   
    case 'salvar-veiculos':
        
        $placa = $_POST['placa'];
        $id_categoria = $_POST['categoriaid'];
        $marcaid = $_POST['marcaid'];
        $modeloid = $_POST['modeloid'];
        $status = $_POST['radinput'];

    
        $sql = "INSERT INTO veiculos (Placa, id_categoria, Marca_idMarca, Modelo_idModelo, status) 
                VALUES('{$placa}', {$id_categoria}, {$marcaid}, {$modeloid}, '{$status}')";


        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Veículo cadastrado com sucesso');</script>"; 
                header('location: index.php');
                
        }else{
                echo "<script>alert('Não foi possivel cadastrar o veículo');</script>";
        }
        exit;
        break;

    }

?>