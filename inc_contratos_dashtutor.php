<div class="w3-container">
    <h3>Contratos</h3>
    <?php if (isset($contratos) && count($contratos) > 0): ?>
        <?php foreach ($contratos as $contrato): ?>
            <div class="w3-card-4">
                <div class="w3-container">
                    <h4><?php echo htmlspecialchars($contrato['titulo']); ?></h4>
                    <p><?php echo htmlspecialchars($contrato['descricao']); ?></p>
                    <p>Data de Contratação: <?php echo htmlspecialchars($contrato['data_contratacao']); ?></p>
                    <p>Aluno: <?php echo htmlspecialchars($contrato['id_aluno']); ?></p>
                    <form action="processa_contratos_tutor.php" method="POST">
                        <input type="hidden" name="acao_contrato" value="1">
                        <input type="hidden" name="id_contrato" value="<?php echo $contrato['id_contrato']; ?>">
                        <button class="w3-button w3-green" type="submit" name="acao" value="aceitar">Aceitar</button>
                        <button class="w3-button w3-red" type="submit" name="acao" value="recusar">Recusar</button>
                    </form>
                </div>
            </div>
            <br>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum contrato encontrado.</p>
    <?php endif; ?>
</div>
