<!DOCTYPE html>
<html>
<?php
require('config.php');
if (!isset($_POST["Invio"])) {
    ?>

    <head>
        <link rel="stylesheet" href="stylesAccess.css">
        <title>Accesso</title>
        <link rel="icon" href="images/favicon.png" type="image/png">
    </head>

    <body bgcolor="orange">
        <div class="pannelloAccount">
            <div class="account">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <h2>Accesso utente</h2>
                    Username: <input type="text" name="utente"><br>
                    Password: <input type="password" name="password">
                    <button type="submit" name="Invio" accesskey="enter">
                        <img src="images/freccia.png">
                    </button>
                </form>
                <p>Vuoi creare un account? <a href="SignUp.php">Registrati</a></p>
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
    } else {
        $inputUser = $_POST["utente"];
        $inputPass = $_POST["password"];

        $pwd = MD5($inputPass);

        $sql = "SELECT Username, Password FROM Utente WHERE Username = '$inputUser' AND Password = '$pwd'";
        $result = mysqli_query($conn, $sql) or die("ERROR: " . mysqli_error($conn) . " (query was $sql)");

        if (mysqli_num_rows($result) > 0) {
            session_start();
            $_SESSION["username"] = $inputUser;
            header("Location: HomePage.php");
        } else {
            echo "<h2>User non esistente o Credenziali errate</h2>";
        }
        mysqli_close($conn);
    }
}
?>

</html>