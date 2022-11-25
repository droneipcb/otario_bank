<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['login_user']))
{
header("Location: index.php");
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="styles2.css">
<script src="jquery-3.3.1.min.js"></script>
<title>Welcome to Otário Bank</title>
</head>

<script>
$(document).ready(function() {
    $("#menu_div").animate({width: "220px"});
});
</script>

<body>

<div id='menu_div'>
    <?php echo $_SESSION['login_user']; ?>
    <a href="logout.php"><img id="logout" src="logout.jpg"></img></a>
    <br><br><br>
    <p class='menuitem'>Enviar mensagem ao gestor</p>
    <p class='menuitem'>Ver mensagens de clientes</p>
    <p class='menuitem'>Gerir utilizadores</p>
</div>

<div id='enviar_mensagem_div'>
    <p> Envie uma mensagem ao seu gestor de conta </p>
    <p> Escreva a sua mensagem </p>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <textarea id='mensagem' > </textarea>
        <p> Pode também fazer o upload de um ficheiro </p>
        <!--<a href="logout.php"><img id="upload-img" src="upload-files.svg"></img></a> -->

        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Enviar mensagem" name="submit">
    </form>


</div>


</body>
</html>
