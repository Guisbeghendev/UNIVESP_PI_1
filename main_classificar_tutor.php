<?php
// Inclua o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verifique se o ID do tutor está definido na URL
if (!isset($_GET['id_tutor'])) {
    // Redirecione o usuário de volta à página anterior ou exiba uma mensagem de erro
    echo "ID do tutor não fornecido.";
    exit(); // Encerre o script
}

// Recupere o ID do tutor da URL
$id_tutor = $_GET['id_tutor'];

// Verifique se o formulário de classificação foi submetido via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere a classificação enviada pelo formulário
    $classificacao = $_POST['classificacao'];

    try {
        // Insira a classificação na tabela Avaliacoes
        $sql_insert_classificacao = "INSERT INTO Avaliacoes (id_tutor, Classificacao) VALUES (:id_tutor, :classificacao)";
        $stmt_insert_classificacao = $conn->prepare($sql_insert_classificacao);
        $stmt_insert_classificacao->bindParam(':id_tutor', $id_tutor, PDO::PARAM_INT);
        $stmt_insert_classificacao->bindParam(':classificacao', $classificacao, PDO::PARAM_INT);
        $stmt_insert_classificacao->execute();

        // Redirecione o usuário de volta à página do tutor ou exiba uma mensagem de sucesso
        header("Location: v_perfil_tutor_pesquisa.php?id_tutor=" . $id_tutor);
        exit(); // Encerre o script
    } catch (PDOException $e) {
        // Em caso de erro na inserção da classificação, exiba uma mensagem de erro
        echo "Erro ao classificar o tutor: " . $e->getMessage();
    }
}
?>




    <h1>Classificar Tutor</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id_tutor=' . $id_tutor; ?>">
        <label for="classificacao">Classificação:</label>
        <select name="classificacao" id="classificacao">
            <option value="1">1 estrela</option>
            <option value="2">2 estrelas</option>
            <option value="3">3 estrelas</option>
            <option value="4">4 estrelas</option>
            <option value="5">5 estrelas</option>
        </select>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
