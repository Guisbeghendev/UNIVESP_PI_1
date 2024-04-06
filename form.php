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
        $email = $_POST['username'];
        $senha = $_POST['password'];
        $telefone = $_POST['cidade_aluno'];
        $sexo = $_POST['estado_aluno'];
        $data_nasc = $_POST['dataNasc_aluno'];
        $cidade = $_POST['disciplinas_aluno'];
        $estado = $_POST['email_aluno'];
        /*$endereco = $_POST['endereco'];*/

        $result = mysqli_query($conn, "INSERT INTO cad_Alunos(nome_aluno,username,password,cidade_aluno,estado_aluno,dataNasc_aluno,disciplinas_aluno,email_aluno) 
        VALUES ('$nome_aluno','$username','$password','$cidade_aluno','$estado_aluno,'$dataNasc_aluno,'$disciplinas_aluno','$email_aluno')");

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
            <!--<form action="<?php // echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">-->
                <fieldset>
                    <!-- linha form -->
                    <div class="w3-row">
                        <legend><b><u>CADASTRO DE ALUNOS</u></b></legend>
                        <br>
                            <!--nome -->
                            <div class="inputBox">
                                <label for="nome" class="labelInput">Nome completo:</label>
                                <input type="text" placeholder="Nome aluno(a)" name="nome" id="nome" class="inputUser" required>
                            </div>
                            <br>
                            <!-- -->
                            <!--username -->
                            <div class="inputBox">
                                <label for="username" class="labelInput">Apelido:</label>
                                <input type="text" placeholder="Será seu login" name="username" id="username" class="inputUser" required>
                            </div>
                            <br>
                            <!-- -->
                            <!--password -->
                            <div class="inputBox">
                                <label for="password" class="labelInput">Senha:</label>
                                <input type="password" placeholder="6 a 8 caracteres" name="password" id="password" class="inputUser" required>
                            </div>
                            <br>
                            <!-- -->
                            <!--cidade_aluno -->
                            <div class="inputBox">
                                <label for="cidade_aluno" class="labelInput">Cidade:</label>
                                <input type="text" placeholder="cidade" name="cidade_aluno" id="cidade_aluno" class="inputUser" required>
                            </div>
                            <br>
                            <!-- -->
                            <!--estado_aluno -->
                            <div class="inputBox">
                                <label for="estado_aluno" class="labelInput">Estado:</label>
                                <input type="text" placeholder="UF" name="estado_aluno" id="estado_aluno" class="inputUser" required>
                            </div>
                            <br>
                            <!-- -->
                            <!--dataNasc_aluno -->
                            <div class="inputBox">
                                <label for="dataNasc_aluno" class="labelInput">Data de nascimento:</label>
                                <input type="text" placeholder="dd/mm/aaaa" name="dataNasc_aluno" id="dataNasc_aluno" class="inputUser" required>
                            </div>
                            <br>
                            <!-- -->
                            <!--disciplinas_aluno -->
                            <div class="inputBox">
                                <label for="disciplinas_aluno" class="labelInput">Línguas desejadas:</label>
                                <input type="text" placeholder="Línguas desejadas" name="disciplinas_aluno" id="disciplinas_aluno" class="inputUser" required>
                            </div>
                            <br>
                            <!-- -->
                            <!--email_aluno -->
                            <div class="inputBox">E-mail:</label>
                                <input type="email" placeholder="e-mail" name="email_aluno" id="email_aluno" class="inputUser" required>
                            </div>
                            <br>
                            <!-- -->
                        <br><br>
                    </div>
                    <div class="w3-row">
                    <!-- linha botao açoes form -->
                        <input type="submit" value="ENVIAR" name="submit" id="submit">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
            

</div>
                




    

