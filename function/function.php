<?php
$connexion = mysqli_connect("localhost", "root", "");
$query = "create database if not exists dev_db";
mysqli_query($connexion, $query);

$connexion = mysqli_connect("localhost", "root", "", "dev_db");

if (!$connexion) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    adresse VARCHAR(30) NOT NULL,
    mail VARCHAR(30) NOT NULL,
    photo VARCHAR(30) NOT NULL
)";
executionSql($connexion, $sql, "");
function executionSql($connexion, $sql, $successMessage): void
{
    if (mysqli_query($connexion, $sql)) {
        echo $successMessage . "<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connexion);
    }
}
function ajoutImage()
{
    $dossier = "../assests/img/";
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $fichier_temporaire = $_FILES['photo']['tmp_name'];
        $nom_fichier = basename($_FILES['photo']['name']);
        $chemin_destination = $dossier . $nom_fichier;
        move_uploaded_file($fichier_temporaire, $chemin_destination);
        return $nom_fichier;
    }
}
function isNomValide(string $nom): bool
{
    return !empty($nom) && !preg_match("/^[a-zA-ZÀ-ÿ.-]*[a-zA-ZÀ-ÿ][\s\t]+[a-zA-ZÀ-ÿ.-]*$/", str_replace(' ', '', $nom));
}
function isMailValide(string $mail):bool
{
    return filter_var($mail, FILTER_VALIDATE_EMAIL);
}
function inputValeurForm(): array
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $mail = $_POST['mail'];
    $photo = ajoutImage();
    return [$nom, $prenom, $adresse, $mail, $photo];
}

function ajoutUtilisateur($connexion)
{
    list($nom, $prenom, $adresse, $mail, $photo) = inputValeurForm();
    if (isNomValide($nom) && isMailValide($mail)) {
        $sql = "INSERT INTO users (nom, prenom, adresse, mail, photo) VALUES ('$nom', '$prenom', '$adresse', '$mail', '$photo')";
        executionSql($connexion, $sql, "Creation ok");
    }
}

function update($connexion, $id)
{
    list($nom, $prenom, $adresse, $mail) = inputValeurForm();
    $sql = "UPDATE users SET nom ='$nom', prenom='$prenom', adresse='$adresse', mail='$mail' WHERE id='$id'";
    executionSql($connexion, $sql, "Modification ok");
}
function listUtilisateur($connexion)
{
    $sql = "SELECT * FROM users";
    $results = mysqli_query($connexion, $sql);
    if ($results && mysqli_num_rows($results) > 0) {
        return $results;
    } else {
        return null;
    }
}

function supprimerUser($connexion, $id)
{
    $sql = "DELETE FROM users WHERE id = $id";
    executionSql($connexion, $sql, "");
}

function informationPersonnelleUtilisateur($connexion, $id)
{
    $sql = "SELECT * FROM users WHERE id = $id";
    $results = mysqli_query($connexion, $sql);
    if ($results && mysqli_num_rows($results) > 0) {
        return mysqli_fetch_assoc($results);
    } else {
        return null;
    }
}
