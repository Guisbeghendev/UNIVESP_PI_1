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

        <!--header-->
        <section class="header w3-show">
        <?php include 'header.html';?>
        </section>
        <!--fim header-->

        <!--navbar-->
        <section class="navbar w3-hide">
        <?php include 'navbar.html';?>
        </section>
        <!--fim navbar-->

        <!--verifica se o usuario esta logado--
        <section class="verifica_logado w3-hide">
            <?php /* include 've_logado.php'; */ ?>
        </section>
        !--fim verifica se o usuario esta logado-->

        <!--main--><!--pagina inicial do sistema-pagina diferente das demais-->
        <section class="main w3-show">
        <?php include 'main.html';?>
        </section>
        <!--fim main-->

        <!--footer-->
        <section class="footer w3-show">
        <?php include 'footer.html';?>
        </section>
        <!--fim footer-->

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