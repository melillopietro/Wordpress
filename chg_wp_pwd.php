<?php
include("wp-config.php");
include ("wp-includes/pluggable.php");

$sAction = $_POST["x_action"];

if ($sAction == "") {

?>
<html>

<form action="" method="post">
<input type="hidden" name="x_action" value="C">
<table border="0">
<tr><td colspan="2" align="center">
Reset Password Admin
</td></tr>
<tr>
<td>Username</td>
<td><input type="username" name="x_username" size="20"></td>
</tr>
<tr>
<td>Nuova Password</td>
<td><input type="password" name="x_password" size="20"></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="Imposta">
</td>
</tr>
</table>
</form>
<br>
</html>
<?php
} else {
    $x_username = @$_POST["x_username"];
    $x_password = @$_POST["x_password"];
        $admin_pwd = wp_hash_password($x_password);
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD); 
    if ($conn == false) die("Errore nella connessione. Verificare i parametri nel file di configurazione");
    mysqli_select_db($conn, DB_NAME) or die("Errore nella selezione del database. Verificare i parametri nel file di configurazione"
);

    $query = "UPDATE " . $table_prefix . "users SET user_pass='" . $admin_pwd . "' WHERE user_login=\"" . $x_username ."\";";
    $risultato = mysqli_query($conn, $query);

    if ($risultato)
    {
?>
<table border="0">
<tr><td colspan="2" align="center">
Reset Password Admin
</td></tr>
<tr>
<td>Username</td>
<td><?php echo $x_username ?></td>
</tr>
<tr>
<td>Password scelta</td>
<td><?php echo $x_password ?></td>
</tr>
<tr>
<td>Password codificata</td>
<td><?php echo $admin_pwd ?></td>
</tr>
<tr>
<td colspan="2" align="center">
Password aggiornata correttamente
</td>
</tr>
</table>
<?php
    }
	unlink(__FILE__);
}
?>

