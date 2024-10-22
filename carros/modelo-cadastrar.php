<h1>Cadastrar Modelo</h1>
<form action="?page=modelo-salvar" method="post">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Marca</label>
        <select name="marca_id_marca" class="form-control">
            <option>-Escolha-</option>
            <?php 
                $sql = "SELECT * FROM marca";
                $res = $conn->query($sql);
                
                if($res->num_rows > 0){
                    while($row = $res->fetch_object()){
                        echo "<option value='".$row->id_marca."'>".$row->nome_marca."</option>";
                    }
                }else{
                    echo "<option>Não há marcas cadastradas</option>";
                }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Modelo</label>
        <input type="text" name="nome_modelo" class="form-control">
    </div>

    <div class="mb-3">
        <label>Cor</label>
        <input type="text" name="cor_modelo" class="form-control">
    </div>

    <div class="mb-3">
        <label>Ano do Modelo</label>
        <input type="text" name="ano_modelo" class="form-control">
    </div>

    <div class="mb-3">
        <label>Placa</label>
        <input type="text" name="placa_modelo" class="form-control">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-sucess">Enviar</button>
    </div>
</form>