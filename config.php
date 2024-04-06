<?php    
    //Configurações do banco de dados
    //$conn
    $dbserverhost = "localhost";
    $dbusername = "u173063727_univesp_pi1";
    $dbpassword = "UnivespPI2024";
    $dbname = "u173063727_conecta_idioma";
    
    //Criar conexão com o banco de dados
    $conn = new mysqli($dbserverhost,$dbusername,$dbpassword,$dbname);

    //Checar conexão
    if ($conn->connect_error) {
      die("Conexão bd falhou! " . $conn->connect_error);
    }
    echo "conexão bd ok"; 
?>