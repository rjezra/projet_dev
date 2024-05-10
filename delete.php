
<?php
$connexion = mysqli_connect("localhost", "root", "", "dev_db");

$id = $_GET['id'];
$requet = "DELETE FROM users WHERE id = $id";
mysqli_query($connexion, $requet);
header('location:index.php?id="null"');