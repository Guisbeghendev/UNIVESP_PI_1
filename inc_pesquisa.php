<!-- pesquisa -->
<div class="w3-container">
    
    <div class="w3-row">
        <!-- titulo -->
    </div>

    <div class="w3-row"><!-- p simp -->
    
        <div class="w3-col">
            <!-- idioma -->
                <div class="w3-row">
                    <h3>Pesquise seu tutor por idioma!</h3>
                    <br>
                </div>
                <div class="w3-row">
                    <form action="proc_pesquisa_idioma.php" method="POST">
                        <label for="idioma">Idioma:</label><br>
                        <?php
                        // Consulta para recuperar todos os idiomas cadastrados pelos tutores
                        $sql = "SELECT DISTINCT idioma FROM IdiomaTutor";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $idiomas = $stmt->fetchAll(PDO::FETCH_COLUMN);

                        // Exibir checkboxes para cada idioma
                        foreach ($idiomas as $idioma) {
                            echo '<input type="checkbox" id="' . $idioma . '" name="idiomas[]" value="' . $idioma . '">';
                            echo '<label for="' . $idioma . '">' . $idioma . '</label><br>';
                        }
                        ?><br>
                        <input type="submit" name="pesquisar_por_idioma" value="Pesquisar">
                    </form>
                </div>
        </div>

        <div class="w3-col w3-hide">
            <!-- cidade -->
            <div class="w3-row">
                <h3>Pesquise seu tutor por cidade!</h3>
                <br>
            </div>
            <div class="w3-row">
                <form action="proc_pesquisa_cidade.php" method="POST">
                    <h4>Selecione a(s) cidade(s)</h4>
                    <?php
                    // Suponha que $cidades contenha a lista de cidades disponíveis
                    foreach ($cidades as $cidade) {
                        echo '<input type="checkbox" id="' . $cidade . '" name="cidades[]" value="' . $cidade . '">';
                        echo '<label for="' . $cidade . '">' . $cidade . '</label><br>';
                    }
                    ?>
                    <button type="submit">Pesquisar</button>
                </form>
            </div>
        </div>

        <div class="w3-col w3-hide">
            <!-- estado -->
            <div class="w3-row">
                <h3>Pesquise seu tutor por estado!</h3>
                <br>
            </div>
            <div class="w3-row">
                <form action="proc_pesquisa_estado.php" method="POST">
                    <h4>Selecione o(s) estado(s)</h4>
                    <?php
                    // Suponha que $estados contenha a lista de estados disponíveis
                    foreach ($estados as $estado) {
                        echo '<input type="checkbox" id="' . $estado . '" name="estados[]" value="' . $estado . '">';
                        echo '<label for="' . $estado . '">' . $estado . '</label><br>';
                    }
                    ?>
                    <button type="submit">Pesquisar</button>
                </form>

            </div>
        </div>

    </div>

    <div class="w3-row w3-hide">
        <!-- p esp -->
        <div class="w3-row w3-hide">
            <h3>Ou use nossa pesquisa especial</h3>
            <br>
        </div>
        <form action="proc_pesquisa_especial.php" method="POST">
        <button type="submit">Pesquisa CONECTANDO!</button>
    </form>
    </div>

    

</div>        
<!--fim pesquisa -->

        

                




