<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
// si le membre est administrateur on le passe membre
if($_GET['role'] == 'A')
{
$req = $bdd->prepare('UPDATE AUTEUR SET ROLE = \'M\' WHERE PSEUDO = :PSEUDO');
$req->execute(array('PSEUDO' => $_GET['pseudo']));
}
// sinon on le passe administrateur
else
{
$req = $bdd->prepare('UPDATE AUTEUR SET ROLE = \'A\' WHERE PSEUDO = :PSEUDO');
$req->execute(array('PSEUDO' => $_GET['pseudo']));
}
header('location:../listemembre.php');
exit;
?>