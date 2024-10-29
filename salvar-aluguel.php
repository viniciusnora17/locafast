<?php 

include('database.php');

switch($_REQUEST['acao']){
        
        case 'salvar-aluguel':
                
                $status = 'confirmada';
                $datareserva = $_POST['datareserva'];
                $datadevolucao = $_POST['datadevolucao'];
                $nomeVeiculo = $_POST['nomeVeiculo'];
                $pessoasalugar = $_POST['pessoasalugar'];

                $sql = "INSERT INTO reserva_aluguel (Status, dataReserva, data_devolucao, Veiculos_id, Pessoas_id) 
                VALUES('confirmada', '{$datareserva}', '{$datadevolucao}', '{$nomeVeiculo}', '{$pessoasalugar}')";
         
    
                $res = $conn->query($sql);

                if($res==true){
                        echo "<script>alert('Cadastro feito com sucesso');</script>"; 
                        header('location: index.php');
                
                }else{
                        echo "<script>alert('Não foi possivel cadastrar');</script>";
                }

        exit;
        break;

        case 'editar-modelo':

                $status = $_POST['radinput'];
                $datareserva = $_POST['datareserva'];
                $datadevolucao = $_POST['datadevolucao'];
                $nomeVeiculo = $_POST['nomeVeiculo'];
                $pessoasalugar = $_POST['pessoasalugar'];


                $sql = "UPDATE reserva_aluguel SET
                status='{$status}',
                dataReserva ='{$datareserva}',
                data_devolucao ='{$datadevolucao}',
                Veiculos_id = '{$nomeVeiculo}',
                Pessoas_id ='{$pessoasalugar}',
               '
                WHERE
                idAluguel = ".$_REQUEST['id'];        

    }
