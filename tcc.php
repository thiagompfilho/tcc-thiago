<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="css\style2.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Barber Man Shop</title>
</head>

<body background="img/planodefundo1.webp">
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <h1>Barber Man Shop</h1>
            </div>
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="cadastro.php" class="nav-link">Agendamento e Serviços</a></li>
                </ul>
            </div>
            <div class="login-button">
                <button><a href="cadastro.php">Cadastrar-se</a></button>
            </div>
         

            <div class="mobile-menu-icon">
                <button onclick="menu()"><img class="icon" src="img/arredondado.png" alt=""></button>
            </div>
        </nav>
        <div class="mobile-menu">
            <ul>
                
                <li class="nav-item"><a href="cleage.php" class="nav-link">Agendamento</a></li>
            </ul>

            <div class="login-button">
                <button><a href="cadastro.php">Cadastrar-se</a></button>
            </div>
        </div>
    </header>
<div></div>
<main></main>
<footer>
    <div id="footer_content">
    <div id="footer_contacts">
        <h1>Barber Man Shop</h1>
        <p>Cortando seu cabelo e barba por gerações</p>
        <div id="footer_ms">
            <a href="#" class="footer-link" id="facebook">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="#" class="footer-link" id="whatsapp">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </div>
    </div>
    <ul class="footer-list">
        <li>
            <a href="https://www.google.com.br/maps/place/R.+Ipanema,+1586+-+Bras%C3%ADlia,+Cascavel+-+PR,+85815-310/@-24.9344637,-53.4201561,17z/data=!3m1!4b1!4m6!3m5!1s0x94f3d49e81e7139b:0x5b1a0bcaff1fbd3f!8m2!3d-24.9344686!4d-53.4175812!16s%2Fg%2F11c5j9lydg?entry=ttu" class="footer-link"><h3>Endereço: Rua Ipanema 1586</h3></a>
        </li>
        <li>
            <a href="https://www.facebook.com/BarberManShops" class="footer-link">facebook-BarberManShop@gmail.com</a>
        </li>
        <li>
            <a>whatsapp:(45) 984326950</a>
        </li>
        <li>
            <a>Abertos domingo a domingo independente de ser feriado</a>
        </li>
    </ul>
  </div>
  <div id="footer-copyrigth">
    &#169
    2023 Todos os direitos reservados para Barber Man Shop
  </div>
</footer>
    <script src="js/scripty.js"></script>
</body>

</html>