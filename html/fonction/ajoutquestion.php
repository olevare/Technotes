<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
// on ajoute une question
$req = $bdd->prepare('INSERT INTO COMMENTAIREMOT (PSEUDO, COMMENTAIRE, DATE_CREATION) VALUES(:PSEUDO, :COMMENTAIRE, :DATE_CREATION)');
$req->execute(array('PSEUDO' => $_SESSION['pseudo'], 'COMMENTAIRE' => $_POST['contenu'], 'DATE_CREATION' => date("Y-m-d H:i:s")));
header('location:../question.php');
exit;
?>