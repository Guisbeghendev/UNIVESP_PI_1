<!-- Formulário de cadastro de aluno e tutor -->
<div class="w3-container entrar">
    <div class="w3-container chavear">
        
        <h2>Cadastro de Usuário</h2>
        <form method="POST" action="processa_cadastro.php">
            <div>
                <label for="tipo_usuario">Tipo de Usuário:</label>
                <div>
                    <input type="radio" id="aluno" name="tipo_usuario" value="aluno" required>
                    <label for="aluno">Aluno</label>
                </div>
                <div>
                    <input type="radio" id="tutor" name="tipo_usuario" value="tutor" required>
                    <label for="tutor">Tutor</label>
                </div>
            </div>
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div>
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade">
            </div>
            <div>
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado">
            </div>
            <div>
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento">
            </div>
            <div>
                <label for="biografia">Biografia:</label>
                <textarea id="biografia" name="biografia"></textarea>
            </div>
            <div id="idiomas">
                <div>
                    <label for="idioma">Idioma:</label>
                    <input type="text" id="idioma" name="idiomas[]" required>
                </div>
            </div>
            <button type="button" onclick="addCampoIdioma()">Adicionar Idioma</button>
            <div>
                <label for="foto_perfil">Foto de Perfil:</label>
                <input type="file" id="foto_perfil" name="foto_perfil">
            </div>
            <button type="submit" name="registrar">Registrar</button>
        </form>

    <script>
        function addCampoIdioma() {
            var divIdiomas = document.getElementById('idiomas');
            var novoCampo = document.createElement('div');
            novoCampo.innerHTML = '<label for="idioma">Idioma:</label>' +
                                  '<input type="text" id="idioma" name="idiomas[]" required>';
            divIdiomas.appendChild(novoCampo);
        }
    </script>

    </div>
</div>
<!-- Formulário de cadastro de aluno e tutor -->

