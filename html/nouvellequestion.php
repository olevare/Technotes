<!DOCTYPE html>
<?php session_start(); ?>
<html>
  <head>
    <meta charset="utf-8" />
    <link href="css/style.css" rel="stylesheet" />
    <title>Blog informatique</title>
  </head>
  <body>
    <header> <h1>Nouvelle question</h1> </header>

    <div id="page">

      <?php include("menu.php"); ?>

      <section>

        <!-- si on crée un nouvelle question -->
        <form method="post" action="fonction/ajoutquestion.php">
        <fieldset id="field1">
            <legend> <h2> Question </h2> </legend>

            <label for="contenu">Pose ta question</label>
            <textarea name="contenu" rows="30" cols="60" required="required"></textarea>

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
