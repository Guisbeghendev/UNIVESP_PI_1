<!DOCTYPE html>
<html>
<head>
<title>Conectando interesses</title>
  <meta http-equiv="content-language" content="pt-br">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <!-- corpo da pagina -->
    <div class="w3-container">
        <div class="w3-content" style="max-width:1800px;margin-top:5px">
            <!-- -->
            <form method="post" action="_processar_cadastro.php"><!-- para onde vai os dados do formulário -->       
                <!-- Formulário de inserção de dados -->
                <div class="w3-col">
                    <div class="w3-row"><!-- titulo form-->
                        <h2 class="h2">Cadastro de Alunos</h2>
                    </div>
                    <!-- form-->
                    <!-- Campos do formulário -->
                        <div class="w3-row"><div class="box">
                            <!-- nome-->
                            <label for="nome">Nome:</label><br>
                            <input type="text" placeholder="Nome completo" id="nome" name="nome" required><br><br>
                            <!-- -->
                            <!-- email-->
                            <label for="email">Email:</label><br>
                            <input type="email" placeholder="válido, para login" id="email" name="email" required><br><br>
                            <!-- -->
                            <!-- senha-->
                            <label for="senha">Senha:</label><br>
                            <input type="password" placeholder="senha de 6 a 8 caracteres" id="senha" name="senha" required><br><br>
                            <!-- -->
                            <!-- cidade-->
                            <label for="cidade">Cidade:</label><br>
                            <input type="text" placeholder="cidade" id="cidade" name="cidade" required><br><br>
                            <!-- -->
                            <!-- estado-->
                            <label for="estado">Estado:</label><br>
                            <input type="text" placeholder="UF" id="estado" name="estado" required><br><br>
                            <!-- -->
                            <!-- dataNasc-->
                            <label for="dataNasc">Data de nascimento:</label><br>
                            <input type="text" placeholder="dd/mm/aaaa" id="dataNasc" name="dataNasc" required><br><br>
                            <!-- -->
                            <!-- idioma-->
                            <label for="idioma">Idioma:</label><br>
                            <input type="text" placeholder="idioma escolhido" id="idioma" name="idioma" required><br><br>
                            <!-- -->
                        </div>
                        <!-- fim Campos do formulário -->
                        <!-- botao acoes do formulário -->
                        <div class="w3-row">
                            <br>
                            <div class="btnSubmit">
                                <input type="submit" value="ENVIAR">
                            </div>
                            <br><br><br>
                        </div></div>
                        <!--fim botao acoes do formulário -->
                    <!-- fim form-->
                </div>
            </form>
        </div>
    </div>
    <!-- fim corpo da pagina -->
<!--scripts final codigo-->

    <!--menu toglle -->
    <script>
        function myFunction() {
        var x = document.getElementById("demo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
        }
    </script>
    <!--fim menu toglle -->

<!--fim scripts final codigo-->

</body>
</html>