<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16" />
  <title>BarbeariaOn</title>
  <!--stylesheet-->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,900" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="styles/styles.css" rel="stylesheet" type="text/css">
  <link href="styles/custom-responsive-styles.css" rel="stylesheet" type="text/css">

  <!--scripts-->
  <script type="text/javascript" src="scripts/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="scripts/all-plugins.js"></script>
  <script type="text/javascript" src="scripts/plugins-activate.js"></script>
</head>
<style>
  
  div.bg {
    position: absolute;
    top: 0;
    left: 0;
    background-color: #34ADFF;
    background: linear-gradient(274deg, #46c8d0, #6262e2 44%, #c962f7);
    width: 100%;
    height: 100vh;
}

div.auth {
    width: 90%;
    max-width: 500px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #FFF;
    border-radius: 10px;
    box-shadow: 0 20px 50px rgba(8, 112, 184, 0.7);
    
}

div.auth p.title{
    padding: 20px;
    text-align: center;
    font-size: 24pt;
    font-weight: bold;
    color: black;
}

div.auth form{
    display: block;
    margin: auto;
    padding: 20px;
}

div.auth input.field{
    display: block;
    margin: 10px auto;
    width: 100%;
    max-width: 400px;
    padding: 5px 10px;
    padding-left: 30px;
    border: 1px solid #CCC;
    border-radius: 3px;
}

div.auth input[type="text"]{
    background: url(images/user.png) no-repeat scroll 7px 7px;
    background-size: 16px;
}

div.auth input[type="email"]{
    background: url(images/email.png) no-repeat scroll 7px 7px;
    background-size: 16px;
}

div.auth input[type="password"]{
    background: url(images/password.png) no-repeat scroll 7px 7px;
    background-size: 16px;
}

div.auth button {
    display: block;
    margin: 20px auto;
    padding: 10px 25px;
    border: 1px solid #34ADFF;
    background-color: #6262e2;
    border-radius: 40px;
    color: #fff;
}

div.auth button:hover {
    background-color: #34ADFF;
    border-color: #34ADFF;
    color: #FFF;
    cursor: pointer;
}

div.auth button:disabled {
    opacity: 0.5;
    cursor: default;
}

div.auth p.toogle{
    padding: 20px;
    padding-top: 0px;
    text-align: center;
    cursor: pointer;
    color: black;
}

div.auth p.toogle:hover{
    text-decoration: underline #000;
}

div.register{
    display: none;
}


</style>

<body id="page-top">
  <!-- Navigation -->
  <div class="logo">
    <i aria-hidden="true"><span>BarbeariaOn</span></i>
  </div>
  <a class="menu-toggle rounded" href="#">
    <i class="fa fa-bars"></i>
  </a>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a class="smooth-scroll" href="#Header"></a>
      </li>
      <li class="sidebar-nav-item">
        <a href="index.php">Inicio</a>
      </li>
    </ul>
  </nav>
  <style></style>

  <section id="Banner" class="content-section">
  <div class="bg"></div>

<div class="auth login">
    <p class="title">Acesso Agenda</p>
    <form action="php/loginFunc.php" method="POST" id="login">
        <input type="text" name="nome" class="field" required="required" placeholder="E-mail ou username" />
        <input type="password" name="senha" class="field" required minlength="8" maxlength="12"  placeholder="Senha" />
        <button class="submit" value="enviar">Entrar</button>
    </form>
    <p class="toogle" onclick="$('.register').fadeIn()">Sou um administrador</p>
</div>
 
<div class="auth register">
    <p class="title">Acesso Administrativo</p>
    <form method="POST" action="php/loginAdm.php" id="register">
    <input type="text" name="nome" class="field" required="required" placeholder="E-mail ou username" />
        <input type="password" name="senha" class="field" required minlength="8" maxlength="12"  placeholder="Senha" />
        <button>Entrar</button>
    </form>
    <p class="toogle" onclick="$('.register').fadeOut()">Voltar</p>
</div>



<script>
  

</script>
  </section>



  <script src="js/jquery-.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/anim.js"></script>
  <script>
    //----HOVER CAPTION---//	  
  </script>
</body>

</html>