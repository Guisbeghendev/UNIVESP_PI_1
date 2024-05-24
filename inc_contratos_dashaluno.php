<?php

// Verificar se o aluno está logado
if (!isset($_SESSION['id_aluno'])) {
    // Se o aluno não estiver logado, redirecioná-lo para a página de login
    header("Location: v_login.php");
    exit();
}

// Incluir o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Recuperar o ID do aluno da sessão
$id_aluno = $_SESSION['id_aluno'];

// Consulta SQL para buscar os contratos do aluno
$sql = "SELECT c.*, t.nome AS nome_tutor FROM Contratacoes c
        JOIN Tutores t ON c.id_tutor = t.id_tutor
        WHERE c.id_aluno = :id_aluno";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
$stmt->execute();
$contratos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="w3-container">
    <h3>Contratos</h3>
    <?php if (isset($contratos) && count($contratos) > 0): ?>
        <?php foreach ($contratos as $contrato): ?>
            <div class="w3-card-4">
                <div class="w3-container">
                    <h4>Tutor: <?php echo htmlspecialchars($contrato['nome_tutor']); ?></h4>
                    <p>Data de Contratação: <?php echo htmlspecialchars($contrato['data_contratacao']); ?></p>
                    <p>Status: <?php echo htmlspecialchars($contrato['status']); ?></p>
                    <form action="proc_excluir_contrato.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este contrato?');">
                        <input type="hidden" name="id_contrato" value="<?php echo $contrato['id_contrato']; ?>">
                        <button class="w3-button w3-red" type="submit">Excluir</button>
                    </form>
                </div>
            </div>
            <br>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum contrato encontrado.</p>
    <?php endif; ?>
</div>
