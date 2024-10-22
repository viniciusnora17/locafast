<h1>Editar Marca</h1>
<?php 
    $sql = "SELECT * FROM marca WHERE id_marca =".$_REQUEST['id_marca'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=marca-salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_marca" value="<?php echo $row->id_marca;?>">
        <div class="mb-3">
        <label >Nome Marca</label>
        <input type="text" name="nome_marca" value="<?php echo $row->nome_marca?>" class="form-control">
        <!-- aqui voce consegue deixar o nome da marca ja aparecendo ao entrar no editar -->
    </div>

    <div class="mb-3">  
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>