<!DOCTYPE html>
<?php session_start(); ?>
<html>
  <head>
    <meta charset="utf-8" />
    <link href="css/style.css" rel="stylesheet" />
    <title>Blog informatique</title>
  </head>
  <body>
    <header> <h1>Connexion / Inscription</h1> </header>

    <div id="page">

      <?php include("menu.php"); ?>

      <section>
        <form method="post" action="index.php">
          <fieldset id="field1">
            <legend> <h2>Connexion </h2> </legend>

            <label for="Identifiant">Identifiant</label>
            <input type="email" name="Identifiant" id="Identifiant" placeholder="Ex : exemple@gmail.com" required="required"/>
            </br>
            </br>

            <label for="MDP">Mot de passe</label>
            <input type="password" name="MDP" id="MDP" required="required"/>
            </br>
            </br>

            <input type="submit" value="Envoyer" >
          </fieldset>
        </form>

        <form method="post" action="fonction/inscription.php">
          <fieldset id="field2">
            <legend> <h2>Inscription</h2> </legend>

            <label for="Identifiant">Identifiant</label>
            <input type="email" name="Identifiant" id="Identifiant" placeholder="Ex : exemple@gmail.com" required="required"/>
            </br>
            </br>

            <label for="MDP">Mot de passe</label>
            <input type="password" name="MDP" id="MDP" required="required"/>
            </br>
            </br>

            <label for="confirmMDP">Confirmer mot de passe</label>
            <input type="password" name="confirmMDP" id="confirmMDP" required="required"/>
            </br>
            </br>

            <label for="Pseudo">Pseudo</label>
            <input type="text" name="Pseudo" id="Pseudo" required="required"/>
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
