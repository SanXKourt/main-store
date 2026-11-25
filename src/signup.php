<?php
// Get database connection
include('../settings/database.php');

// Get payload from frontend
$first_name   = $_POST['fname'];
$last_name    = $_POST['lname'];
$ident_number = $_POST['idnumber'];
$email        = $_POST['email'];
$passwd       = md5($_POST['pswd']);

// Check if email already exists
$res = pg_query_params($local_conn, "SELECT id FROM users WHERE email = $1", [$email]);

if (pg_num_rows($res) < 1) {
    $ins = pg_query_params(
        $local_conn,
        "INSERT INTO users (firstname, lastname, ident_number, email, password)
         VALUES ($1, $2, $3, $4, $5)",
        [$first_name, $last_name, $ident_number, $email, $passwd]
    );

    if ($ins) {
        echo "<script>alert('User created successfully !!!'); window.location='signin.html';</script>";
    } else {
        echo "Error: User hasn't been created successfully !!!";
    }
} else {
    echo "<script>alert('User email already exists. Try again !!!'); window.location='signup.html';</script>";
}