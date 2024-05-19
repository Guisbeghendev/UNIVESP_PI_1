<?php
// Início da sessão
session_start();

// Verificar se o aluno está autenticado e a sessão está definida
if (isset($_SESSION['id_aluno']) && !empty($_SESSION['id_aluno'])) {
    // Atribuir o ID do aluno à variável $id_aluno
    $id_aluno = $_SESSION['id_aluno'];

    // Incluir o arquivo de conexão com o banco de dados
    require_once 'conexao.php';

    // Recuperar os dados do aluno do banco de dados
    try {
        $sql = "SELECT nome, email, cidade, estado, data_nascimento, biografia, foto_perfil FROM Alunos WHERE id_aluno = :id_aluno";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
        $stmt->execute();
        $dados_aluno = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar se os dados do aluno foram encontrados
        if ($dados_aluno) {
            // Atribuir os dados do aluno a variáveis individuais
            $nome = $dados_aluno['nome'];
            $email = $dados_aluno['email'];
            $cidade = $dados_aluno['cidade'];
            $estado = $dados_aluno['estado'];
            $data_nascimento = $dados_aluno['data_nascimento'];
            $biografia = $dados_aluno['biografia'];
            $foto_perfil = $dados_aluno['foto_perfil'];
        } else {
            // Se os dados do aluno não foram encontrados, redirecionar para uma página de erro
            header("Location: pagina_de_erro.php");
            exit();
        }
    } catch (PDOException $e) {
        // Em caso de erro na recuperação dos dados do aluno, exibir uma mensagem de erro
        echo "Erro ao recuperar os dados do aluno: " . $e->getMessage();
        exit();
    }
} else {
    // Se o aluno não estiver autenticado, redirecionar para a página de login
    header("Location: v_login.php");
    exit();
}

// Processamento do formulário de edição
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar_perfil"])) {
    // Verificar se todos os campos foram enviados
    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['cidade']) && isset($_POST['estado']) && isset($_POST['data_nascimento']) && isset($_POST['biografia'])) {
        // Recuperar os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $data_nascimento = $_POST["data_nascimento"];
        $biografia = $_POST["biografia"];

        // Atualizar os dados do aluno no banco de dados
        try {
            $sql_update = "UPDATE Alunos SET nome = :nome, email = :email, cidade = :cidade, estado = :estado, data_nascimento = :data_nascimento, biografia = :biografia WHERE id_aluno = :id_aluno";
            $stmt_update = $pdo->prepare($sql_update);
            $stmt_update->bindParam(':nome', $nome);
            $stmt_update->bindParam(':email', $email);
            $stmt_update->bindParam(':cidade', $cidade);
            $stmt_update->bindParam(':estado', $estado);
            $stmt_update->bindParam(':data_nascimento', $data_nascimento);
            $stmt_update->bindParam(':biografia', $biografia);
            $stmt_update->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
            $stmt_update->execute();

            // Redirecionar para o perfil do aluno após a atualização
            header("Location: perfil_aluno.php");
            exit();
        } catch (PDOException $e) {
            // Em caso de erro na atualização dos dados, exibir uma mensagem de erro
            echo "Erro ao atualizar os dados do aluno: " . $e->getMessage();
            exit();
        }
    } else {
        // Se algum campo estiver faltando, exibir uma mensagem de erro
        echo "Erro: Todos os campos são obrigatórios.";
    }
}

// Processamento da exclusão do perfil
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["excluir_perfil"])) {
    // Excluir o perfil do aluno do banco de dados
    try {
        $sql_delete = "DELETE FROM Alunos WHERE id_aluno = :id_aluno";
        $stmt_delete = $pdo->prepare($sql_delete);
        $stmt_delete->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
        $stmt_delete->execute();

        // Encerrar a sessão e redirecionar para a página inicial após a exclusão do perfil
        session_destroy();
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        // Em caso de erro na exclusão do perfil, exibir uma mensagem de erro
        echo "Erro ao excluir o perfil do aluno: " . $e-> getMessage();
        exit();
        }
        }
        
        // Recuperação dos idiomas associados ao aluno
        try {
        $sql_idiomas = "SELECT idioma FROM IdiomaAluno WHERE id_aluno = :id_aluno";
        $stmt_idiomas = $pdo->prepare($sql_idiomas);
        $stmt_idiomas->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
        $stmt_idiomas->execute();
        $idiomas_result = $stmt_idiomas->fetchAll(PDO::FETCH_COLUMN);
        // Se houverem idiomas associados, exibir a quantidade e os idiomas
if ($idiomas_result) {
    $idiomas = implode(', ', $idiomas_result);
} else {
    // Se não houverem idiomas associados, exibir uma mensagem indicando isso
    $idiomas = 'Nenhum idioma cadastrado';
}
} catch (PDOException $e) {
    // Em caso de erro na recuperação dos idiomas, exibir uma mensagem de erro
    echo "Erro ao recuperar os idiomas do aluno: " . $e->getMessage();
    }
    
    ?>
    
    <div class="w3-row">
        <div class="w3-row">
            <div class="w3-col">
                <!-- Aqui recupera a foto do perfil -->
                <?php 
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
                <div class="w3-row"><strong>Idiomas:</strong> <?php echo htmlspecialchars($idiomas); ?></div>
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                    <label for="nome">Nome:</label><br>
                    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>"><br>
                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
                    <label for="cidade">Cidade:</label><br>
                    <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($cidade); ?>"><br>
                    <label for="estado">Estado:</label><br>
                    <input type="text" id="estado" name="estado" value="<?php echo htmlspecialchars($estado); ?>"><br>
                    <label for="data_nascimento">Data de Nascimento:</label><br>
                    <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($data_nascimento); ?>"><br>
                    <label for="biografia">Biografia:</label><br>
                    <textarea id="biografia" name="biografia"><?php echo htmlspecialchars($biografia); ?></textarea><br>
                    <input type="submit" name="editar_perfil" value="Salvar">
                </form>
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <input type="submit" name="excluir_perfil" value="Sim, Excluir">
</form>
</div>
</div>

</div>
<!-- Modal para editar idiomas -->
<div id="modal-editar-idiomas" class="w3-modal">
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="fecharModal('modal-editar-idiomas')" class="w3-button w3-display-topright">&times;</span>
            <h2>Editar Idiomas</h2>
            <!-- Aqui você pode adicionar o formulário para editar os idiomas -->
            <form action="processa_perfil_dashboard_aluno.php" method="POST">
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
</script>
