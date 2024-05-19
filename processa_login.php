<?php
// Inicia a sessão no início do script
session_start();

// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verifica se foi enviado um formulário de login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Recupera os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tipo_usuario = $_POST["tipo_usuario"]; // Tipo de usuário (aluno ou tutor)

    // Define a tabela do banco de dados com base no tipo de usuário
    $tabela_usuario = ($tipo_usuario == "aluno") ? "Alunos" : "Tutores";

    // Verifica se o usuário existe no banco de dados
    $sql = "SELECT * FROM $tabela_usuario WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se o usuário existir, verifica a senha
    if ($usuario) {
        // Verifica a senha diretamente
        if ($senha == $usuario['senha']) {
            // Armazena o ID do usuário na sessão
            $id_usuario = $usuario['id_' . $tipo_usuario];
            $_SESSION['id_' . $tipo_usuario] = $id_usuario;

            // Redireciona para a dashboard correspondente
            if ($tipo_usuario == "aluno") {
                header("Location: dashboard_aluno.php");
            } else {
                header("Location: dashboard_tutor.php");
            }
            exit();
        } else {
            // Senha incorreta
            echo "Senha incorreta. Por favor, tente novamente.";
        }
    } else {
        // Usuário não encontrado
        echo "Usuário não encontrado. Por favor, verifique o email e o tipo de usuário.";
    }
}
?>
