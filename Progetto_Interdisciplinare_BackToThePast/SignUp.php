<!DOCTYPE html>
<?php
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
                <p>Hai già un account? <a href="Login.php">Accedi</a></p>
                <div class="casa">
                    <a href="HomePage.php"><img src="images/casa.gif"></a>
                </div>
            </div>
        </div>
    </body>
    <?php
} else {
    if (!isset($_POST["utente"]) || trim($_POST["utente"]) == "") {
        echo "<p>Devi inserire un user!</p>";
    } else if (!isset($_POST["password"]) || trim($_POST["password"]) == "") {
        echo "<p>Devi inserire una password!</p>";
    } else if (!isset($_POST["nome"]) || trim($_POST["nome"]) == "") {
        echo "<p>Devi inserire un nome!</p>";
    } else if (!isset($_POST["cognome"]) || trim($_POST["cognome"]) == "") {
        echo "<p>Devi inserire un cognome!</p>";
    } else {
        $inputUser = $_POST["utente"];
        $inputPass = $_POST["password"];
        $inputNome = $_POST["nome"];
        $inputCognome = $_POST["cognome"];

        $pwd = MD5($inputPass);

        $sql = "SELECT Nome, Cognome, Username, Password FROM Utente WHERE Nome = '$inputNome' AND Cognome = '$inputCognome' AND Username = '$inputUser' AND Password = '$pwd'";
        $result = mysqli_query($conn, $sql) or die("ERROR: " . mysqli_error($conn) . " (query was $sql)");

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>L'utente associato a queste credenziali esiste già</h2>";
        } else {
            $sql = "INSERT INTO `utente` (`Nome`, `Cognome`, `Username`, `Password`) VALUES ('$inputNome', '$inputCognome', '$inputUser', '$pwd')";
            $result = mysqli_query($conn, $sql) or die("ERROR: " . mysqli_error($conn) . " (query was $sql)");
            echo "<h2>Ti sei registrato come: " . $inputUser . "</h2>";
        }
        mysqli_close($conn);
    }
}
?>

</html>