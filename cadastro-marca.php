<?php 
include('header.php');
?>
<link rel="stylesheet" href="css/style.css">    
<title>Cadastrar Veiculos</title>
<div class="container">
    <img src="img/carros.png" class="background-image">
    </div>

    
    <div class="formulario">
      
      <h1 class="tituloform">Cadastrar Marca</h1>
      <form action="salvar-marca.php" method="post">
        <input type="hidden" name="acao" value="salvar-marca">
         <div class="input-label-form">
        <div class="inputnormais">
            <label>Qual marca você deseja cadastrar: </label>
            <input type="text" name="marca" id="marca" required><br>
   

        <button class="botaoform" type="submit">Enviar</button>
        </div>
         
        </form>
      </div>
            
</div>


    <style>
    .formulario{
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


.inputnormais{
display: flex;
justify-content: center;
flex-direction: column; 
gap: 5px;
width: 500px;
font-family: "Fira Sans", sans-serif;
margin-bottom: 200px;
}

.inputnormais > input{
    height: 45px;
    font-size: 20px;
}

.inputnormais > label{
    font-size: 20px;
}

#cars{
    height: 25px;
    font-family: "Fira Sans", sans-serif;
}

.tituloform{    
    font-family: "Fira Sans", sans-serif;
    font-size: 50px;    
    color: #23232e;
    display: flex;
    align-items: flex-start;
    width: 540px;
    margin-left: 40px;
    margin-bottom: 10px;
    
}

.botaoform{
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