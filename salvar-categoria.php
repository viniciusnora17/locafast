<?php 
    
include('database.php');
switch($_REQUEST['acao']){

    case 'categoria_salvar':
        $categoria = $_POST['categoria'];
        $valor_diaria = $_POST['valorDiaria'];
        
        $sql = "INSERT INTO categoria (Nome, valor_diaria) 
                VALUES('{$categoria}', '{$valor_diaria}')";

                $res = $conn->query($sql);

                if($res==true){
                        echo "<script>location.href='index.php'; alert('Cadastro realizado com sucesso!') </script>";
                       
                }else{
                        echo "<script>alert('Não foi possivel realizar o cadastro!')<script>";
                }

        exit;
        break;

        case 'categoria_editar':

                break;

    }
