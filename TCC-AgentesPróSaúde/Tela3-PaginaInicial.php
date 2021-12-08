<?php
    //inclui o arquivo de conexão
    require_once("conexaoBD.php");
    session_start(); 
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

<body>

    <?php
    if (isset($_SESSION["cpf"])) {
        require_once("menu.php");
    ?>
    
            <aside>
                <article class="alinharCard">

                    <h3 style="text-align: center;">Bem vindo(a) <?php echo $_SESSION["nome"] ?>!</h3>
                    <p>Escolha uma das opções do menu para iniciar</p>
                    <img src="imgTCC/imgInicio.png" width="100%"> 

                </article>
            </aside>

        </div>
        <?php
    } 
    else {
        include_once("MensagemUsuarioNaoLogado.php");
    } ?>

</body>

</html>