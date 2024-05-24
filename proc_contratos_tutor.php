<?php
// Iniciar a sessão
session_start();

// Verificar se o tutor está logado
if (!isset($_SESSION['id_tutor'])) {
    header("Location: v_login.php");
    exit();
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os dados necessários foram enviados
    if (isset($_POST['acao_contrato'], $_POST['id_contrato'], $_POST['acao'])) {
        $acao_contrato = $_POST['acao_contrato'];
        $id_contrato = $_POST['id_contrato'];
        $acao = $_POST['acao'];

        // Processar a ação do contrato (aceitar ou recusar)
        if ($acao_contrato == 1 && ($acao == 'aceitar' || $acao == 'recusar')) {
            // Aqui você pode executar as ações necessárias, como atualizar o status do contrato no banco de dados
            // Por exemplo:
            // Se a ação for 'aceitar', você pode atualizar o status do contrato para 'aceito'
            // Se a ação for 'recusar', você pode atualizar o status do contrato para 'recusado'

            // Após processar a ação, você pode redirecionar de volta para o perfil do tutor ou realizar outras operações necessárias
            // Por exemplo:
            header("Location: dashboard_tutor.php?id=" . $_SESSION['id_tutor']);
            exit();
        } else {
            echo "Ação inválida.";
        }
    } else {
        echo "Dados insuficientes.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
