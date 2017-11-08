<!DOCTYPE html>
<?php session_start(); ?>
<html>
  <head>
    <meta charset="utf-8" />
    <link href="css/style.css" rel="stylesheet" />
    <title>Blog informatique</title>
  </head>
  <body>
    <header> <h1>Ajout d'un mot-clé</h1> </header>

    <div id="page">

      <?php include("menu.php"); ?>

      <section>
        <?php
        // si on associe un mot-clé à un article
        if(isset($_GET['billet']))
        {
          ?>
          <form method="post" action="fonction/ajoutcaracterise.php?billet=<?php echo $_GET['billet']; ?>">
          <?php
        }
        // si on associe un mot-clé à une question
        else
        {
          ?>
          <form method="post" action="fonction/ajoutcaracterise.php?comm=<?php echo $_GET['comm']; ?>">
          <?php
        }
          ?>
          <fieldset id="field1">
            <legend> <h2> Mot-clé </h2> </legend>

            <input type="text" name="mot" required="required"/>

            </br>
            </br>

            <input type="submit" value="Envoyer" >
          </fieldset>
        </form>
        <?php
        // on affiche tous les mot-clé existant a l'utilisateur
        $bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
        $reponse = $bdd->query('SELECT * FROM MOT_CLE');
        echo 'Mot clé existant:'.'&nbsp&nbsp';
        while($donnees = $reponse->fetch())
          echo $donnees['MOT'].',&nbsp&nbsp';
        ?>
      </section>
            <p id="copyright">© Copyright 2016 - Cossin Tristan </p>
    </div>
  </body>
</html>
