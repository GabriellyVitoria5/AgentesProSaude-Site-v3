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
    <title>AgentesPróSaúde - Pesquisar Residência</title>
    <link rel="stylesheet" href="estilosPaginaInicial.css">
    <link rel="stylesheet" href="estilosPesquisarResidencia.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>

    $(document).ready(function() {
        $("#form-pesquisaResidencia").submit(function(evento) {

            //Cancela a ação padrao do formulário, impedindo que ele atualize a página
            evento.preventDefault();

            //Recupera oque está sendo digitado no input de pesquisa
            let pesquisa = $("#pesquisaResidencia").val();

            let dados = {
                pesquisa: pesquisa,
            }

            $.post("buscaResidencia.php", dados, function(retorna) {
                $(".resultadosResidencia").html(retorna);
            });
        });
    });

    function confirmarExclusao(id, endereco, complemento, bairro) {
        if (window.confirm("Deseja realmente excluir o registro da residência de ID:" + id + "\n" + endereco + " " + complemento + " " + bairro)) {
            window.location = "excluirResidencia.php?ID_residencia=" + id;
        }
    }

</script>

</head>

<style>
    .campo{
        border-style: solid;
        border-radius: 5px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        padding: 2px;
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

                    <form id="form-pesquisaResidencia" action="" method="post">

                        <label for="pesquisa">Informe o campo a ser pesquisado</label>
                        <br><br>
                        <input type="text" class="campo" name="pesquisaResidencia" id="pesquisaResidencia" placeholder="Buscar...">
                        <input type="image" src="imgTCC//icone-search.png" style="margin-left: 5px" name="enviarResidencia"  value="Pesquisar">

                    </form>

                    <!-- <div class="resultadosResidencia"> 

                    </div> -->
                    
                    <!-- -->
                    <div class="resultadosResidencia">
                        <?php

                        //comando sql
                        $sql = "SELECT * FROM agentesprosaude.Residencia WHERE cpf_agente = $cpfAgente ORDER BY endereco, bairro";
                        
                        //executar o comando
                        $dadosResidencia = $conn->query($sql);

                        //se número de registro retornados for maior que 0
                        if ($dadosResidencia->num_rows > 0) {
                        ?>
                            <div class = "tabela">

                                <table>
                                    
                                    <caption>Tabela de Residências</caption>

                                    <thead>
                                        <tr>
                                            <th>Endereço</th>
                                            <th>Complemento</th>
                                            <th>Bairro</th>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    while ($exibir = $dadosResidencia->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $exibir["endereco"] ?> </td>
                                            <td><?php echo $exibir["complemento"] ?> </td>
                                            <td><?php echo $exibir["bairro"] ?> </td>
                                            <?php
                                            
                                            ?>
                                            <td><a class="editarExcluir" href="Tela8-EditarResidencia.php?ID_residencia=<?php echo $exibir["ID_residencia"] ?>">Editar</a></td>

                                            <td>
                                                <a class="editarExcluir" href="#" onclick="confirmarExclusao(
                                                '<?php echo $exibir["ID_residencia"] ?>',
                                                '<?php echo $exibir["endereco"] ?>',
                                                '<?php echo $exibir["complemento"] ?>',
                                                '<?php echo $exibir["bairro"] ?>')">
                                                    Excluir
                                                </a>
                                            </td>
                                            
                                        </tr>

                                    <?php
                                }

                                ?>
                                </table>  
                            </div>
                        <?php
                        }
                        else{
                            ?>
                                <p>Nenhuma residência cadastrada por esse agente!</p>
                            <?php
                        }
                        ?>
                    </div>
                <!-- -->

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