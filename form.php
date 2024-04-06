<?php

/* campos do formulário coletados para inserção no banco de dados

nome_aluno
username
password
cidade_aluno
estado_aluno
dataNasc_aluno
disciplinas_aluno
email_aluno

fim campos do formulário coletados para inserção no banco de dados */

if(isset($_POST['submit']))
    {
        // print_r('nome_aluno: ' . $_POST['nome_aluno']);
        // print_r('<br>');

        // print_r('Email: ' . $_POST['email']);
        // print_r('<br>');
        // print_r('Telefone: ' . $_POST['telefone']);
        // print_r('<br>');
        // print_r('Sexo: ' . $_POST['genero']);
        // print_r('<br>');
        // print_r('Data de nascimento: ' . $_POST['data_nascimento']);
        // print_r('<br>');
        // print_r('Cidade: ' . $_POST['cidade']);
        // print_r('<br>');
        // print_r('Estado: ' . $_POST['estado']);
        // print_r('<br>');
        // print_r('Endereço: ' . $_POST['endereco']);

        include_once('config.php');

        $nome = $_POST['nome_aluno'];

        /*$email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];*/

        $result = mysqli_query($conn, "INSERT INTO cad_Alunos(nome_aluno) 
        VALUES ('$nome_aluno')");

        header('Location: login.php');
    }

?>

<!--form cad aluno-->
<div class="form_cad_aluno">

    <!-- linha botão voltar -->
    <div class="w3-row">
        <a href="home.php">Voltar</a>
    </div>
    <br>

    <!-- form -->
    <div class="w3-row">
        <div class="box">
            <form action="form.php" method="POST">
       <!-- <form action="<?php // echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"> -->
                <fieldset>
                    <!-- linha form -->
                    <div class="w3-row">
                        <legend><b><u>CADASTRO DE ALUNOS</u></b></legend>
                        <br>
                            <div class="inputBox">
                                <label for="nome" class="labelInput">Nome completo:</label>
                                <input type="text" name="nome" id="nome" class="inputUser" required>
                            </div>
                        <br><br>
                    </div>
                    <div class="w3-row">
                    <!-- linha botao açoes form -->
                        botoes acao form
                        <input type="submit" value="ENVIAR" name="submit" id="submit">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
            

</div>
                




    

