<?php
// Iniciar a sessão
session_start();

// Verificar se o aluno está logado
if (!isset($_SESSION['id_tutor'])) {
    // Se o aluno não estiver logado, redirecioná-lo para a página de login
    header("Location: v_login.php");
    exit();
}

// Incluir o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar o ID do contrato do formulário
    if (isset($_POST['id_contrato'])) {
        $id_contrato = $_POST['id_contrato'];
        
        // Consulta SQL para excluir o contrato
        $sql = "DELETE FROM Contratacoes WHERE id_contrato = :id_contrato";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_contrato', $id_contrato, PDO::PARAM_INT);
        
        // Executar a consulta
        if ($stmt->execute()) {
            // Redirecionar para a página de perfil/dashboard após a exclusão
            header("Location: dashboard_tutor.php");
            exit();
        } else {
            echo "Erro ao excluir o contrato.";
        }
    } else {
        echo "ID do contrato não fornecido.";
    }
}
?>
