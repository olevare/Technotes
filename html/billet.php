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
      <header> <h1>Article</h1> </header>

      <?php include("menu.php");?>

      <section id="section">
        <?php
        // on récupère l'article et on l'affiche
        $bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
        $reponse = $bdd->prepare('SELECT * FROM BILLET WHERE ID_BILLET=?');
        $reponse->execute(array($_GET['billet']));
        $donnees = $reponse->fetch();
        ?>
          <h3>
            <?php 
            echo htmlspecialchars($donnees['TITRE']);
            ?>
          </h3>
          <?php
          echo nl2br(htmlspecialchars($donnees['CONTENU']));
          ?> <br/> <br/> <?php
          echo 'Article de: '.$donnees['PSEUDO'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$donnees['DATE_CREATION'];
          $a=$donnees['PSEUDO'];
          $reponse->closeCursor();
          // on récupère les mot-clé associé à cette article et on les affiches
          $reponse = $bdd->prepare('SELECT * FROM CARACTERISE WHERE ID_BILLET=?');
          $reponse->execute(array($_GET['billet']));
          ?>
          </br>
          <?php echo 'Mot clé associé:'.'&nbsp&nbsp';
          while($donnees = $reponse->fetch())
            echo $donnees['MOT'].'&nbsp,&nbsp;';
          ?>

          <br/>
          <?php
          // si la personne est connecté
          if(isset($_SESSION['pseudo']))
          {
            ?> </br>
            <em>
              <a href="ajoutcom.php?billet=<?php echo $_GET['billet']; ?>">Commenter</a>
            </br>
              <a href="associemot.php?billet=<?php echo $_GET['billet']; ?>">Associer un mot-clé</a>
            </em>
            <?php
          }
          // si la personne est à l'origine de l'article alors elle peut le modifier
          if($_SESSION['pseudo'] == $a)
          {
            ?> </br>
            <em>
              <a href="nouvellearticle.php?billet=<?php echo $_GET['billet']; ?>">Modifier</a>
            </em>
            <?php
          }
          ?>
          <br/>
          <br/>
          <br/>

        <div id="commentaire">
            <?php
            $reponse->closeCursor(); 
            // on affiche tous les commentaires de l'article
            $reponse = $bdd->prepare('SELECT * FROM COMMENTAIRE WHERE ID_BILLET=?');
            $reponse->execute(array($_GET['billet']));
            while($donnees = $reponse->fetch())
            {
              echo htmlspecialchars($donnees['PSEUDO']).'&nbsp&nbsp&nbsp&nbsp'.$donnees['DATE_CREATION'];
              ?> </br> <?php
              echo nl2br(htmlspecialchars($donnees['COMMENTAIRE']));
              if(isset($_SESSION['pseudo']))
              {
                ?> </br>
                <em>
                  <a href="ajoutcom.php?commentaire=<?php echo $donnees['ID_COM']; ?>&billet=<?php echo $_GET['billet']; ?>">Commenter</a>
                </em>
                <?php
              }
              ?> </br> </br> <?php
              // pour chaque commentaire on regarde si il a lui meme des commentaires et si oui on les affiches
              $reponse2 = $bdd->prepare('SELECT * FROM REPONSE_COM WHERE ID_COM=?');
              $reponse2->execute(array($donnees['ID_COM']));
              if($donnees2 = $reponse2->fetch())
              {
                ?> <div id="repcommentaire"> <?php
                do{
                  echo htmlspecialchars($donnees2['PSEUDO']).'&nbsp;&nbsp;&nbsp;&nbsp;'.$donnees['DATE_CREATION'];
                  ?> </br> <?php
                  echo nl2br(htmlspecialchars($donnees2['COMMENTAIRE']));
                  ?> </br> </br><?php
                }while($donnees2 = $reponse2->fetch())
                ?> </div> <?php
                ?> </br> <?php
                $reponse2->closeCursor();
              }

            }
            $reponse->closeCursor();
            ?>
            <br/>
        </div>

      </section>
      <footer>
        <h3>Contact</h3>
        <a href=mailto:tristan.cossin@etud.univ-montp2.fr><img src="css/email.png" alt="Email" title="Me contacter par mail"/></a>
      </footer>
      <p id="copyright"> © Copyright 2016- Cossin Tristan </p>
    </div>
  </body>
</html>
