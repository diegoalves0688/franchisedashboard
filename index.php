<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Franchise Dashboard</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
<div class="pen-title">
    <h1>Dashboard de Franquiado</h1><span>Caso não consiga acessar - <a href='http://store.vtex.com'>Adquira um acesso</a></span>
</div>
<div class="module form-module">
    <div class="toggle"><i class=""></i>
    </div>
    <div class="form">
        <h2>Efetue Login</h2>
        <form name="login" action="/functions/getinfo.php" method="POST">
            <input type="text" name="accountname" placeholder="Account Name"/>
            <input type="text" name="email" placeholder="E-mail"/>
            <input type="password" name="password" placeholder="Senha"/>
            <input type="text" id="utm" name="utm" placeholder="UTM_SOURCE"/>
            <p>Data início:</p>
            <input type="date" name="data-inicio" placeholder="Data inicio"/>
            <p>Data fim:</p>
            <input type="date" name="data-fim" placeholder="Data fim"/>
            <input type="submit" value="Logar" id="enviar">
        </form>
    </div>
    <div class="cta"><a href="#">Documentação de ajuda</a></div>
</div>
<p>&nbsp;</p><p>&nbsp;</p>
</body>
</html>

<script type="text/javascript">
    jQuery("#enviar").hover(function() {
        if(jQuery("#utm").val()==""){
            alert("Preencha a utm");
        }
    });
</script>