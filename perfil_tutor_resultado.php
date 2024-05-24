<?php

// Verificar se o aluno está logado
if (!isset($_SESSION['id_aluno'])) {
    // Se o aluno não estiver logado, redirecioná-lo para a página de login
    header("Location: v_login.php");
    exit();
}

// Incluir o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verificar se o ID do tutor foi fornecido via POST
if (isset($_POST['id_tutor'])) {
    $id_tutor = $_POST['id_tutor'];

    // Consulta SQL para obter as informações do tutor com base no ID fornecido
    $sql = "SELECT * FROM Tutores WHERE id_tutor = :id_tutor";

    // Preparar a consulta
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_tutor', $id_tutor, PDO::PARAM_INT);

    // Executar a consulta
    $stmt->execute();

    // Verificar se o tutor foi encontrado
    if ($stmt->rowCount() > 0) {
        // Recuperar os dados do tutor
        $tutor = $stmt->fetch(PDO::FETCH_ASSOC);

        // Exibir as informações do tutor
        echo "<h2>Perfil do Tutor</h2>";
        echo "<p><strong>Nome:</strong> " . htmlspecialchars($tutor['nome']) . "</p>";
        echo "<p><strong>Cidade:</strong> " . htmlspecialchars($tutor['cidade']) . "</p>";
        echo "<p><strong>Estado:</strong> " . htmlspecialchars($tutor['estado']) . "</p>";

        // Exibir a classificação do tutor, se disponível
        echo "<p><strong>Classificação:</strong> [Classificação Média]</p>";

        // Incluir o formulário de classificação
        include 'main_classificar_tutor.php';

        // Formulário para contratar o tutor
        echo '<h2>Contratar Tutor</h2>';
        echo '<form action="proc_contratar.php" method="POST">';
        echo '<input type="hidden" name="id_tutor" value="' . htmlspecialchars($tutor['id_tutor']) . '">';
        echo '<button type="submit">Contratar Tutor</button>';
        echo '</form>';
    } else {
        echo "Tutor não encontrado.";
    }
} else {
    echo "ID do tutor não fornecido.";
}
?>
