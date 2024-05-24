<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Verifica se foi enviado um formulário de cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrar"])) {
    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $data_nascimento = $_POST["data_nascimento"];
    $biografia = $_POST["biografia"];
    $idiomas = $_POST["idiomas"]; // Array de idiomas
    $tipo_usuario = $_POST["tipo_usuario"]; // Indica se é aluno ou tutor
    $foto_perfil = isset($_POST["foto_perfil"]) ? $_POST["foto_perfil"] : null; // Aqui você precisa lidar com o upload da imagem

    // Verifica se o email já está cadastrado em Alunos
    $sql_verifica_email_aluno = "SELECT COUNT(*) AS total FROM Alunos WHERE email = :email";
    $stmt_verifica_email_aluno = $conn->prepare($sql_verifica_email_aluno);
    $stmt_verifica_email_aluno->bindParam(":email", $email);
    $stmt_verifica_email_aluno->execute();
    $row_verifica_email_aluno = $stmt_verifica_email_aluno->fetch(PDO::FETCH_ASSOC);

    // Verifica se o email já está cadastrado em Tutores
    $sql_verifica_email_tutor = "SELECT COUNT(*) AS total FROM Tutores WHERE email = :email";
    $stmt_verifica_email_tutor = $conn->prepare($sql_verifica_email_tutor);
    $stmt_verifica_email_tutor->bindParam(":email", $email);
    $stmt_verifica_email_tutor->execute();
    $row_verifica_email_tutor = $stmt_verifica_email_tutor->fetch(PDO::FETCH_ASSOC);

    // Verifica se o email já existe em qualquer uma das tabelas
    if ($row_verifica_email_aluno['total'] > 0 || $row_verifica_email_tutor['total'] > 0) {
        // Se o email já existe, exibe mensagem de erro e redireciona para a página de cadastro
        echo "Este e-mail já está cadastrado. Por favor, utilize outro.";
        header("Location: v_cadastro.php");
        exit();
    }

    // Verifica o tipo de usuário (aluno ou tutor)
    if ($tipo_usuario == "aluno" || $tipo_usuario == "tutor") {
        // Define a tabela do banco de dados com base no tipo de usuário
        $tabela_usuario = ($tipo_usuario == "aluno") ? "Alunos" : "Tutores";

        // Insere os dados do usuário na tabela correspondente
        $sql_usuario = "INSERT INTO $tabela_usuario (nome, email, senha, cidade, estado, data_nascimento, biografia, foto_perfil) 
                        VALUES (:nome, :email, :senha, :cidade, :estado, :data_nascimento, :biografia, :foto_perfil)";
        $stmt_usuario = $conn->prepare($sql_usuario);
        $stmt_usuario->bindParam(":nome", $nome);
        $stmt_usuario->bindParam(":email", $email);
        $stmt_usuario->bindParam(":senha", $senha);
        $stmt_usuario->bindParam(":cidade", $cidade);
        $stmt_usuario->bindParam(":estado", $estado);
        $stmt_usuario->bindParam(":data_nascimento", $data_nascimento);
        $stmt_usuario->bindParam(":biografia", $biografia);
        $stmt_usuario->bindParam(":foto_perfil", $foto_perfil);

        // Executa a inserção do usuário
        if ($stmt_usuario->execute()) {
            echo "Cadastro realizado com sucesso";
            
            // Recupera o ID do usuário inserido
            $last_id = $conn->lastInsertId();
            
            // Insere os idiomas do usuário na tabela correspondente
            foreach ($idiomas as $idioma) {
                $sql_idioma = ($tipo_usuario == "aluno") ? "INSERT INTO IdiomaAluno (id_aluno, idioma) VALUES (:id_aluno, :idioma)" : "INSERT INTO IdiomaTutor (id_tutor, idioma) VALUES (:id_tutor, :idioma)";
                $stmt_idioma = $conn->prepare($sql_idioma);
                $stmt_idioma->bindParam(":idioma", $idioma);
                if ($tipo_usuario == "aluno") {
                    $stmt_idioma->bindParam(":id_aluno", $last_id);
                } else {
                    $stmt_idioma->bindParam(":id_tutor", $last_id);
                }
                $stmt_idioma->execute();
            }

            // Redireciona para a página de login do usuário com um parâmetro de sucesso
            header("Location: v_login.php?cadastro=sucesso");
            exit();
        } else {
            echo "Erro ao cadastrar o usuário";
        }
    } else {
        echo "Tipo de usuário inválido";
    }
}
?>
