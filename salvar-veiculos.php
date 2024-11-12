<?php 
include('database.php');        
                
switch($_REQUEST['acao']){   
        case 'salvar-veiculos':

        $placa = $_POST['placa'];
        $marcaid = $_POST['marcaid'];
        $id_categoria = $_POST['categoriaid'];
        $modeloid = $_POST['modeloid'];
        $status = $_POST['radinput'];

    
        $sql = "INSERT INTO veiculos (Placa, id_categoria,  Marca_idMarca, Modelo_idModelo, status) 
                VALUES('{$placa}', {$id_categoria}, {$marcaid}, {$modeloid}, '{$status}')";


        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Veículo cadastrado com sucesso');
                window.location.href='index.php'</script>";       
                
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
             Marca_idMarca = '{$marcaid}',
             Modelo_idModelo = '{$modeloid}',
             status = '{$status}'
             WHERE
             id = ".$_REQUEST['id'];

        echo $sql; // Para verificar a query
        $res = $conn->query($sql) or die($conn->error);

        
        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Editado com sucesso');
                window.location.href='listar-veiculos.php'</script>"; 
                
        }else{
                echo "<script>alert('Não foi possivel editar');</script>";            
        } 
         break;


         case 'excluir':
                
                $sql = "DELETE FROM veiculos WHERE id=".$_REQUEST['id'];

                $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Excluido com sucesso');</script>"; 
                echo "<script>window.location.href='listar-veiculos.php';</script>"; 

        }else{
                echo "<script>alert('Não foi possivel excluir');</script>";
                echo "<script>window.location.href='listar-veiculos.php';</script>"; 
               
} 
                break;
}              
    


        


?>

