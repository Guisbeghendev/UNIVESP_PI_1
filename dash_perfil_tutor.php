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
    $sql = "SELECT nome, email, data_nascimento, cidade, estado, biografia, foto_perfil FROM Tutores WHERE id_tutor = :id_tutor";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_tutor', $id_tutor, PDO::PARAM_INT);
    $stmt->execute();

    // Verifique se os dados foram encontrados
    if ($stmt->rowCount() > 0) {
        // Extraia os dados do tutor
        $tutor = $stmt->fetch(PDO::FETCH_ASSOC);

        // Atribua os valores às variáveis
        $nome = $tutor['nome'];
        $email = $tutor['email'];
        $data_nascimento = $tutor['data_nascimento'];
        $cidade = $tutor['cidade'];
        $estado = $tutor['estado'];
        $biografia = $tutor['biografia'];
        $foto_perfil = $tutor['foto_perfil'];

        // Recuperar os idiomas associados ao tutor
        $sql_idiomas = "SELECT idioma FROM IdiomaTutor WHERE id_tutor = :id_tutor";
        $stmt_idiomas = $conn->prepare($sql_idiomas);
        $stmt_idiomas->bindParam(':id_tutor', $id_tutor, PDO::PARAM_INT);
        $stmt_idiomas->execute();
        $idiomas_result = $stmt_idiomas->fetchAll(PDO::FETCH_COLUMN);
    } else {
        // Se nenhum tutor foi encontrado com o ID fornecido, exiba uma mensagem de erro
        echo "Nenhum tutor encontrado com o ID fornecido.";
    }
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
            <!-- Aqui recupera os idiomas cadastrados -->
            <?php 
            // Se houverem idiomas associados, exibir os idiomas
            if ($idiomas_result) {
                echo '<strong>Idiomas:</strong> ' . count($idiomas_result) . '<br>';
                echo implode(', ', $idiomas_result);
            } else {
                // Se não houverem idiomas associados, exibir uma mensagem indicando isso
                echo '<strong>Idiomas:</strong> Nenhum idioma cadastrado';
            }
            ?>
        </div>
    </div>
    <div class="w3-row">
        <div class="w3-col">
            <!-- Aqui coloca os botões de editar perfil (com modal), excluir perfil, editar idiomas -->
            <button onclick="abrirModal('modal-editar-perfil')" class="w3-button w3-blue">Editar Perfil</button>
            <button onclick="abrirModal('modal-excluir-perfil')" class="w3-button w3-red">Excluir Perfil</button>
            <button onclick="abrirModal('modal-editar-idiomas')" class="w3-button w3-blue">Editar Idiomas</button>
        </div>
    </div>
</div>

<!-- Modal para editar perfil -->
<div id="modal-editar-perfil" class="w3-modal">
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="fecharModal('modal-editar-perfil')" class="w3-button w3-display-topright">&times;</span>
            <h2>Editar Perfil</h2>
            <form action="processa_atualizacao_perfil.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
                <!-- Adicione os outros campos de edição aqui -->
                <button class="w3-button w3-green" type="submit">Salvar</button>
            </form>
            <?php
            // Verifique se a atualização do perfil foi bem-sucedida
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<div class="alert alert-success" role="alert">Perfil atualizado com sucesso!</div>';
            }
            ?>
        </div>
    </div>
</div>

<!-- Modal para excluir perfil -->
<div id="modal-excluir-perfil" class="w3-modal">
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="fecharModal('modal-excluir-perfil')" class="w3-button w3-display-topright">&times;</span>
            <h2>Excluir Perfil</h2>
            <p>Tem certeza que deseja excluir seu perfil?</p>
            <button onclick="excluirPerfil()" class="w3-button w3-red">Sim, Excluir</button>
        </div>
    </div>
</div>

<!-- Modal para editar idiomas -->
<div id="modal-editar-idiomas" class="w3-modal">
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="fecharModal('modal-editar-idiomas')" class="w3-button w3-display-topright">&times;</span>
            <h2>Editar Idiomas</h2>
            <form action="processa_perfil_dashboard_tutor.php" method="POST">
                <!-- Campos para edição dos idiomas -->
                <!-- Você pode adicionar os campos de edição aqui -->
                <p><button class="w3-button w3-green" type="submit">Salvar</button></p>
            </form>
        </div>
    </div>
</div>
<!-- Adicione aqui os scripts JavaScript, se necessário -->
<script>
    // Função para abrir um modal
    function abrirModal(idModal) {
        document.getElementById(idModal).style.display = 'block';
    }

    // Função para fechar um modal
    function fecharModal(idModal) {
        document.getElementById(idModal).style.display = 'none';
    }

    // Função para excluir o perfil
    function excluirPerfil() {
        if (confirm("Tem certeza que deseja excluir seu perfil?")) {
            // Aqui você pode chamar o script PHP para excluir o perfil
            window.location.href = "processa_perfil_dashboard_tutor.php?excluir_perfil=Sim";
        }
    }
</script>
