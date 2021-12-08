<?php
    include_once("conexaoBD.php");
    session_start(); 

    if (isset($_POST["txtNomeMorador"])){
        $cpfMorador = $_GET["cpf_morador"];
        $nomeMorador = $_POST["txtNomeMorador"];
        $telefoneMorador = $_POST["txtTelMorador"];
        $data = $_POST["dtData"];
        $id = $_POST["ddIdResidencia"];

        $sql = "UPDATE agentesprosaude.Morador SET nome_morador = '$nomeMorador', 
                telefone = '$telefoneMorador',     
                data_nascimento = '$data',
                ID_residencia = '$id'
                WHERE cpf_morador = '$cpfMorador'";

        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                alert("Registro atualizado com sucesso!");
                window.location = "Tela10-PesquisarMorador.php";
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
    <title>AgentesPróSaúde - Editar Morador</title>
    <link rel="stylesheet" href="estilosPaginaInicial.css">
    <link rel="stylesheet" href="estilosCadastrarMorador.css">

</head>

<style>
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

                    <h3 style="text-align: center; font-size: 25px;">Editar Morador</h3>

                    <?php
                        if(isset($_GET["cpf_morador"])){
                            $cpfMorador = $_GET["cpf_morador"];
                            $sql = "SELECT * from agentesprosaude.Morador WHERE cpf_morador = $cpfMorador";
                            $consulta = $conn->query($sql);
                            $morador = $consulta->fetch_assoc(); 
                        }
                    ?>
                    
                    <form  action="Tela11-EditarMorador.php?cpf_morador=<?php echo $_GET['cpf_morador']?>" method="post">

                        <input class="campos" type="text" name="txtNomeMorador" value="<?php echo $morador["nome_morador"]?>"> 
                        <br><br>

                        <input class="campos" type="text" name="txtTelMorador" value="<?php echo $morador["telefone"]?>"> 
                        <br><br>

                        <input  class="campos" type="date" name="dtData" value="<?php echo $morador["data_nascimento"]?>"> 
                        <br><br>
                        
                        <select calss="campos" name="ddIdResidencia" id="ddIdResidencia" required>
                            <?php
                                    //incluir o arquivo de conexão
                                    include_once("conexaoBD.php");
                                    
                                    $id = $morador["ID_residencia"];

                                    //buscar dados do dropdown no BD
                                    //criar o comando sql
                                    $sql1 = "SELECT endereco, complemento FROM Residencia WHERE ID_residencia = $id";

                                    //executar o comando sql
                                    $endereco1 = $conn->query($sql1);
                                    
                                    while ($rowEndereco = $endereco1->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $morador["ID_residencia"]?>" selected><?php echo $rowEndereco["endereco"];?>, <?php echo $rowEndereco["complemento"]; ?></option>
                                    <?php
                                    }
                            ?>
                            
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
            
                        <input class="botaoMorador" type="submit" value="Confirmar">
                        
                        <a href="Tela10-PesquisarMorador.php">
                            <input class="botaoMorador" type="button" value="Voltar">
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