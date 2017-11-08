<!DOCTYPE html>
<?php session_start(); ?>
<html>
  <head>
    <meta charset="utf-8"/>
    <link href="css/style.css" rel="stylesheet"/>
    <title>Blog informatique</title>
  </head>
  <body>
    <div id="page">
      <header id="titre">
        <h1>Membre</h1>
      </header>
      <?php include("menu.php"); ?>
      <section id="section">
        <?php
        // verifie que la personne est bien connecter et qu'elle n'essaye pas d'acceder illegalement à cette page
        if(isset($_SESSION['role']))
        {
          // vérifie que la personne est bien un administrateur
          if($_SESSION['role'] == 'A')
          {
            // affiche tous les membres et administrateur du site
            $bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
            $reponse = $bdd->query('SELECT * FROM AUTEUR ORDER BY PSEUDO');
            while($donnees = $reponse->fetch())
          {
          echo $donnees['PSEUDO'].'&nbsp&nbsp&nbsp&nbsp';
          if($donnees['ROLE'] == 'A')
            echo 'est administrateur &nbsp&nbsp&nbsp&nbsp';
          else
            echo 'est membre &nbsp&nbsp&nbsp&nbsp';
            ?>
            <em>
              <a href="fonction/changerrole.php?pseudo=<?php echo $donnees['PSEUDO']; ?>&role=<?php echo $donnees['ROLE']; ?>">Changer role</a>
              <?php echo '&nbsp&nbsp&nbsp&nbsp'; ?>
              <a href="fonction/suppression.php?pseudo=<?php echo $donnees['PSEUDO']; ?>">Supprimer</a>
            </em>
          </br>
          <?php
          }   
          $reponse->closeCursor();
          }
        }
        ?>
          </br>
      </section>
      <footer>
        <h3>Contact</h3>
        <a href=mailto:tristan.cossin@etud.univ-montp2.fr><img src="css/email.png" alt="Email" title="Me contacter par mail"/></a>
      </footer>
      <p id="copyright"> © Copyright 2016- Cossin Tristan </p>
    </div>
  </body>
</html>