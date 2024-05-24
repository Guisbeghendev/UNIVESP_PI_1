<?php
// Incluir o arquivo de conexão com o banco de dados
include 'conexao.php'; // Inclui a conexão PDO
?>

<!-- main tutor -->
<div class="w3-container entrar">
    <div class="w3-container chavear">
        <div class="w3-col">
            <div class="w3-row">
            <div class="w3-panel w3-card-4 w3-khaki"><?php include "dash_perfil_tutor.php"; ?></div>
            </div>
            <div class="w3-row">
            <div class="w3-panel w3-card-4 w3-khaki"><?php include "dash_adm_tutor.php"; ?></div>
            </div>
        </div>        
    </div> 
</div> 
<!-- fim main tutor -->


