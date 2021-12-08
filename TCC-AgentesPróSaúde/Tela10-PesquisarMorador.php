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
    <title>AgentesPróSaúde - Pesquisar Morador</title>
    <link rel="stylesheet" href="estilosPaginaInicial.css">
    <link rel="stylesheet" href="estilosPesquisarMorador.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script>

        $(document).ready(function() {
            $("#form-pesquisaMorador").submit(function(evento) {

                //Cancela a ação padrao do formulário, impedindo que ele atualize a página
                evento.preventDefault();
                
                //Recupera oque está sendo digitado no input de pesquisa
                let pesquisa = $("#pesquisaMorador").val();

                let dados = {
                    pesquisa: pesquisa,
                }

                $.post("buscaMorador.php", dados, function(retorna) {
                    $(".resultadosMorador").html(retorna);
                });
            });
        });


        function confirmarExclusao(nome, cpf) {
            if (window.confirm("Deseja realmente excluir o registro de: \n" + nome + " " + cpf)) {
                window.location = "excluirMorador.php?cpf_morador=" + cpf;
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

                    <form id="form-pesquisaMorador" action="" method="post">

                        <label for="pesquisa">Informe o campo a ser pesquisado</label>
                        <br><br>
                        <input class="campo" type="text" name="pesquisaMorador" id="pesquisaMorador" placeholder="Buscar...">
                        <input type="image" src="imgTCC//icone-search.png" name="enviarMorador"  value="Pesquisar">

                    </form>

                    <!-- <div class="resultadosMorador"> 

                    </div> -->

                    <!-- -->
                    <div class="resultadosMorador"> 
                        <?php

                        //comando sql
                        $sql = "SELECT * FROM agentesprosaude.Morador ORDER BY nome_morador";
                        //executar o comando
                        $dadosMoradores = $conn->query($sql);

                        //se número de registro retornados for maior que 0
                        if ($dadosMoradores->num_rows > 0) {
                        ?>

                            <div class = "tabela">
                                <table>
                                    <caption>Tabela de Moradores</caption>

                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>CPF</th>
                                            <th>Data de Nascimento</th>
                                            <th>Endereço</th>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    while ($exibir = $dadosMoradores->fetch_assoc()) {



                                        $sql2 = "SELECT ID_residencia, endereco, complemento FROM agentesprosaude.Residencia WHERE cpf_agente = $cpfAgente ORDER BY endereco, bairro";
                        
                                        //executar o comando
                                        $dadosID = $conn->query($sql2);

                                        //se número de registro retornados for maior que 0
                                        if ($dadosID->num_rows > 0) {

                                            while ($rowID = $dadosID->fetch_assoc()) {

                                                if($rowID["ID_residencia"] == $exibir["ID_residencia"]){
                                                    ?>

                                                    <tr>
                                                    <td><?php echo $exibir["nome_morador"] ?></td>
                                                    <td><?php echo $exibir["telefone"] ?> </td>
                                                    <td><?php echo $exibir["cpf_morador"] ?> </td>
                                                    <td><?php echo date('d/m/Y', strtotime($exibir["data_nascimento"])) ?> </td>
                                                    <td><?php echo $rowID["endereco"] ?>, <?php echo $rowID["complemento"] ?> </td>
            
                                                    <td><a class="editarExcluir" href="Tela11-EditarMorador.php?cpf_morador=<?php echo $exibir["cpf_morador"] ?>">Editar</a></td>
            
                                                    <td>
                                                        <a class="editarExcluir" href="#" onclick="confirmarExclusao(
                                                        '<?php echo $exibir["nome_morador"] ?>',
                                                        '<?php echo $exibir["cpf_morador"] ?>')">
                                                            Excluir
                                                        </a>
                                                    </td>
            
                                                </tr>
            
                                            <?php
                                                }
                                            }
                                        }
                                    }

                                ?>
                                </table>
                            </div>
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