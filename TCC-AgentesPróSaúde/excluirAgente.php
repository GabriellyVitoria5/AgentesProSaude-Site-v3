<?php
    
    //incluir arquivo de conexão
    include_once("conexaoBD.php");

    //isset() verifica se foi setado algum valor para $_GET[cpf_agente]
    if (isset($_GET["cpf_agente"])) {
        $cpfAgente = $_GET["cpf_agente"];

        $sql = "DELETE FROM agentesprosaude.Agente WHERE cpf_agente = $cpfAgente";

        if ($conn->query($sql) === TRUE) {
    ?>
            <script>
                alert("Registro do agente excluído com sucesso.");
                window.location = "sair.php";
            </script>

        <?php

        } else {
        ?>
            <script>
                alert("Erro ao excluir o registro.");
                window.history.back();
            </script>
    <?php

        }
    }

?>