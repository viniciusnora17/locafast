<?php 

include('database.php');
switch($_REQUEST['acao']){
    case 'salvar-marca':
        
        $marca = $_POST['marca'];
        
        $sql = "INSERT INTO marca (nomeMarca) 
                VALUES('{$marca}')";

        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Marca cadastrada com sucesso');</script>"; 
                header('location: cadastro-marca.php');
        }else{
                echo "<script>alert('Não foi possivel cadastrar');</script>";
               
        }

        exit;
        break;

    }
