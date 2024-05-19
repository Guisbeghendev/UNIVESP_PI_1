<?php 
session_start();

if (!isset($_SESSION['id_aluno']) && !isset($_SESSION['id_tutor'])) {
    // Redirecionar para a página de login, se o usuário não estiver autenticado
    header("Location: v_login.php");
    exit();
}

$id_aluno = isset($_SESSION['id_aluno']) ? $_SESSION['id_aluno'] : null;
$id_tutor = isset($_SESSION['id_tutor']) ? $_SESSION['id_tutor'] : null;

// Verificação adicional para garantir que a ID seja válida
if ($id_aluno !== null && !filter_var($id_aluno, FILTER_VALIDATE_INT)) {
    header("Location: v_login.php");
    exit();
}

if ($id_tutor !== null && !filter_var($id_tutor, FILTER_VALIDATE_INT)) {
    header("Location: v_login.php");
    exit();
}

// Conexão ao banco de dados
require_once 'conexao.php'; // Inclui a conexão PDO

// Recuperar dados específicos do usuário
if ($id_aluno !== null) {
    $stmt = $conn->prepare('SELECT * FROM Alunos WHERE id_aluno = :id_aluno');
    $stmt->execute(['id_aluno' => $id_aluno]);
    $usuario = $stmt->fetch();
} elseif ($id_tutor !== null) {
    $stmt = $conn->prepare('SELECT * FROM Tutores WHERE id_tutor = :id_tutor');
    $stmt->execute(['id_tutor' => $id_tutor]);
    $usuario = $stmt->fetch();
}

// Verificação se o usuário foi encontrado
if (!$usuario) {
    header("Location: v_login.php");
    exit();
}

// Dados do usuário estão disponíveis na variável $usuario
?>
