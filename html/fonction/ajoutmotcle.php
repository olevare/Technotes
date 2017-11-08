<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
$req = $bdd->prepare('INSERT INTO MOT_CLE (MOT) VALUES(:MOT)');
$req->execute(array('MOT' => $_POST['mot']));
header('location:../ajoutmot.php');
exit;
?>