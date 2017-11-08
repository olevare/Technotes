<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
// si c'est pour associé un mot-clé a un article
if(isset($_GET['billet']))
{
$req = $bdd->prepare('INSERT INTO CARACTERISE (MOT, ID_BILLET) VALUES(:MOT, :ID_BILLET)');
$req->execute(array('MOT' => $_POST['mot'], 'ID_BILLET' => $_GET['billet']));
header('location:../billet.php?billet='.$_GET['billet']);
}
// si c'est pour associé un mot-clé a une question
else
{
$req = $bdd->prepare('INSERT INTO CARACTERISE2 (MOT, ID_COMMOT) VALUES(:MOT, :ID_COMMOT)');
$req->execute(array('MOT' => $_POST['mot'], 'ID_COMMOT' => $_GET['comm']));
header('location:../reponsequestion.php?comm='.$_GET['comm']);
}
exit;
?>