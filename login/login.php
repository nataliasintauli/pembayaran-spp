<?php 
session_start(); 
?>

<?php if (!@$_SESSION['level']) : ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LOGIN | SISTEM PEMBAYARAN SPP</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <br><br><br><br>
    <center>
        <h1 class="title">SISTEM PEMBAYARAN SPP<h1>
    </center>
    <form class="login" method="POST" action="proseslogin.php">
        <input type="text" placeholder="username" autocomplete="off" name="username">
        <input type="password" placeholder="password" name="password">
        <button>Login</button>
    </form>
    </div>


</html>

<?php else : ?>
<script>
alert('Anda sudah login, silahkan pergi ke Dashboard');
location.href = '../home.php';
</script>
<?php endif ?>