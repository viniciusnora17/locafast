<?php 

include('database.php');
switch($_REQUEST['acao']){

    case 'salvar-modelo':
        
        $modelo = $_POST['modelo'];
        $marca_idmarca = $_POST['marca_idmarca'];
        $categorianame = $_POST['categorianame'];

        
        $sql = "INSERT INTO modelo (Nome, Marca_idMarca, Categoria_idCategoria) 
                VALUES('{$modelo}', {$marca_idmarca}, {$categorianame})";


        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Cadastro feito com sucesso');</script>"; 
                header('location: index.php');
                
        }else{
                echo "<script>alert('Não foi possivel cadastrar');</script>";
        }

        exit;
        break;

    }