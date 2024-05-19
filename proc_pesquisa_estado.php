<?php
// Incluir o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Inicializar a variável para armazenar os estados selecionados
$estados_selecionados = [];

// Verificar se foram selecionados estados
if (isset($_POST['estados']) && !empty($_POST['estados'])) {
    $estados_selecionados = $_POST['estados'];
}

// Consulta SQL para buscar os tutores que estão nos estados selecionados
$sql = "SELECT DISTINCT t.nome, t.cidade, t.estado
        FROM Tutores t
        WHERE t.estado IN (".implode(',', array_fill(0, count($estados_selecionados), '?')).")";

// Preparar a consulta SQL
$stmt = $conn->prepare($sql);

// Executar a consulta SQL
$stmt->execute($estados_selecionados);

// Obter os resultados da pesquisa
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Incluir o arquivo de exibição dos resultados
include 'result_pesquisa_estado.php';
?>
