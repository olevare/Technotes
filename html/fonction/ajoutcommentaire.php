<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
// si c'est une réponse lié a une question
if(isset($_GET['comm']))
{
$req = $bdd->prepare('INSERT INTO REPONSE_MOT (ID_COMMOT, PSEUDO, COMMENTAIRE, DATE_CREATION) VALUES(:ID_COMMOT, :PSEUDO, :COMMENTAIRE, :DATE_CREATION)');
$req->execute(array('ID_COMMOT' => $_GET['comm'], 'PSEUDO' => $_SESSION['pseudo'], 'COMMENTAIRE' => $_POST['comment'], 'DATE_CREATION' => date("Y-m-d H:i:s")));
header('location:../reponsequestion.php?comm='.$_GET['comm']);
}
else
{
	// si c'est un commentaire d'un article
	if(isset($_GET['rep']))
	{
		$req = $bdd->prepare('INSERT INTO REPONSE_COM (ID_COM, PSEUDO, COMMENTAIRE, DATE_CREATION) VALUES(:ID_COM, :PSEUDO, :COMMENTAIRE, :DATE_CREATION)');
		$req->execute(array('ID_COM' => $_GET['commentaire'], 'PSEUDO' => $_SESSION['pseudo'], 'COMMENTAIRE' => $_POST['comment'], 'DATE_CREATION' => date("Y-m-d H:i:s")));
	}
	// si c'est une reponse a un commentaire d'un article
	else
	{
	$req = $bdd->prepare('INSERT INTO COMMENTAIRE (ID_BILLET, PSEUDO, COMMENTAIRE, DATE_CREATION) VALUES(:ID_COM, :PSEUDO, :COMMENTAIRE, :DATE_CREATION)');
	$req->execute(array('ID_COM' => $_GET['billet'], 'PSEUDO' => $_SESSION['pseudo'], 'COMMENTAIRE' => $_POST['comment'], 'DATE_CREATION' => date("Y-m-d H:i:s")));
	}
header('location:../billet.php?billet='.$_GET['billet']);
}
exit;
?>