<?php
// Incluir o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Inicializar a variável para armazenar as cidades selecionadas
$cidades_selecionadas = [];

// Verificar se foram selecionadas cidades
if (isset($_POST['cidades']) && !empty($_POST['cidades'])) {
    $cidades_selecionadas = $_POST['cidades'];
}

// Consulta SQL para buscar os tutores que estão em cidades selecionadas
$sql = "SELECT DISTINCT t.nome, t.cidade, t.estado
        FROM Tutores t
        WHERE t.cidade IN (".implode(',', array_fill(0, count($cidades_selecionadas), '?')).")";

// Preparar a consulta SQL
$stmt = $conn->prepare($sql);

// Executar a consulta SQL
$stmt->execute($cidades_selecionadas);

// Obter os resultados da pesquisa
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Incluir o arquivo de exibição dos resultados
include 'v_result_pesquisa.php';
?>
