<?php
// Incluir o arquivo de conexão com o banco de dados
include 'conexao.php'; // Inclui a conexão PDO
?>

<!-- main tutor -->
<div class="w3-container entrar">
    <div class="w3-container chavear">
        <div class="w3-col">
            <div class="w3-row">
                <?php include "dash_perfil_tutor.php"; ?>
            </div>
            <div class="w3-row">
                <?php include "dash_adm_tutor.php"; ?>
            </div>
        </div>        
    </div> 
</div> 
<!-- fim main tutor -->


