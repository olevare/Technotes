<!DOCTYPE html>
<?php  session_start(); ?>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="css/style.css" rel="stylesheet" />
        <title>Blog informatique</title>
    </head>
    <body>

    <?php
    //si c'est une connextion
    if(isset($_POST['Identifiant']) && isset($_POST['MDP']))  
    {
        // on vérifie que l'utilisateur existe bien
        $bdd = new PDO('mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536');
        $reponse = $bdd->prepare('SELECT * FROM AUTEUR WHERE IDENTIFIANT=? AND MDP=?');
        $reponse->execute(array($_POST['Identifiant'], $_POST['MDP']));
        
        if(($resultat = $reponse->fetch()) != false)  
        {
            $_SESSION['pseudo']=$resultat['PSEUDO'];
            // sert a definir les droit sur le site: A = administrateur et M = membre
            if($resultat['ROLE'] == 'A')  
                $_SESSION['role'] = 'A'; 
            else  
                $_SESSION['role'] = 'M';
        }

        $reponse->closeCursor();
    }
    ?>
        <div id="page">
            <header> <h1>Blog informatique</h1> </header>
            <?php  include("menu.php"); ?>
            <section id="section">
                <h2>Présentation</h2>
                <p>
                    Bienvenue sur mon site Internet. Je suis actuellement étudiant en troisième année de licence Ã  l'université de science de Montpellier et ce site a été effectué dans le cadre de ma formation.
                </p>
                <p>
                    Ce site est un blog informatique regroupant des articles qui concernent le domaine de l'informatique et de la programmation.
                </p>
            </section>
            <footer>
                <h3>Contact</h3>
                <a href="mailto:tristan.cossin@etud.univ-montp2.fr"><img src="css/email.png" alt="Email" title="Me contacter par mail" /></a>
            </footer>
            <p id="copyright"> © Copyright 2016 - Cossin Tristan </p>
        </div>
    </body>
</html>