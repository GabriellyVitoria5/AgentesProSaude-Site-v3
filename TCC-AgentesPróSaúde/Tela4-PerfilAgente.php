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
    <title>AgentesPróSaúde - Perfil</title>
    <link rel="stylesheet" href="estilosPaginaInicial.css">

</head>

<style>

    .button{
        margin-top: 5px;
        border-radius: 10px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 20px;
        border-style: solid;
        margin: 0 15px;
        background-color: rgb(41, 126, 238);
        color: white;
        padding-left: 25px;
        padding-right: 25px;
        border-color: rgb(59, 92, 136);
    }

    .button:hover{
        background-color: rgb(16, 89, 184);
    }

    .informaçoes{
        border: none;
        border-radius: 10px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 20px;
        background-color: rgb(219, 218, 218);
        padding-left: 5px;
        width: 350px;
    }

    .perfil{
        text-align: center;
    }
</style>

<body>

    <?php
    if (isset($_SESSION["cpf"])) {
        $cpfAgente = $_SESSION["cpf"];
        require_once("menu.php");
    ?>
            <aside>
                <article class="alinharCard">

                    <h3 style="text-align: center; font-size: 25px;">Perfil</h3>

                    <div class="perfil" style="margin-left: 45px;">

                        <?php
                        //comando sql
                        $sql = "SELECT * FROM agentesprosaude.Agente WHERE cpf_agente = $cpfAgente";
                        
                        //executar o comando
                        $dadosAgente = $conn->query($sql);
                        $exibir = $dadosAgente->fetch_assoc()
                        
                        ?>
                        <input class="informaçoes" readonly type="text" name="txtNome" value="<?php echo $exibir["nome_agente"] ?>"> <br><br> 
                        <input class="informaçoes" readonly type="text" name="txtTel" value="<?php echo $exibir["telefone"] ?>"> <br><br>
                        <input class="informaçoes" readonly type="text" name="txtEmail" value="<?php echo $exibir["email"] ?>"> <br><br>
                        <input class="informaçoes" readonly type="text" name="txtCpf" value="<?php echo $exibir["cpf_agente"] ?>"> <br><br>
                            
                        <!--
                        <h4>Senha:</h4> <input class="informaçoes" readonly type="text" name="txtSenha" value="<?php //echo $exibir["senha_agente"] ?>"> --> 

                        <a href="Tela5-EditarAgente.php?cpf_agente=<?php echo $exibir["cpf_agente"] ?>">
                            <input class="button" type="button" value="Editar">
                        </a>

                        <input class="button" type="button" value="Excluir" onclick="confirmarExclusao(
                                                                            '<?php echo $exibir["cpf_agente"] ?>',
                                                                            '<?php echo $exibir["nome_agente"] ?>')">
                        <br><br>
                    
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

<script>

    function confirmarExclusao(cpf, nome) {
        if (window.confirm("Deseja realmente excluir o registro do(a) agente: \n" + nome + " - " + cpf)) {
            window.location = "excluirAgente.php?cpf_agente=" + cpf;
        }
    }

</script>

</html>