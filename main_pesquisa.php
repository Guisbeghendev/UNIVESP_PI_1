<!--pesquisas -->
<div class="w3-container ">

<div class="w3-row">
    <h2>Resultados da Pesquisa por Idioma</h2>
    <?php
    if (!empty($resultados)) {
        echo '<div class="resultados">';
        echo '<table>';
        echo '<tr><th>Nome</th><th>Cidade</th><th>Estado</th><th>Perfil do Tutor</th></tr>';
        foreach ($resultados as $resultado) {
            echo '<tr>';
            echo '<td>' . $resultado['nome'] . '</td>';
            echo '<td>' . $resultado['cidade'] . '</td>';
            echo '<td>' . $resultado['estado'] . '</td>';
            echo '<td>';
            if (isset($resultado['id_tutor'])) {
                echo '<form action="v_perfil_tutor_pesquisa.php" method="POST" target="_blank">';
                echo '<input type="hidden" name="id" value="' . $resultado['id_tutor'] . '">';
                echo '<input type="submit" value="Visualizar Perfil">';
                echo '</form>';
            } else {
                echo 'Perfil Indisponível';
            }
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p>Nenhum tutor encontrado nos idiomas selecionados.</p>';
    }
    ?>
</div>



    <br>

        <div class="w3-row">
            <h2>Resultados da Pesquisa por Cidade</h2>
            <?php
            if (!empty($resultados)) {
                echo '<div class="resultados">';
                echo '<table>';
                echo '<tr><th>Nome</th><th>Cidade</th><th>Estado</th></tr>';
                foreach ($resultados as $resultado) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($resultado['nome']) . '</td>';
                    echo '<td>' . htmlspecialchars($resultado['cidade']) . '</td>';
                    echo '<td>' . htmlspecialchars($resultado['estado']) . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
                echo '</div>';
            } else {
                echo '<p>Nenhum tutor encontrado nas cidades selecionadas.</p>';
            }
            ?>
        </div>
    
    <br>

        <div class="w3-row">
            <h2>Resultados da Pesquisa por Estado</h2>
            <?php
            if (!empty($resultados)) {
                echo '<div class="resultados">';
                echo '<table>';
                echo '<tr><th>Nome</th><th>Cidade</th><th>Estado</th></tr>';
                foreach ($resultados as $resultado) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($resultado['nome']) . '</td>';
                    echo '<td>' . htmlspecialchars($resultado['cidade']) . '</td>';
                    echo '<td>' . htmlspecialchars($resultado['estado']) . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
                echo '</div>';
            } else {
                echo '<p>Nenhum tutor encontrado nos estados selecionados.</p>';
            }
            ?>
        </div>
    
    <br>

    

<!--fim pesquisas -->
