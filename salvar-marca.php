<?php 

    include('database.php');

switch($_REQUEST['acao']){
    case 'salvar-marca':
        
        $marca = $_POST['marca'];
        
        $sql_checar = "SELECT * FROM marca WHERE nomeMarca = '{$marca}'";
        $res_checar = $conn->query($sql_checar);

        
        if ($res_checar->num_rows > 0) {
                echo "<script>alert('A marca já está cadastrada.');</script>";
                echo "<script>window.location.href='cadastro-marca.php'</script>"; 
        } else {
                // Inserir a nova marca
                $sql = "INSERT INTO marca (nomeMarca) VALUES('{$marca}')";
                $res = $conn->query($sql);
                
                if ($res == true) {
                echo "<script>alert('Marca cadastrada com sucesso');</script>";
                echo "<script>window.location.href='index.php'</script>"; 
            } else {
                echo "<script>alert('Não foi possível cadastrar: " . $conn->error . "');</script>";
            }
        }
        exit;
        break;
}