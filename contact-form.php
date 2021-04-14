<?php
if(!(isset($_POST['email-input']))){
    header("Location: /");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "luleads-db";

$email = $_POST['email-input'];
$name = $_POST['name-input'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO leads (idleads, lead_name, lead_mail, lead_source)
VALUES (0, '$name', '$email', 'Página de Captura')";

if ($conn->query($sql) === TRUE) {
    header("Location: obrigado/");
    echo "POST";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>