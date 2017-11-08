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
			<header> <h1>Articles</h1> </header>

			<?php include("menu.php");?>

			<section id="section">
				<!-- recherche par ... -->
				<a href="article.php?date=1">Par date</a>
				<?php echo '&nbsp&nbsp'; ?>
				<a href="article.php?auteur=1">Par auteur</a>
				</br>
				<form method="post" action="article.php">
					<label for="mot">Mot-clé</label>
            		<input type="text" name="mot" id="mot" required="required"/>
            	</form>
				<?php
				// récupère tous les articles et les affiches
				$bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
				if(isset($_GET['date']))
				{
					$reponse = $bdd->query('SELECT * , DATE_CREATION FROM BILLET ORDER BY DATE_CREATION DESC');
				}
				else
				{
					if(isset($_GET['auteur']))
					{
						$reponse = $bdd->query('SELECT * , PSEUDO FROM BILLET ORDER BY PSEUDO');
					}
					else
					{
						if(isset($_POST['mot']))
						{
							$reponse = $bdd->prepare('SELECT * FROM CARACTERISE WHERE MOT=?');
        					$reponse->execute(array($_POST['mot']));
        					while($donnees = $reponse->fetch())
							{
								$reponse2 = $bdd->prepare('SELECT * FROM BILLET WHERE ID_BILLET=?');
        						$reponse2->execute(array($donnees['ID_BILLET']));
        						if($donnees2 = $reponse2->fetch())
        						{
        							?>
									<div>
										<h3>
											<?php 
											echo htmlspecialchars($donnees2['TITRE']).'&nbsp;&nbsp;&nbsp;&nbsp;'.$donnees2['DATE_CREATION'];
											?> 
										</h3>
										<em>
											<a href="billet.php?billet=<?php echo $donnees2['ID_BILLET']; ?>">Continuer</a>
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
							$reponse = $bdd->query('SELECT * , DATE_CREATION FROM BILLET ORDER BY DATE_CREATION DESC');
						}
					}
				}
				while($donnees = $reponse->fetch())
					{
						?>
						<div>
							<h3>
								<?php 
								echo htmlspecialchars($donnees['TITRE']).'&nbsp;&nbsp;&nbsp;&nbsp;'.$donnees['DATE_CREATION'];
								?> 
							</h3>
							<em>
								<a href="billet.php?billet=<?php echo $donnees['ID_BILLET']; ?>">Continuer</a>
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
