<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
// on desactive les contrainte lié a la table
$bdd->query('SET foreign_key_checks = 0');
$req = $bdd->prepare('DELETE FROM AUTEUR WHERE PSEUDO = :PSEUDO');
$req->execute(array('PSEUDO' => $_GET['pseudo']));
// on réactive les contrainte lié a la table
$bdd->query('SET foreign_key_checks = 1');
header('location:../listemembre.php');
exit;
?>