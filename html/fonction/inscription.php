<?php
session_start();
// si le MDP est bien rentrer identiquement
if($_POST['MDP'] == $_POST['confirmMDP'])
{
	$bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
	$reponse = $bdd->prepare('SELECT * FROM AUTEUR WHERE IDENTIFIANT=? AND MDP=?');
	$reponse->execute(array($_POST['Identifiant'], $_POST['MDP']));
  // on vérifie que l'utilisateur n'existe pas
	if(($resultat = $reponse->fetch()) == false)
  	{
      // on le crée dans la BDD
      $_SESSION['pseudo']=$resultat['PSEUDO'];
  		$reponse->closeCursor();
  		$req = $bdd->prepare('INSERT INTO AUTEUR (MDP, IDENTIFIANT, ROLE, PSEUDO) VALUES(:MDP, :IDENTIFIANT, :ROLE, :PSEUDO)');
  		$req->execute(array('MDP' => $_POST['MDP'], 'IDENTIFIANT' => $_POST['Identifiant'], 'ROLE' => 'M', 'PSEUDO' => $_POST['Pseudo']));
  		header('location:../index.php');
  	}
  	else
  	{
  		$reponse->closeCursor();
  		header('location:../connexion.php');
  	}
}
else
{
  header('location:../connexion.php');
}
exit;
?>