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
        <header>
            <h1>Question</h1> </header>

        <?php include( "menu.php");?>

        <section id="section">
            <?php 
            // on affiche la question
            $bdd = new PDO( 'mysql:host=localhost; dbname=Technotes; charset=utf8', 'root', '15361536'); 
            $reponse = $bdd->prepare('SELECT * FROM COMMENTAIREMOT WHERE ID_COMMOT=?'); $reponse->execute(array($_GET['comm'])); 
            $donnees = $reponse->fetch(); ?>
            <h3>
            <?php 
            echo htmlspecialchars($donnees['COMMENTAIRE']);
            ?>
          </h3>
            <br/>
            <br/>
            <?php echo 'Question de: '.$donnees[ 'PSEUDO']. '&nbsp;&nbsp;&nbsp;&nbsp;'.$donnees[ 'DATE_CREATION']; 
            $reponse->closeCursor();
            // on affiche tous les mot-clé associeé à cette question
            $reponse = $bdd->prepare('SELECT * FROM CARACTERISE2 WHERE ID_COMMOT=?'); 
            $reponse->execute(array($_GET['comm'])); ?>
            </br>
            <?php echo 'Mot clé associé:'. '&nbsp&nbsp'; 
            while($donnees = $reponse->fetch()) 
                echo $donnees['MOT'].'&nbsp,&nbsp;'; 
            $reponse->closeCursor(); ?>
            <br/>
            <?php 
            if(isset($_SESSION['pseudo']))
            {
                ?>
                </br>
                <em>
                    <a href="ajoutcom.php?comm=<?php echo $_GET['comm']; ?>">Commenter</a>
                </br>
                    <a href="associemot.php?comm=<?php echo $_GET['comm']; ?>">Associer un mot-clé</a>
                </em>
                <?php
            }
                ?>
            <br/>
            <br/>
            <br/>

            <div id="commentaire">
                <?php 
                // on récupère toute les réponses de cette question et on les affiches
                $reponse = $bdd->prepare('SELECT * FROM REPONSE_MOT WHERE ID_COMMOT=?'); 
                $reponse->execute(array($_GET['comm'])); 
                while($donnees = $reponse->fetch()) 
                { 
                    echo htmlspecialchars($donnees['PSEUDO']).'&nbsp&nbsp&nbsp&nbsp'.$donnees['DATE_CREATION']; ?> </br>
                    <?php echo nl2br(htmlspecialchars($donnees[ 'COMMENTAIRE'])); ?> 
                    </br>
                    </br>
                    <?php 
                } 
                $reponse->closeCursor(); ?>
                <br/>
            </div>

        </section>
        <footer>
            <h3>Contact</h3>
            <a href=mailto:tristan.cossin@etud.univ-montp2.fr><img src="css/email.png" alt="Email" title="Me contacter par mail" />
            </a>
        </footer>
        <p id="copyright"> © Copyright 2016- Cossin Tristan </p>
    </div>
</body>

</html>