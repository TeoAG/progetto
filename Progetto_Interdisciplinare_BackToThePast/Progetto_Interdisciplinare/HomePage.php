<!DOCTYPE html>
<html>
<?php
require "config.php";
session_start();
$User = 0;
if (!isset($_SESSION["username"])) {
    $User = 1;
}
?>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Back To The Past</title>
    <link rel="icon" href="images/favicon.png" type="image/png">
</head>

<body>
    <div class="struttura">
        <section id="home">
            <nav class="navbar">
                <ul class="navbar-list">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">Chi siamo</a></li>
                    <li><a href="#services">Servizi</a></li>
                    <li><a href="#contact">Contatti</a></li>
                    <?php
                    if (isset($_SESSION["username"])) {
                        $User = $_SESSION["username"];
                        echo "<li><a href='Logout.php'>Ciao ".$User." Log Out?</a></li>";
                    } else {
                        echo "<li><a href='Login.php'>Accedi</a></li>";
                    }
                    ?>

                </ul>
            </nav>
            <div class="titolo">
                <img src="images/Logo.png" height="250px" width="auto">
            </div>
            <div class="contenitore">
                <div class="colonna">
                    <div>
                        <img src="images/colosseo.png" height="auto" width="100%">
                    </div>
                    <div class="descrizione">
                        <p>Il Colosseo<br>il più grande anfiteatro romano...</p>
                    </div>
                </div>
                <div class="colonna">
                    <div>
                        <img src="images/duomoMilano.png" height="auto" width="100%">
                    </div>
                    <div class="descrizione">
                        <p>Il Duomo di Milano<br>Una delle chiese più imponenti al mondo...</p>
                    </div>
                </div>
                <div class="colonna">
                    <div>
                        <img src="images/cattedraleFirenze.png" height="auto" width="100%">
                    </div>
                    <div class="descrizione">
                        <p>La Cattedrale di Firenze<br>Chiesa dallo stile gotico elegante...</p>
                    </div>
                </div>
            </div>
    </div>
    <div class="descrizione colonna titolo hover-box">
        <p>
            L'obiettivo di molti è spedire le persone nel futuro, ma con noi potrete fare
            un salto nel passato e avrete la possibilità di visitare i migliori
            monumenti italiani nei loro tempi d'oro!
        </p>
    </div>
    </section>

    <section id="about">
        <div class="titolo struttura">
            <div class="titolo2">
                <p>
                <h2>#BackToThePast</h2>
                </p>
            </div>
            <div class="about colonna descrizione">
                <p>
                    La nostra è un'attività che permette di rivivere la storia attraverso
                    la tecnologia, offrendo ai clienti un'esperienza immersiva dei
                    grandi monumenti italiani del passato.
                    <br><br>
                    I mezzi per farlo sono i visori di realtà virtuale o aumentata che
                    permettono di interagire al massimo con il passato e di avere una guida
                    virtuale che elencherà la storia e i dettagli del monumento.
                    <!-- DA FINIRE -->
                </p>
            </div>
        </div>
    </section>

    <section id="services">
        <div>

        </div>
    </section>

    <section id="contact">
        <div>

        </div>
    </section>
</body>

</html>