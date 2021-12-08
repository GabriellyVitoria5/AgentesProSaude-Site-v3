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
    <title>AgentesPróSaúde - Sobre</title>
    <link rel="stylesheet" href="estilosPaginaInicial.css">

</head>

<body>

    <?php
    if (isset($_SESSION["cpf"])) {
        require_once("menu.php");
    ?>
            <aside>
                <article class="alinharCard">
                    <div style="text-align: center;"> 
                        <img src="imgTCC/imgEmConstrucao.png" width="50%">
                    </div>
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