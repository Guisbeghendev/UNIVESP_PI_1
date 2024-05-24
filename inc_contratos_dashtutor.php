<?php

// Verificar se o tutor está logado
if (!isset($_SESSION['id_tutor'])) {
    // Se o tutor não estiver logado, redirecioná-lo para a página de login
    header("Location: v_login.php");
    exit();
}

// Incluir o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Recuperar o ID do tutor da sessão
$id_tutor = $_SESSION['id_tutor'];

// Consulta SQL para buscar os contratos do tutor
$sql = "SELECT c.*, a.nome AS nome_aluno FROM Contratacoes c
        JOIN Alunos a ON c.id_aluno = a.id_aluno
        WHERE c.id_tutor = :id_tutor";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_tutor', $id_tutor, PDO::PARAM_INT);
$stmt->execute();
$contratos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="w3-container">
    <h3>Contratos</h3>
    <?php if (isset($contratos) && count($contratos) > 0): ?>
        <?php foreach ($contratos as $contrato): ?>
            <div class="w3-card-4">
                <div class="w3-container">
                    <h4>Aluno: <?php echo htmlspecialchars($contrato['nome_aluno']); ?></h4>
                    <p>Data de Contratação: <?php echo htmlspecialchars($contrato['data_contratacao']); ?></p>
                    <p>Status: <?php echo htmlspecialchars($contrato['status']); ?></p>
                    <form action="proc_excluir_contrato_tutor.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este contrato?');">
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
