<?php 

include('database.php');


if ($_POST['acao'] == 'calcular-dias' && isset($_POST['datareserva']) && isset($_POST['datadevolucao'])) {
    
        $datareserva = $_POST['datareserva'];
        $datadevolucao = $_POST['datadevolucao'];
    
    
        date_default_timezone_set('America/Sao_Paulo');
        
     
        $datareserva = DateTime::createFromFormat('Y-m-d', $datareserva);
        $datadevolucao = DateTime::createFromFormat('Y-m-d', $datadevolucao);
        
    
     
        $diferenca = $datareserva->diff($datadevolucao);

        echo json_encode( $diferenca->days);
    
}


switch($_REQUEST['acao']){

        case 'salvar-aluguel':
                
                $status = 'confirmada';
                $datareserva = $_POST['datareserva'];
                $datadevolucao = $_POST['datadevolucao'];
                $locacao = $_POST['locacao'];
                $nomeVeiculo = $_POST['nomeVeiculo'];
                $pessoasalugar = $_POST['pessoasalugar'];
                

                $sql = "INSERT INTO reserva_aluguel (Status, dataReserva, data_devolucao, locacao, Veiculos_id, Pessoas_id) 
                VALUES('confirmada', '{$datareserva}', '{$datadevolucao}', '{$locacao}','{$nomeVeiculo}', '{$pessoasalugar}')";
         
    
                $res = $conn->query($sql);

                if($res==true){
                        echo "<script>alert('Cadastro feito com sucesso');</script>"; 
                        echo "<script>window.location.href = 'listar-aluguel.php';</script>"; 
                        
                        
                
                }else{
                        echo "<script>alert('Não foi possivel cadastrar');</script>";
                }

        exit;
        break;

        case 'editar-aluguel':       

                $idAluguel = $_POST['idAluguel'];
                $veiculos_id = (int)$_POST['veiculos_id'];
                $pessoas_id = (int)$_POST['pessoas_id'];
                $status = $_POST['radinput'];
                $datareserva = $_POST['datareserva'];
                $datadevolucao = $_POST['datadevolucao'];

                $sql = "UPDATE reserva_aluguel SET
                status='{$status}',
                dataReserva ='{$datareserva}',
                data_devolucao ='{$datadevolucao}',
                Veiculos_id = {$veiculos_id},
                Pessoas_id = {$pessoas_id}
                WHERE
                idAluguel = ".$_REQUEST['idAluguel'];   
              
                 $res = $conn->query($sql);

                if($res==true){
                echo "<script>alert('Editado com sucesso');
                window.location.href='listar-aluguel.php'</script>"; 
               
                        }else{
                echo "<script>alert('Não foi possivel editar');</script>";
      
        } 
                break;

                case 'excluir':
                        $sql = "DELETE FROM reserva_aluguel WHERE idAluguel=" . $_REQUEST['id'];

                        $res = $conn->query($sql);
                    
                        if ($res == true) {
                            echo "<script>alert('Excluído com sucesso');</script>";
                            echo "<script>window.location.href = 'listar-aluguel.php';</script>"; 
                        } else {
                            echo "<script>alert('Não foi possível excluir');</script>";
                            echo "<script>window.location.href = 'listar-aluguel.php';</script>"; 
                        }
                        break;

}