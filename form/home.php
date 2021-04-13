// this is a pj=hp file
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('location:index.html');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body bgcolor="yellow">
    <h2>WELCOME <?php echo $_SESSION['username']; ?></h2>
    <a href="logout.php">LOGOUT</a>
</body>
</html>
