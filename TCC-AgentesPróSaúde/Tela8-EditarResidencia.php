<?php
    include_once("conexaoBD.php");
    session_start();

    if (isset($_POST["txtEndereco"])){
        $id = $_GET["ID_residencia"];
        $endereco = $_POST["txtEndereco"];
        $complemento = $_POST["txtComplemento"];
        $bairro = $_POST["txtBairro"];

        $sql = "UPDATE agentesprosaude.Residencia SET endereco = '$endereco', 
                complemento = '$complemento',     
                bairro = '$bairro'
                where ID_residencia = '$id'";

        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                alert("Registro atualizado com sucesso!");
                window.location = "Tela7-PesquisarResidencia.php";
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Erro ao atualizar o registro!");
                window.history.back();
            </script>
            <?php
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgentesPróSaúde - Editar Residência</title>
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

                    <h3 style="text-align: center; font-size: 25px;">Editar Residência</h3>

                    <?php
                        if(isset($_GET["ID_residencia"])){
                            $id = $_GET["ID_residencia"];
                            $sql = "SELECT * from agentesprosaude.Residencia WHERE ID_residencia = $id";
                            $consulta = $conn->query($sql);
                            $residencia = $consulta->fetch_assoc(); 
                        }
                    ?>

                    <form action="Tela8-EditarResidencia.php?ID_residencia=<?php echo $_GET['ID_residencia']?>" method="POST">

                        
                        <input class="campos" type="text" name="txtEndereco" value="<?php echo $residencia["endereco"]?>"> 
                        <br><br>

                        <input class="campos" type="text" name="txtComplemento" value="<?php echo $residencia["complemento"]?>"> 
                        <br><br>

                        <input class="campos" type="text" name="txtBairro" value="<?php echo $residencia["bairro"]?>"> 
                        <br><br>

                        <input class="botaoResidencia" type="submit" value="Confirmar">

                        <a href="Tela7-PesquisarResidencia.php">
                            <input class="botaoResidencia" type="button" value="Voltar">
                        </a>
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