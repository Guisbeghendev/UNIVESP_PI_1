<?php
// Configurações do banco de dados
$servername = "localhost"; // Nome do servidor MySQL
$username = "u173063727_userCI24"; // Nome de usuário do MySQL
$password = "Conint24"; // Senha do MySQL
$database = "u173063727_bdCI24"; // Nome do banco de dados

try {
    // Cria a conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // Define o modo de erro do PDO para lançar exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Imprime mensagem de teste
    //echo "Conexão estabelecida com sucesso";
} catch(PDOException $e) {
    // Em caso de erro na conexão, exibe a mensagem de erro
    die("Conexão falhou: " . $e->getMessage());
}

// Agora você pode executar consultas SQL ou operações no banco de dados usando a variável $conn
?>
