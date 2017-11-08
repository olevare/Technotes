<!DOCTYPE html>
<?php session_start(); ?>
<html>
  <head>
    <meta charset="utf-8" />
    <link href="css/style.css" rel="stylesheet" />
    <title>Blog informatique</title>
  </head>
  <body>
    <header> <h1>Ajout d'un commentaire</h1> </header>

    <div id="page">

      <?php include("menu.php"); ?>

      <section>
        <?php
        // si c'est pour ajouter un commentaire a une question
        if(isset($_GET['comm']))
        {
          ?>
          <form method="post" action="fonction/ajoutcommentaire.php?comm=<?php echo $_GET['comm']; ?>">
          <?php
        }
        else
        {
          // si c'est pour repondre a un commentaire d'un commentaire d'un article
          if(isset($_GET['commentaire']))
          {
            ?>
            <form method="post" action="fonction/ajoutcommentaire.php?commentaire=<?php echo $_GET['commentaire']; ?>&billet=<?php echo $_GET['billet']; ?>&rep=1">
            <?php
          }
          // si c'est pour ajouter un commentaire a un article
          else
          {
            ?>
            <form method="post" action="fonction/ajoutcommentaire.php?commentaire=<?php echo $_GET['commentaire']; ?>&billet=<?php echo $_GET['billet']; ?>">
            <?php
          }
        }
        ?>
        <fieldset id="field1">
            <legend> <h2> Commentaire </h2> </legend>

            <textarea name="comment" rows="15" cols="50" required="required"></textarea>

            </br>
            </br>

            <input type="submit" value="Envoyer" >
          </fieldset>
        </form>
      </section>
            <p id="copyright">© Copyright 2016 - Cossin Tristan </p>
    </div>
  </body>
</html>
