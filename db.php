<?php
$connexion = mysqli_connect("localhost", "root", "");
$query = "create database if not exists dev_db";
mysqli_query($connexion, $query);

$connexion = mysqli_connect("localhost", "root", "", "dev_db");

$creatTable = "CREATE TABLE IF NOT EXISTS users(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    adresse VARCHAR(30) NOT NULL,
    mail VARCHAR(30) NOT NULL,
    photo VARCHAR(30) NOT NULL
)";
mysqli_query($connexion, $creatTable);