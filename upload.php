<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Se a sessão não está ativa...
if(!isset($_SESSION['login_user']))
{
  header("Location: index.php");
}

$username = $_SESSION['login_user'];

echo $_POST['mensagem'];
echo "<br>".$username;

$target_file='not_found.txt';

$error = $_FILES["fileToUpload"]["error"];
if (!$error) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $tempFile = $_FILES["fileToUpload"]["tmp_name"];
  $uploadOk = 1;

  echo "name: ".$target_file;
  echo "<br>";
  echo "tmp_name: ".$_FILES["fileToUpload"]["tmp_name"];
  echo "<br>";
  echo "size: ".$_FILES["fileToUpload"]["size"];
  echo "<br>";
  echo "type: ".$_FILES["fileToUpload"]["type"];
  echo "<br>";
  echo "error: ".$error;
  echo "<br>";



  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;  
  }


  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($tempFile, $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}


if (!isset($_POST['mensagem'])) {
  die("Mensagem vazia");
}

$mensagem = addslashes( $_POST['mensagem'] );
echo "<br>".$mensagem;


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "aluno123";
$db = "otariobank";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db)
	or die("Ligacao a base de dados falhou: %s\n". $conn -> error);

$sqlQuery="INSERT INTO mensagens (username,mensagem,uploaded_file) VALUES ('$username','$mensagem','$target_file');";

echo "<br>".$sqlQuery;
	
$result = $conn->query($sqlQuery);

$conn -> close();



?>
