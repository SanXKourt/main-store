<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main store</title>
</head>
<body>
    <center>
        <?php echo htmlspecialchars($_SESSION['user_firstname'] . " " . $_SESSION['user_lastname']); ?>
        <h3>Welcome to Main store</h3> | <a href="logout.php">Logout</a>
    </center>
</body>
</html>