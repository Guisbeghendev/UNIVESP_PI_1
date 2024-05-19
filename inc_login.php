<!-- Formulário de login -->
<div class="w3-container entrar">
    <div class="w3-container chavear">
        <h2>Login</h2>
        <form method="POST" action="processa_login.php">
            <div>
                <input type="radio" id="aluno" name="tipo_usuario" value="aluno" checked>
                <label for="aluno">Aluno</label>
                <input type="radio" id="tutor" name="tipo_usuario" value="tutor">
                <label for="tutor">Tutor</label>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</div>
<!-- Fim do formulário de login -->
