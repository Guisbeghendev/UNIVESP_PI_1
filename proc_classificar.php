<?php
// Iniciar a sessão para recuperar o ID do aluno
session_start();

// Verificar se o aluno está logado
if (!isset($_SESSION['id_aluno'])) {
    // Se o aluno não estiver logado, redirecioná-lo para a página de login
    header("Location: v_login.php");
    exit();
}

// Incluir o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os dados necessários foram enviados
    if (isset($_POST['id_tutor']) && isset($_POST['classificacao']) && isset($_POST['comentario'])) {
        $id_tutor = $_POST['id_tutor'];
        $id_aluno = $_SESSION['id_aluno'];  // Recuperar o ID do aluno da sessão
        $classificacao = $_POST['classificacao'];
        $comentario = $_POST['comentario'];

        // Consulta SQL para inserir a classificação e o comentário no banco de dados
        $sql = "INSERT INTO Classificacoes (id_tutor, id_aluno, classificacao, comentario) VALUES (:id_tutor, :id_aluno, :classificacao, :comentario)";
        
        // Preparar a consulta
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_tutor', $id_tutor, PDO::PARAM_INT);
        $stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
        $stmt->bindParam(':classificacao', $classificacao, PDO::PARAM_INT);
        $stmt->bindParam(':comentario', $comentario, PDO::PARAM_STR);
        
        // Executar a consulta
        if ($stmt->execute()) {
            // Redirecionar de volta para o perfil do tutor com uma mensagem de sucesso
            $_SESSION['mensagem_sucesso'] = "Classificação enviada com sucesso!";
            header("Location: v_perfil_tutor_resultado.php?id=" . $id_tutor);
            exit();
        } else {
            echo "Erro ao enviar a classificação. Por favor, tente novamente.";
        }
    } else {
        echo "Dados incompletos. Por favor, preencha todos os campos.";
    }
} else {
    echo "Método de solicitação inválido.";
}
?>
