<?php 
    
include('database.php');

if($_POST['idVeiculo']){
  
        $sql = "SELECT ra.locacao, ra.data_devolucao, ra.dataReserva, v.id AS id_veiculo, c.valor_diaria 
        FROM veiculos v
        JOIN reserva_aluguel ra
        INNER JOIN categoria c ON v.id_categoria = c.idCategoria
        WHERE v.id = " . $_POST['idVeiculo'];   

        $res = $conn->query($sql);

        $row = $res->fetch_object();

        echo json_encode([ 
                'valor_diaria' => $row->valor_diaria,
                'id_veiculo' => $row->id_veiculo
        ]);

}       
exit;

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
