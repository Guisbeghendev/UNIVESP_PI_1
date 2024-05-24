<?php
// Iniciar a sessão
session_start();

// Verificar se o aluno está logado
if (!isset($_SESSION['id_aluno'])) {
    // Se o aluno não estiver logado, redirecioná-lo para a página de login
    header("Location: login.php");
    exit();
}

// Incluir o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do formulário
    $id_aluno = $_SESSION['id_aluno'];
    $id_tutor = $_POST['id_tutor'];
    $data_contratacao = date('Y-m-d');
    $status = 'pendente';

    // Inserir os dados na tabela de contratações
    $sql = "INSERT INTO Contratacoes (id_aluno, id_tutor, data_contratacao, status) 
            VALUES (:id_aluno, :id_tutor, :data_contratacao, :status)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
    $stmt->bindParam(':id_tutor', $id_tutor, PDO::PARAM_INT);
    $stmt->bindParam(':data_contratacao', $data_contratacao, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);

    // Executar a consulta
    if ($stmt->execute()) {
        // Redirecionar para a página de perfil do tutor
        header("Location: dashboard_aluno.php");
        exit();
    } else {
        echo "Erro ao contratar o tutor.";
    }
}
?>
