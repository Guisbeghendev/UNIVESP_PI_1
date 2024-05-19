<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectando Interesses</title>

    <!-- Estilos para o tema claro (padrão) -->
    <link id="light-theme" rel="stylesheet" href="light-theme.css">
    <!-- Estilos para o tema escuro (oculto inicialmente) -->
    <link id="dark-theme" rel="stylesheet" href="dark-theme.css" disabled>
    <!-- Adicione seu próprio arquivo CSS personalizado, se necessário -->
    <!--<link rel="stylesheet" href="_css/geral.css">-->

    <!-- Adicione os links para os arquivos CSS do Bootstrap e W3.CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Adicione outros links css se necessário -->
    
</head>
<body>
    <!-- pagina geral -->
    <div class="w3-container-fluid geral">

        <div class="w3-col">

            <div class="w3-row">
                <!--header-->
                <?php include "inc_header.html" ?>
                <!--fim header-->
            </div>

            <div class="w3-row w3-black">
                <!--bar alt_tema-->
                <?php include "inc_alt_tema.html" ?>
                <!--fim bar alt_tema-->
            </div>

            <div class="w3-row">
                <!--navbar--> 
                <?php include "inc_navbar.html" ?>
                <!--fim navbar-->
            </div>
            
            <div class="w3-row">
                <!-- Conteúdo principal - main -->
                <?php include "inc_login.php" ?>
                <!-- fim Conteúdo principal -->
            </div>

            <div class="w3-row">
                <!-- footer -->
                <?php include "inc_footer.php" ?>
                <!-- fim footer -->
            </div>
        
        </div>

    </div>
    <!-- fim pagina geral -->



<!--scripts-->
    <!-- menu navbar hamburger-->
    <script><?php include "script_nav_hamburger.js" ?></script>
    

    <!-- Adicione os links para os arquivos JavaScript do Bootstrap e jQuery -->
    <script><?php include "links_script.html" ?></script>
    
    
    <!--alterar tema-->
    <script><?php include "tema_script.js" ?></script>
    <!--fim alterar tema-->
    
<!--fim scripts-->

</body>
</html>

