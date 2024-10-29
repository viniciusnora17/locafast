<header>
    <nav>
      <a href="index.php" class="logo">LocaFast</a>
      
      <ul class="nav-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="cadastro-marca.php">Marca</a></li>
        <li><a href="cadastro-modelo.php">Modelos</a></li>
        <li><a href="cadastro-pessoas.php">Cadastrar-se</a></li>
        <li><a href="cadastro-categoria.php">Categorias</a></li>
        <li><a href="listar-veiculos.php">Veiculos</a></li>
        <li><a href="listar-aluguel.php">Alugueis</a></li>

      </ul>
    </nav>
  </header>

  <style>
    *{
    margin: 0;
    padding: 0;

    }

a{
    color: #fff;
    text-decoration: none;
    transition: 0.3s;
}

a:hover{
    opacity: 0.7;
}

.logo{
    font-size: 24px;
    text-transform: uppercase;
    letter-spacing: 4px;
}

nav{
    display: flex;
    justify-content: space-around;
    align-items: center;
    font-family: system-ui, Arial, Helvetica, sans-serif;
    background:#23232e;
    height: 10vh;
    
}

.nav-list{
    list-style: none;
    display: flex;
}

.nav-list li{
    letter-spacing: 3px;
    margin-left: 32px;
}

  </style>