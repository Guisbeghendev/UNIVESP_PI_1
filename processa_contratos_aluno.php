<?php
// Incluir o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verificar se o usuário está logado e é um aluno
session_start();
if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'aluno') {
    header("Location: index.php");
    exit();
}

// Verificar se há uma ação de contrato enviada via POST
if(isset($_POST['acao_contrato'])) {
    // Obter a ação do contrato e o ID do contrato
    $acao_contrato = $_POST['acao'];
    $id_contrato = $_POST['id_contrato'];

    // Verificar se o contrato pertence ao aluno atual (por segurança)
    $sql_verificar_contrato = "SELECT * FROM Contratos WHERE id_contrato = :id_contrato AND id_aluno = :id_aluno";
    $stmt_verificar_contrato = $conn->prepare($sql_verificar_contrato);
    $stmt_verificar_contrato->bindParam(":id_contrato", $id_contrato);
    $stmt_verificar_contrato->bindParam(":id_aluno", $_SESSION['id_usuario']);
    $stmt_verificar_contrato->execute();
    $contrato = $stmt_verificar_contrato->fetch(PDO::FETCH_ASSOC);

    if($contrato) {
        // Executar ação com base na ação do contrato
        switch ($acao_contrato) {
            case 'aceitar':
                // Implementar lógica para aceitar o contrato
                $sql_aceitar_contrato = "UPDATE Contratos SET status = 'aceito' WHERE id_contrato = :id_contrato";
                $stmt_aceitar_contrato = $conn->prepare($sql_aceitar_contrato);
                $stmt_aceitar_contrato->bindParam(":id_contrato", $id_contrato);
                $stmt_aceitar_contrato->execute();
                break;
            case 'recusar':
                // Implementar lógica para recusar o contrato
                $sql_recusar_contrato = "DELETE FROM Contratos WHERE id_contrato = :id_contrato";
                $stmt_recusar_contrato = $conn->prepare($sql_recusar_contrato);
                $stmt_recusar_contrato->bindParam(":id_contrato", $id_contrato);
                $stmt_recusar_contrato->execute();
                break;
            default:
                // Ação inválida, redirecionar de volta para a página do contrato
                header("Location: contrato.php?id=$id_contrato");
                exit();
        }
    }
}

// Listar contratos do aluno
$sql_listar_contratos = "SELECT * FROM Contratos WHERE id_aluno = :id_aluno";
$stmt_listar_contratos = $conn->prepare($sql_listar_contratos);
$stmt_listar_contratos->bindParam(":id_aluno", $_SESSION['id_usuario']);
$stmt_listar_contratos->execute();
$contratos = $stmt_listar_contratos->fetchAll(PDO::FETCH_ASSOC);

// Redirecionar de volta para a página de contratos após a execução da ação
header("Location: contratos_aluno.php");
exit();
?>
