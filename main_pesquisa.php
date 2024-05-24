<?php
// Incluir o arquivo de conexão com o banco de dados
include 'conexao.php'; // Inclui a conexão PDO
?>

<!-- main pesquisa -->

    <div class="w3-container">
        <div class="w3-col">
            <div class="w3-row">
                <?php include "inc_pesquisa_idioma.php"; ?>
            </div>
            <br><br>
            <div class="w3-row">
                <?php include "inc_pesquisa_cidadeouestado.php"; ?>
            </div>
        </div>        
    </div> 

<!-- fim main aluno -->


