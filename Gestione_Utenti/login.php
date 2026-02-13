<?php
session_start();
$username = 'admin';
$password = 'password';
?>

<form action="login.php" method="POST">
    <h1>Login</h1>
    <label for="username">Username: <input type="text" name="username"></label><br>
    <br><label for="password">Password: <input type="password" name="password"></label><br>
    <br><input type="submit" name="submit" value="Login">
</form>

<?php
if (isset($_POST['submit'])) {

    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        
        $_SESSION['username'] = $_POST['username'];
        echo "Login effettuato con successo!";
        setcookie("username", $_POST['username'], time() + (86400 * 30), "/");
        
    } else {
        echo "Username o password errati.";
    }
}
?>