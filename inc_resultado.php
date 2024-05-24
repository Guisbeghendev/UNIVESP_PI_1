<?php

// Verificar se existem resultados armazenados na sessão
if (isset($_SESSION['resultados']) && !empty($_SESSION['resultados'])) {
    $resultados = $_SESSION['resultados'];
    
    echo '<h2>Resultados da Pesquisa</h2>';
    echo '<table border="1">';
    echo '<tr><th>Nome</th><th>Cidade</th><th>Estado</th><th>Ações</th></tr>';
    
    foreach ($resultados as $tutor) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($tutor['nome']) . '</td>';
        echo '<td>' . htmlspecialchars($tutor['cidade']) . '</td>';
        echo '<td>' . htmlspecialchars($tutor['estado']) . '</td>';
        echo '<td>';
        echo '<form action="v_perfil_tutor_resultado.php" method="POST" style="display:inline;">';
        echo '<input type="hidden" name="id_tutor" value="' . htmlspecialchars($tutor['id_tutor']) . '">';
        echo '<button type="submit">Visualizar Perfil</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
} else {
    echo "Nenhum tutor encontrado para os critérios de pesquisa especificados.";
}

// Limpar os resultados da sessão após exibição
unset($_SESSION['resultados']);
?>
