<h1>Cadastrar Marca</h1>
<form action="?page=marca-salvar" method="POST">
    <!-- //para onde ele vai? para a page marca-salvar, por isso coloca ele ali -->
    <input type="hidden" name="acao" value="cadastrar">
    <!-- //o name é acao então ele vai ser salvo na pag marca-salvar, entra la e ve no switch REQUEST -->
        <div class="mb-3">
        <label >Nome Marca</label>
        <input type="text" name="nome_marca" class="form-control">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>