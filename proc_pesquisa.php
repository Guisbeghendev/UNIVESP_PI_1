<?php
// Incluir o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Iniciar a sessão
session_start();

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar o tipo de pesquisa solicitada
    if (isset($_POST['tipo_pesquisa'])) {
        $tipo_pesquisa = $_POST['tipo_pesquisa'];

        // Pesquisa por idioma
        if ($tipo_pesquisa == 'idioma') {
            // Verificar se o idioma foi selecionado
            if (isset($_POST['idioma'])) {
                // Recuperar o idioma selecionado no formulário
                $idioma = $_POST['idioma'];

                // Consulta SQL para buscar os tutores que ensinam o idioma selecionado
                $sql = "SELECT * FROM Tutores WHERE id_tutor IN (SELECT id_tutor FROM IdiomaTutor WHERE idioma = :idioma)";
                
                // Preparar a consulta
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idioma', $idioma, PDO::PARAM_STR);
                
                // Executar a consulta
                $stmt->execute();
                
                // Armazenar os resultados na sessão
                $_SESSION['resultados'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                // Redirecionar para o arquivo de exibição dos resultados
                header('Location: v_resultado.php');
                exit();
            } else {
                echo "Por favor, selecione um idioma.";
            }
        } 
        // Pesquisa por cidade e/ou estado
        elseif ($tipo_pesquisa == 'localizacao') {
            // Recuperar a cidade e o estado inseridos no formulário
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];

            // Consulta SQL para buscar os tutores na cidade e/ou estado especificados
            $sql = "SELECT * FROM Tutores WHERE cidade = :cidade";
            if (!empty($estado)) {
                $sql .= " AND estado = :estado";
            }

            // Preparar a consulta
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
            if (!empty($estado)) {
                $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            }

            // Executar a consulta
            $stmt->execute();
            
            // Armazenar os resultados na sessão
            $_SESSION['resultados'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Redirecionar para o arquivo de exibição dos resultados
            header('Location: v_resultado.php');
            exit();
        }
    } else {
        echo "Tipo de pesquisa não especificado.";
    }
}
?>
