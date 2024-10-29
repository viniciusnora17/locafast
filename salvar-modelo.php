<?php 

include('database.php');
switch($_REQUEST['acao']){
        
    case 'salvar-modelo':
        
        // var_dump($_POST['modelo']);
        // exit;

        $modelo = $_POST['modelo'];
        $marca_idmarca = $_POST['marca_idmarca'];
        $categorianame = $_POST['categorianame'];

        
        $sql = "INSERT INTO modelo (Nome, Marca_idMarca, Categoria_idCategoria) 
                VALUES('{$modelo}', {$marca_idmarca}, {$categorianame})";


        $res = $conn->query($sql);

        if($res==true){
                echo "<script>alert('Cadastro feito com sucesso');location.href='index.php'</script>"; 
               
                
        }else{
                echo "<script>alert('Não foi possivel cadastrar');</script>";
        }

        exit;
        break;

    }
