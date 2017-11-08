<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
// si c'est pour modifier un article
if(isset($_GET['modif']))
{
$req = $bdd->prepare('UPDATE BILLET SET TITRE = :TITRE, CONTENU = :CONTENU WHERE ID_BILLET = :ID_BILLET');
$req->execute(array('TITRE' => $_POST['titre'], 'CONTENU' => $_POST['contenu'], 'ID_BILLET' => $_GET['billet']));
header('location:../billet.php?billet='.$_GET['billet']);
}
//si c'est pour crée un article
else
{
$req = $bdd->prepare('INSERT INTO BILLET (TITRE, CONTENU, PSEUDO, DATE_CREATION) VALUES(:TITRE, :CONTENU, :PSEUDO, :DATE_CREATION)');
$req->execute(array('TITRE' => $_POST['titre'], 'CONTENU' => $_POST['contenu'], 'PSEUDO' => $_SESSION['pseudo'], 'DATE_CREATION' => date("Y-m-d H:i:s")));
header('location:../article.php');
}
exit;
?>