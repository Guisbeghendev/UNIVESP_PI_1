<?php
// Verificar se o ID do aluno ou tutor está presente na sessão
if (!isset($_SESSION['id_aluno']) && !isset($_SESSION['id_tutor'])) {
    // Redirecionar para a página de login, se o usuário não estiver autenticado
    header("Location: v_login.php");
    exit();
} else {
    // Se a sessão estiver definida corretamente, recuperar o ID do aluno ou tutor
    $id_aluno = isset($_SESSION['id_aluno']) ? $_SESSION['id_aluno'] : null;
    $id_tutor = isset($_SESSION['id_tutor']) ? $_SESSION['id_tutor'] : null;

    // Consulta SQL para encontrar tutores que ensinam os idiomas que o aluno está aprendendo
    $sql = "SELECT DISTINCT t.nome, t.cidade, t.estado
            FROM Tutores t
            INNER JOIN IdiomaTutor it ON t.id_tutor = it.id_tutor
            INNER JOIN IdiomaAluno ia ON it.idioma = ia.idioma
            WHERE ia.id_aluno = ?";

    // Preparar a consulta SQL
    $stmt = $conn->prepare($sql);

    // Executar a consulta SQL
    $stmt->execute([$id_aluno]);

    // Obter os resultados da pesquisa
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Incluir o arquivo de exibição dos resultados
    include 'result_pesquisa_especial.php';
}
?>
