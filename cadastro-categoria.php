<?php 
include('header.php');
?>
<link rel="stylesheet" href="css/style.css">
<title>Cadastrar Modelos</title>
<div class="container">
    <img src="img/carros.png" class="background-image">
</div>


<div class="formulario">

    <h1 class="tituloform">Cadastrar Categorias</h1>
    <form action="salvar-categoria.php" method="post">
        <input type="hidden" name="acao" value="categoria">
        <div class="input-label-form">
            <div class="inputnormais">
                <label for="categoria">Qual tipo de carro voce deseja cadastrar: </label>
                <input type="text" name="categoria" id="categoria" placeholder="Ex: Luxo, SUV, Comum">
                

                <label for="valorDiaria">Qual o valor da diária: </label>
                <input type="hidden" name="valorDiaria" id="valorDiaria">
                <?php 
                
                    include('database.php');

                    $sql = "SELECT * FROM categoria";
                    $res = $conn->query($sql);
                    $row = $res->fetch_object();

                    if($res->num_rows > 0){
                        while($row = $res->fetch_object()){
                                echo "<p value='".$row->idCategoria."'>".$row->valor_diaria."</p>";
                                header('location: cadastro-categoria.php');
                            }
                        }else{
                            echo "<option>Não há categorias cadastradas</option>";
                        }   
                    
                    
                ?>

                <button class="botaoform" type="submit">Enviar</button>
            </div>

    </form>
</div>

</div>


<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}



/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}


.formulario {
    position: relative;
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color: #fff;
    width: 600px;
    height: 545px;
    margin-top: -830px;

}


.inputnormais {
    display: flex;
    justify-content: center;
    flex-direction: column;
    gap: 10px;
    width: 500px;
    font-family: "Fira Sans", sans-serif;
    margin-bottom: 200px;
}

.inputnormais>input {
    height: 45px;
    padding: 10px;
    font-size: 20px;
}

.inputnormais>label {
    font-size: 20px;
}

select {
    height: 30px;
}

#cars {
    height: 25px;
    font-family: "Fira Sans", sans-serif;
}

.tituloform {
    font-family: "Fira Sans", sans-serif;
    font-size: 50px;
    color: #23232e;
    display: flex;
    align-items: flex-start;
    width: 540px;
    margin-left: 40px;
    margin-bottom: 10px;

}

.botaoform {
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    margin-top: 20px;
}
</style>
</body>

</html>