<h1>Listar Marca</h1>
<?php 
    $sql = "SELECT * FROM marca";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd > 0){
        echo "<p>Econtrou <b>$qtd</b> resultado(s).</p>";
        echo "<table class='table table-bordered table-striped table-hover'>";
        echo "<tr>";
        echo "<th>#<th>"; 
        //aqui traz do banco de dados as informações que tem neles
        echo "<th>Nome da marca<th>";
        echo "<th>Ações<th>";
        echo "</tr>";
        while($row = $res->fetch_object()){
            //um loop para ele ficar trazendo as informações
            echo "<tr>";
            echo "<td>".$row ->id_marca."<td>"; //aqui traz do banco de dados as informações que tem neles
            echo "<td>".$row ->nome_marca."<td>";
            echo "<td>
                <button onclick=\"location.href='?page=marca-editar&id_marca=".$row->id_marca."';\" class='btn btn-primary'>Editar</button>

                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){
                location.href='?page=marca-salvar&acao=excluir&id_marca=".$row->id_marca."';
                }else{false}\" 
                class='btn btn-danger'>Excluir</button>

                  </td>";
            echo "</tr>";
            //aqui temos um botão contatando um if de javascript que aparece a mensagem tem certeza que deseja excluir, e ela é mandada para a page salvar com a acao de excluir //
        }
        echo "</table>";
    }else{
        echo "<p>Não encontrou o resultado</p>";
    }
?>