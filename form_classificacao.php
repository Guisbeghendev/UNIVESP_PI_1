<!-- Formulário de Classificação e Comentário -->
<h2>Classificar Tutor</h2>
<form action="processar_classificacao.php" method="POST">
    <label for="classificacao">Classificação:</label>
    <select name="classificacao" id="classificacao">
        <option value="1">1 Estrela</option>
        <option value="2">2 Estrelas</option>
        <option value="3">3 Estrelas</option>
        <option value="4">4 Estrelas</option>
        <option value="5">5 Estrelas</option>
    </select><br>
    <label for="comentario">Comentário:</label><br>
    <textarea name="comentario" id="comentario" cols="30" rows="5"></textarea><br>
    <input type="hidden" name="id_tutor" value="<?php echo $tutor['id_tutor']; ?>">
    <input type="submit" value="Enviar">
</form>
