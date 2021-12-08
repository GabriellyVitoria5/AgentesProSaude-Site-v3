<?php
    include_once("conexaoBD.php");
    session_start(); 

    if (isset($_POST["txtNome"])){
        $cpf = $_GET["cpf_agente"];
        $nome = $_POST["txtNome"];
        $email = $_POST["txtEmail"];
        $telefone = $_POST["txtTel"];
        $senha= $_POST["txtSenha"];

        $sql = "UPDATE agentesprosaude.Agente SET nome_agente = '$nome', 
                telefone = '$telefone',
                email = '$email',     
                senha_agente = $senha
                where cpf_agente = '$cpf'";

        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                alert("Registro atualizado com sucesso!");
                window.location = "Tela4-PerfilAgente.php";
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
    <title>AgentesPróSaúde - Editar</title>
    <link rel="stylesheet" href="estilosPaginaInicial.css">

</head>

<style>

    input{
        border-radius: 10px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 20px;
        border-style: solid;
    }

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

    .campos{
        width: 350px;
    }

    .perfil{
        text-align: center;
    }

</style>

<body>

    <?php
    if (isset($_SESSION["cpf"])) {
        require_once("menu.php");
    ?>

            <aside>
                <article class="alinharCard">

                    <h3 style="text-align: center; font-size: 25px;">Editar Perfil</h3>

                    <?php
                        if(isset($_GET["cpf_agente"])){
                            $cpf = $_GET["cpf_agente"];
                            $sql = "SELECT * from agentesprosaude.Agente WHERE cpf_agente = $cpf";
                            $consulta = $conn->query($sql);
                            $agente = $consulta->fetch_assoc(); 
                        }
                    ?>

                    <div class="perfil" style="margin-left: 45px;">

                        <form action="Tela5-EditarAgente.php?cpf_agente=<?php echo $_GET['cpf_agente']?>" method="POST">
                            
                            <input class="campos" type="text" name="txtNome" value="<?php echo $agente["nome_agente"] ?>" placeholder="Nome"><br><br>
                            <input class="campos" type="text" name="txtTel" value="<?php echo $agente["telefone"] ?>" placeholder="Telefone"><br><br> 
                            <input class="campos" type="text" name="txtEmail" value="<?php echo $agente["email"] ?>" placeholder="Email"><br><br> 
                            
                            <!--
                            <h4>CPF:</h4> <input type="text" name="txtCpf" value="<?php //echo $agente["cpf"] ?>"> -->
                            
                            <input class="campos" type="number" name="txtSenha" value="<?php echo $agente["senha_agente"] ?>" placeholder="Senha">  
                            <br><br>

                            <input class="button" type="submit" value="Confirmar">

                            <a href="Tela4-PerfilAgente.php">
                                <input class="button" type="button" value="Voltar">
                            </a>

                        </form>

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

</html>