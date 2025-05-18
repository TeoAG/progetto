<!DOCTYPE html>
<html>
<?php
session_start();
require('config.php');
if (!isset($_POST["Invio"])) {
    ?>

    <head>
        <link rel="stylesheet" href="stylesAccess.css">
        <title>Registrazione</title>
        <link rel="icon" href="images/favicon.png" type="image/png">
    </head>

    <body bgcolor="orange">
        <div class="pannelloAccount">
            <div class="account">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <h2>Registrazione utente</h2>
                    Nome: <input type="text" name="nome"><br>
                    Cognome: <input type="text" name="cognome"><br>
                    Username: <input type="text" name="utente"><br>
                    Password: <input type="password" name="password">
                    <button type="submit" name="Invio" accesskey="enter">
                        <img src="images/freccia.png">
                    </button>
                </form>
                <?php
                if (isset($_SESSION["vuoto"])) {
                    ?>
                    <h3 style="color: red;">Riprova, Non lasciare nessun campo vuoto.</h3>
                    <?php
                    session_destroy();
                } else {
                    if (isset($_SESSION["errore"])) {
                        ?>
                        <h3 style="color: red;">Riprova, Utente già registrato.</h3>
                        <?php
                        session_destroy();
                    } else {
                        if (isset($_SESSION["corretto"])) {
                            ?>
                            <h3>Ti sei registrato</h3>
                            <?php
                            session_destroy();
                        }
                    }
                }
                ?>
                <p>Hai già un account? <a href="Login.php">Accedi</a></p>
                <div class="casa">
                    <a href="HomePage.php"><img src="images/casa.gif"></a>
                </div>
            </div>
        </div>
    </body>
    <?php
} else {
    if ((!isset($_POST["utente"]) || trim($_POST["utente"]) == "") || (!isset($_POST["password"]) || trim($_POST["password"]) == "") || (!isset($_POST["nome"]) || trim($_POST["nome"]) == "") || (!isset($_POST["cognome"]) || trim($_POST["cognome"]) == "")) {
        $_SESSION["vuoto"] = "si";
        header("Location: SignUp.php");
    } else {
        $inputUser = $_POST["utente"];
        $inputPass = $_POST["password"];
        $inputNome = $_POST["nome"];
        $inputCognome = $_POST["cognome"];

        $pwd = MD5($inputPass);

        $sql = "SELECT Nome, Cognome, Username, Password FROM Utente WHERE Nome = '$inputNome' AND Cognome = '$inputCognome' AND Username = '$inputUser' AND Password = '$pwd'";
        $result = mysqli_query($conn, $sql) or die("ERROR: " . mysqli_error($conn) . " (query was $sql)");

        if (mysqli_num_rows($result) > 0) {
            $_SESSION["errore"] = "si";
            header("Location: SignUp.php");
        } else {
            $sql = "INSERT INTO `utente` (`Nome`, `Cognome`, `Username`, `Password`) VALUES ('$inputNome', '$inputCognome', '$inputUser', '$pwd')";
            $result = mysqli_query($conn, $sql) or die("ERROR: " . mysqli_error($conn) . " (query was $sql)");
            $_SESSION["corretto"] = "si";
            header("Location: SignUp.php");
        }
        mysqli_close($conn);
        session_start();
        session_destroy();
    }
}
?>

</html>