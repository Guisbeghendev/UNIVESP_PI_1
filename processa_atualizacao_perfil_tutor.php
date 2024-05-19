<?php
// Inclua o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verifique se o formulário de edição do perfil foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"])) {
    // Recupere os dados do formulário
    $nome = $_POST["nome"];
    // Recupere os outros campos de edição aqui

    // Atualize o registro do tutor no banco de dados
    try {
        $sql = "UPDATE Tutores SET nome = :nome WHERE id_tutor = :id_tutor";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        // Faça o bind dos outros parâmetros de atualização aqui
        $stmt->bindParam(':id_tutor', $_SESSION['id_tutor'], PDO::PARAM_INT);
        $stmt->execute();
        
        // Redirecione o usuário de volta para a página do perfil com uma mensagem de sucesso
        header("Location: dash_perfil_tutor.php?success=1");
        exit();
    } catch (PDOException $e) {
        // Em caso de erro na atualização, exiba uma mensagem de erro
        echo "Erro ao atualizar o perfil: " . $e->getMessage();
    }
} else {
    // Se o formulário não foi enviado corretamente, redirecione o usuário de volta para a página do perfil
    header("Location: dash_perfil_tutor.php");
    exit();
}
?>
