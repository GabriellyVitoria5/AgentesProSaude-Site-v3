<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgentesPróSaúde - Cadastrar Morador</title>
    <link rel="stylesheet" href="estilosPaginaInicial.css">
    <link rel="stylesheet" href="estilosCadastrarMorador.css">

</head>

<style>

    form{
        color: black;
    }

    .campos{
        width: 350px;
    }


    select{
        margin-top: 5px;
        border-radius: 10px;
        border-width: 2.5px;
        border-color: gray;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 20px;
        border-style: solid;
        width: 350px;
        color: black;
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

                    <h3 style="text-align: center; font-size: 25px;">Cadastrar Morador</h3>

                    <form action="inserirMorador.php" method="POST">

                        <input class="campos" type="text" name="txtNomeMorador" autofocus required placeholder="Nome"> 
                        <br><br>

                        <input class="campos" type="text" name="txtTelMorador" required placeholder="Telefone"> 
                        <br><br>

                        <input class="campos" type="text" name="txtCPFMorador" required placeholder="CPF"> 
                        <br><br>

                        <input class="campos" style="color: black; width: 350px;" type="date" name="dtData" required placeholder="Data de Nascimento"> 
                        <br><br>

                        <select calss="campos" name="ddIdResidencia" id="ddIdResidencia" required>
                            <option value="" disabled selected>Selecione um endereço</option>
                            <?php
                                //incluir o arquivo de conexão
                                include_once("conexaoBD.php");
                                
                                //buscar dados do dropdown no BD
                                //criar o comando sql
                                $sql = "SELECT endereco, complemento, ID_residencia FROM Residencia WHERE cpf_agente = $cpfAgente ORDER BY endereco";

                                //executar o comando sql
                                $endereco = $conn->query($sql);

                                while ($rowEndereco = $endereco->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $rowEndereco["ID_residencia"];?>"><?php echo $rowEndereco["endereco"];?>, <?php echo $rowEndereco["complemento"]; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                        <br><br>

                        <input class="botaoMorador" name="btnCadastrarMorador" type="submit" value="Cadastrar">
                        <br><br>

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