<?php
// Get database connection
include('../settings/database.php');
 
// Get payload from frontend
$email = $_POST['email'];
$passwd = MD5($_POST['pswd']);
 
$sql_check_email = "SELECT * FROM users WHERE email = '$email' and password = '$passwd' ";
$res = pg_query($local_conn, $sql_check_email);
$total = pg_num_rows($res);
echo "i'm here";
if ($total > 0) {
    header('refresh:0;url=home.php');
} else {
    echo "<script>alert('User email does not exist. Try again !!!')</script>";
    header('refresh:0;url=signin.html');
}