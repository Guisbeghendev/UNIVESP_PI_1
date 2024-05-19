<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: v_login.php");
    exit();
}

// Processar logout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpar todas as variáveis de sessão
    session_unset();

    // Destruir a sessão
    session_destroy();

    // Redirecionar para a página de login
    header("Location: v_login.php");
    exit();
}
?>

<!--main logout -->
<div class="w3-container entrar">
    <h1>Logout</h1>
    <p>Tem certeza que deseja fazer logout?</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="submit" value="Logout">
    </form>
</div>
<!--fim main logout -->