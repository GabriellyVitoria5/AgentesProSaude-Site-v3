<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgentesPróSaúde - Cadastrar Residência</title>
    <link rel="stylesheet" href="estilosPaginaInicial.css">
    <link rel="stylesheet" href="estilosCadastrarResidencia.css">

</head>

<style>

    .campos{
        width: 350px;
    }

</style>

<body>

    <?php
    if (isset($_SESSION["cpf"])) {
        require_once("menu.php");
    ?>

            <aside>
                <article class="alinharCard">

                <h3 style="text-align: center; font-size: 25px;">Cadastrar Residência</h3>

                <form action="inserirResidencia.php" method="POST">

                    
                    <input class="campos" type="text" name="txtEndereco" autofocus required placeholder="Rua ou Avenida"> 
                    <br><br>

                    <input class="campos" type="text" name="txtComplemento" placeholder="Complemento"> 
                    <br><br>

                    <input class="campos" type="text" name="txtBairro" required placeholder="Bairro"> 
                    <br><br>

                    <input class="botaoResidencia" name="btnCadastrarResidencia" type="submit" value="Cadastrar">
                    <br><br>

                </form>
                
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