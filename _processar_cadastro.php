<?php
// Conexão com o banco de dados
//$conn = new mysqli("localhost", "seu_usuario", "sua_senha", "seu_banco");
include 'inc_conn.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$dataNasc = $_POST['dataNasc'];
$idioma = $_POST['idioma'];

// Prepara a declaração SQL para inserção
$stmt = $conn->prepare("INSERT INTO tbAlunos (nome, email, senha, cidade, estado, dataNasc, idioma) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $nome, $email, $senha, $cidade, $estado, $dataNasc, $idioma);

/* Executa a declaração
if ($stmt->execute() === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}*/

// Executa a declaração
if ($stmt->execute() === TRUE) {
    // Redireciona para outra página
    header("Location: ind_fimcadastro.php");
    exit(); // Certifique-se de sair do script após o redirecionamento
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}

// Fecha a declaração e a conexão
$stmt->close();
$conn->close();
?>
