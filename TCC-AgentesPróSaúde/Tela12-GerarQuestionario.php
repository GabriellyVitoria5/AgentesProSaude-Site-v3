<?php
    include_once("conexaoBD.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgentesPróSaúde - Gerar Questionário</title>
    <link rel="stylesheet" href="estilosPaginaInicial.css">

</head>

<style>

    .botaoQuestionario{
        margin: 0 10px;
        font-size: 20px;
        background-color: rgb(41, 126, 238);
        color: white;
        padding: 1px 25px;
        border-color: rgb(70, 113, 168);
        border-radius: 10px;
    }

    .botaoQuestionario:hover{
        background-color: rgb(16, 89, 184);
    }


</style>

<body>

    <?php
    if (isset($_SESSION["cpf"])) {
        require_once("menu.php");
    ?>

        <aside>
            <article class="alinharCard">

                <h3 style="text-align: center; font-size: 25px;">Gerar Questionário</h3>

                <p>Escolha as perguntas que estarão presentes no questionátio que será criado.</p>

                <form id="questionario" name ="nome do questionario" method = "post" action="resposta.php">

                    <input type="checkbox" name="questao1"/> <label>Vacinas em dia</label>
                    <br><br>
                    <input type="checkbox" name="questao2"/><label>Exames preventivos em dia</label>
                    <br><br>
                    <input type="checkbox" name="questao3"/><label>Uso de medicação constante</label>
                    <br><br>
                    <input type="checkbox" name="questao4"/><label>Doenças Respiratórias</label>
                    <br><br>        
                    <input type="checkbox" name="questao5"/><label>Doenças Cardíacas</label>
                    <br><br>
                    <input type="checkbox" name="questao6"/><label>Outras doenças</label>    
                    <br><br>
                    <input type="checkbox" name="questao7"/><label>Gestantes</label>
                    <br><br>                
                    <input type="checkbox" name="questao8"/><label>Internados recentemente</label>
                    <br><br>                
                    <input type="checkbox" name="questao9"/><label>Acompanhamento em dia</label>
                    <br><br>               
                    <input type="checkbox" name="questao10"/><label>Acompanhamento de saúde mental</label>
                    <br><br>                
                    <input type="checkbox" name="questao11"/><label>Observações</label>
                    <br><br> 

                    <input class="botaoQuestionario" type="button" value="Confirmar">

                </form>

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