
<?php
// Configurações do banco de dados
$servername = "localhost"; // Endereço do servidor MySQL
$username = "u173063727_userConint"; // Nome de usuário do MySQL
$password = "UnivespPI2024"; // Senha do MySQL
$database = "u173063727_bdConint"; // Nome do banco de dados

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o BD: " . $conn->connect_error);
}

echo "Conexão bem sucedida com BD";

?>