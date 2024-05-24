<!-- Formulário de pesquisa por idioma -->
<div class="w3-container">
    <form method="POST" action="proc_pesquisa.php">
        <input type="hidden" name="tipo_pesquisa" value="idioma">
        <label>Selecione o idioma:</label><br>
        <?php
        // Consulta SQL para recuperar os idiomas disponíveis
        $sql_idiomas = "SELECT DISTINCT idioma FROM IdiomaTutor";
        $stmt_idiomas = $conn->query($sql_idiomas);
        if ($stmt_idiomas->rowCount() > 0) {
            while ($row = $stmt_idiomas->fetch(PDO::FETCH_ASSOC)) {
                echo '<input type="radio" name="idioma" value="' . $row['idioma'] . '"> ' . $row['idioma'] . '<br>';
            }
        } else {
            echo 'Nenhum idioma disponível.';
        }
        ?>
        <button type="submit">Pesquisar</button>
    </form>
</div>

