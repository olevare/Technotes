<!DOCTYPE html>
<?php session_start(); ?>
<html>
  <head>
    <meta charset="utf-8" />
    <link href="css/style.css" rel="stylesheet" />
    <title>Blog informatique</title>
  </head>
  <body>
    <header> <h1>Nouvelle article</h1> </header>

    <div id="page">

      <?php include("menu.php"); ?>

      <section>
        <?php
        // si on cherche a modifier son article
        if(isset($_GET['billet']))
        {
        $bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
        $reponse = $bdd->prepare('SELECT * FROM BILLET WHERE ID_BILLET=?');
        $reponse->execute(array($_GET['billet']));
        $donnees = $reponse->fetch();
          ?>
        <form method="post" action="fonction/ajoutarticle.php?modif=1&billet=<?php echo $_GET['billet']; ?>">
        <fieldset id="field1">
            <legend> <h2> Article </h2> </legend>

            <label for="titre">Titre</label>
            <input type="text" name="titre" value="<?php echo $donnees['TITRE']; ?>" size="60" required="required"/>

          </br>
          </br>
          </br>
            <label for="contenu">Article</label>
            <textarea name="contenu" rows="30" cols="60" required="required">
            <?php echo $donnees['CONTENU']; ?>
            </textarea>
            </br>
            </br>

            <input type="submit" value="Envoyer" >
          </fieldset>
        </form>
        <?php
        }
        // si on crée un nouvelle article
        else
        {
          ?>
        <form method="post" action="fonction/ajoutarticle.php">
        <fieldset id="field1">
            <legend> <h2> Article </h2> </legend>

            <label for="titre">Titre</label>
            <input type="text" name="titre" size="60" required="required"/>

          </br>
          </br>
          </br>

            <label for="contenu">Article</label>
            <textarea name="contenu" rows="30" cols="60" required="required"></textarea>

            </br>
            </br>

            <input type="submit" value="Envoyer" >
          </fieldset>
        </form>
      </section>
      <?php
        }
      ?>
        <p id="copyright">© Copyright 2016 - Cossin Tristan </p>
    </div>
  </body>
</html>
