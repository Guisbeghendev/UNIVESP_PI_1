<?php
session_start();

// Conexão com o banco de dados
//$conn = new mysqli("localhost", "seu_usuario", "sua_senha", "seu_banco");
include 'inc_conn.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta SQL para obter o usuário pelo email
$stmt = $conn->prepare("SELECT id, nome, senha FROM alunos WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Usuário encontrado, verifica a senha
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row['senha'])) {
        // Senha correta, inicia a sessão e redireciona para página de perfil
        $_SESSION['id'] = $row['id'];
        $_SESSION['nome'] = $row['nome'];
        header("Location: ind_perfil.php");
        exit();
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}

// Fecha a declaração e a conexão
$stmt->close();
$conn->close();
?>
