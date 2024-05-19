<?php
// Incluir o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Inicializar a variável para armazenar os idiomas selecionados
$idiomas_selecionados = [];

// Verificar se foram selecionados idiomas
if (isset($_POST['idiomas']) && !empty($_POST['idiomas'])) {
    $idiomas_selecionados = $_POST['idiomas'];
}

// Consulta SQL para buscar os tutores que ensinam os idiomas selecionados
$sql = "SELECT DISTINCT t.id_tutor, t.nome, t.cidade, t.estado
        FROM Tutores t
        INNER JOIN IdiomaTutor it ON t.id_tutor = it.id_tutor
        WHERE it.idioma IN (".implode(',', array_fill(0, count($idiomas_selecionados), '?')).")";

// Preparar a consulta SQL
$stmt = $conn->prepare($sql);

// Executar a consulta SQL
$stmt->execute($idiomas_selecionados);

// Obter os resultados da pesquisa
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Incluir o arquivo de exibição dos resultados
include 'v_result_pesquisa.php';
?>
