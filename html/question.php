<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />
		<link href="css/style.css" rel="stylesheet" />
		<title>Blog informatique</title>
	</head>
	<body>
		<div id="page">
			<header> <h1>Question</h1> </header>

			<?php include("menu.php");?>

			<section id="section">
				<!-- recherche par ... -->
				<a href="question.php?date=1">Par date</a>
				<?php echo '&nbsp&nbsp'; ?>
				<a href="question.php?auteur=1">Par auteur</a>
				</br>
				<form method="post" action="question.php">
					<label for="mot">Mot-clé</label>
            		<input type="text" name="mot" id="mot" required="required"/>
            	</form>
				<?php
				// on récupère toutes les questions et on les affiches
				$bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
				if(isset($_GET['date']))
				{
					$reponse = $bdd->query('SELECT * , DATE_CREATION FROM COMMENTAIREMOT ORDER BY DATE_CREATION DESC');
				}
				else
				{
					if(isset($_GET['auteur']))
					{
						$reponse = $bdd->query('SELECT * , PSEUDO FROM COMMENTAIREMOT ORDER BY PSEUDO');
					}
					else
					{
						if(isset($_POST['mot']))
						{
							$reponse = $bdd->prepare('SELECT * FROM CARACTERISE2 WHERE MOT=?');
        					$reponse->execute(array($_POST['mot']));
        					while($donnees = $reponse->fetch())
							{
								$reponse2 = $bdd->prepare('SELECT * FROM COMMENTAIREMOT WHERE ID_COMMOT=?');
        						$reponse2->execute(array($donnees['ID_COMMOT']));
        						if($donnees2 = $reponse2->fetch())
        						{
        							?>
									<div>
										<h3>
											<?php 
											echo htmlspecialchars($donnees2['COMMENTAIRE']).'&nbsp;&nbsp;&nbsp;&nbsp;'.$donnees2['DATE_CREATION'];
											?> 
										</h3>
										<em>
											<a href="reponsequestion.php?comm=<?php echo $donnees['ID_COMMOT']; ?>">Continuer</a>
										</em>
									</div>
									</br>
									<?php
        						}
        						$reponse2->closeCursor();
							}
							$reponse->closeCursor();
						}
						else
						{
							$reponse = $bdd->query('SELECT * , DATE_CREATION FROM COMMENTAIREMOT ORDER BY DATE_CREATION DESC');
						}
					}
				}
				while($donnees = $reponse->fetch())
					{
				?>
				<div>
					<h3>
						<?php 
						echo htmlspecialchars($donnees['COMMENTAIRE']).'&nbsp;&nbsp;&nbsp;&nbsp;'.$donnees['DATE_CREATION'];
						?> 
					</h3>
					<em>
						<a href="reponsequestion.php?comm=<?php echo $donnees['ID_COMMOT']; ?>">Continuer</a>
					</em>
				</div>
				</br>
				<?php
					}
					$reponse->closeCursor();
				?>
			</section>
			<footer>
				<h3>Contact</h3>
				<a href=mailto:tristan.cossin@etud.univ-montp2.fr><img src="css/email.png" alt="Email" title="Me contacter par mail" /></a>
			</footer>
			<p id="copyright"> © Copyright 2015 - Cossin Tristan </p>
		</div>
	</body>
</html>
