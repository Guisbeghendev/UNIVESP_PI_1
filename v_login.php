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
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2017.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2018.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2019.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2020.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2021.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-safety.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-signal.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-vivid.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-food.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-camo.css">
    
</head>
<body>
    <!-- pagina geral -->
    <div class="w3-container-fluid geral">

        <!-- Modal msg ao login ser realizado com sucesso--> 
        <?php include "inc_modal_cadok.php" ?>
        <!-- fim Modal msg ao login ser realizado com sucesso-->

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

    <!-- msg login ok -->
    <!-- Adicione os links para os arquivos JavaScript do Bootstrap e jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script><?php include "msg_login_ok.js" ?></script>
    <!-- fim msg login ok -->

    
    <!--alterar tema-->
    <script><?php include "tema_script.js" ?></script>
    <!--fim alterar tema-->

<!--fim scripts-->

</body>
</html>
