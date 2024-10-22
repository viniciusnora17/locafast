<?php 
    
include('database.php');
switch($_REQUEST['acao']){

    case 'categoria':
        $categoria = $_POST['categoria'];
        
        $sql = "INSERT INTO categoria (Nome) 
                VALUES('{$categoria}')";


                $res = $conn->query($sql);

        $valordiaria = $_POST['valorDiaria'];

        $sql = "INSERT INTO categoria (valor_diaria) 
        VALUES('{$valordiaria}')";

        if($valordiaria == true){
                if($categoria=='Luxo'){
        $valordiaria == 150.00;
        
        }else if($categoria == 'SUV'){
        $valordiaria == 90.00;
        
        }else if($categoria == 'Comum'){
        $valordiaria == 70.00;
        }
        }
       
       

        exit;
        break;

    }
