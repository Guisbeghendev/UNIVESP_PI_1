<?php
// Inclua o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verifique se o ID do tutor está definido na sessão
if (!isset($_SESSION['id_tutor'])) {
    // Redirecione o usuário para a página de login ou exiba uma mensagem de erro
    header("Location: v_login.php");
    exit(); // Encerre o script
}

// Recupere o ID do tutor da sessão
$id_tutor = $_SESSION['id_tutor'];

try {
    // Consulta SQL para recuperar os dados do tutor
    $sql_tutor = "SELECT nome, email, data_nascimento, cidade, estado, biografia, foto_perfil FROM Tutores WHERE id_tutor = :id_tutor";
    $stmt_tutor = $conn->prepare($sql_tutor);
    $stmt_tutor->bindParam(':id_tutor', $id_tutor, PDO::PARAM_INT);
    $stmt_tutor->execute();

    // Verifique se os dados do tutor foram encontrados
    if ($stmt_tutor->rowCount() > 0) {
        // Extraia os dados do tutor
        $tutor = $stmt_tutor->fetch(PDO::FETCH_ASSOC);

        // Atribua os valores às variáveis
        $nome = $tutor['nome'];
        $email = $tutor['email'];
        $data_nascimento = $tutor['data_nascimento'];
        $cidade = $tutor['cidade'];
        $estado = $tutor['estado'];
        $biografia = $tutor['biografia'];
        $foto_perfil = $tutor['foto_perfil'];
    } else {
        // Se nenhum tutor foi encontrado com o ID fornecido, exiba uma mensagem de erro
        echo "Nenhum tutor encontrado com o ID fornecido.";
    }

    // Consulta SQL para recuperar a classificação total do tutor
    $sql_classificacao = "SELECT SUM(Classificacao) AS total_classificacao FROM Avaliacoes WHERE id_tutor = :id_tutor";
    $stmt_classificacao = $conn->prepare($sql_classificacao);
    $stmt_classificacao->bindParam(':id_tutor', $id_tutor, PDO::PARAM_INT);
    $stmt_classificacao->execute();
    $classificacao_result = $stmt_classificacao->fetch(PDO::FETCH_ASSOC);
    $total_classificacao = $classificacao_result['total_classificacao'] ?? 0;
    
} catch (PDOException $e) {
    // Em caso de erro na execução da consulta, exiba uma mensagem de erro
    echo "Erro ao recuperar os dados do tutor: " . $e->getMessage();
}
?>

<div class="w3-row">
    <div class="w3-row">
        <div class="w3-col">
            <!-- Aqui recupera a foto do perfil -->
            <?php 
            // Verificar se a foto do perfil está disponível
            if ($foto_perfil) {
                echo '<img src="data:image/jpeg;base64,'.base64_encode($foto_perfil).'" class="foto" alt="Foto do Perfil">';
            } else {
                echo '<div class="foto-placeholder">Foto não disponível</div>';
            }
            ?>
        </div>
        <div class="w3-col">
            <div class="w3-row"><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></div>
            <div class="w3-row"><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></div>
            <div class="w3-row"><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($data_nascimento); ?></div>
            <div class="w3-row"><strong>Cidade:</strong> <?php echo htmlspecialchars($cidade); ?></div>
            <div class="w3-row"><strong>Estado:</strong> <?php echo htmlspecialchars($estado); ?></div>
            <div class="w3-row"><strong>Biografia:</strong> <?php echo htmlspecialchars($biografia); ?></div>
        </div>
    </div>
    <div class="w3-row">
        <div class="w3-col">
            <div class="w3-row">
                <!-- Aqui exibe a classificação total do tutor -->
                <strong>Classificação Total:</strong> <?php echo $total_classificacao; ?>
            </div>
            <div class="w3-row">
            <!-- Botão para classificar o tutor -->
            <a href="v_classificar_tutor.php?id_tutor=<?php echo $id_tutor; ?>" class="w3-button w3-green">Classificar Tutor</a>
        </div>
        </div>
        <div class="w3-col">
            <!-- Botão para contratar o tutor -->
            <button class="w3-button w3-blue">Contratar Tutor</button>
        </div>
    </div>
</div>

<!-- Adicione aqui os scripts JavaScript, se necessário -->
