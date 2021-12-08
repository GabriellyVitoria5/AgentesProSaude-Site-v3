<?php
    require_once("conexaoBD.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgentesPróSaúde - Página Inicial</title>
    <link rel="stylesheet" href="estilosPaginaInicial.css">

</head>

<style>
    nav ul{
        margin: 0px;
        list-style: none;
        background-color: rgb(179, 179, 179);
        overflow: hidden;
        margin: 0px;
        padding: 0px;
        margin-bottom: 20px;
    }

    nav a{
        color: white;
        text-decoration: none;
        padding: 16px;
        display: block;
    }

    nav a:hover{
        color: rgb(41, 126, 238);
        background-color: white;
    }

    .nome{
        color: white;
        float: right;
        display: block;
        padding: 16px;
    }
    .nome:hover{
        color: white;
        background-color: rgb(172, 169, 169);
    }

    .perfilImg{
        display: block;
        float: right;
        margin-right: 16px;
    }
</style>

<body>
        <header>
            <h1>AgentesPróSaúde</h1>
        </header>

        <!--
        <h3 class="barra"></h3> -->

        <nav>
            <ul>
                <li><a style="float: left;" href="Tela3-PaginaInicial.php">Início</a></li>
                <li><a style="float: left;" href="Tela13-Noticias.php">Notícias</a></li>
                <li><a style="float: left;" href="Tela14-Sobre.php" >Sobre</a></li>
                <img class="perfilImg" src="imgTCC/imgPerfil.png" width="50px">
                <li><a class="nome" href="Tela4-PerfilAgente.php"><?php echo $_SESSION["nome"] ?></a></li>
            </ul>

        </nav>

        <section>

            <article class="alinharCard">

                <div class="menu">

                    <h3>Perfil</h3>
                    <ul id="menu">
                        <li><a href="Tela4-PerfilAgente.php">&#10148; Visualizar</a></li>
                    </ul>

                    <h3>Residências</h3>
                    <ul id="menu">
                        <li><a href="Tela6-CadastrarResidencia.php">&#10148; Cadastrar</a></li>
                        <li><a href="Tela7-PesquisarResidencia.php">&#10148; Pesquisar</a></li>
                    </ul>

                    <h3>Moradores</h3>
                    <ul id="menu">
                        <li><a href="Tela9-CadastrarMorador.php">&#10148; Cadastrar</a></li>
                        <li><a href="Tela10-PesquisarMorador.php">&#10148; Pesquisar</a></li>
                    </ul>

                    <h3>Questionário</h3>
                    <ul id="menu">
                        <li><a href="Tela12-GerarQuestionario.php">&#10148; Gerar</a></li>
                    </ul>

                    <a href="sair.php">
                        <input class="botao" style="border-radius: 10px;" type="button" value="Sair">
                    </a>

                </div>

            </article>

        </section>
</body>

</html>

<?php
?>