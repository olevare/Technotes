<nav>
	<ul>
	    <a href="index.php"><h2>Menu</h2></a>
	   	<?php
	   	// si il est connecter
	    if(isset($_SESSION['pseudo']))
	    {
	    	// si c'est un administrateur
	    	if($_SESSION['role'] == 'A')
	    	{
	    		echo '<li><a href="fonction/deconnexion.php">Deconnection</a></li>';
	    		echo '<li><a href="article.php">Articles</a></li>';
	    		echo '<li><a href="nouvellearticle.php">Nouvelle articles</a></li>';
	    		echo '<li><a href="question.php">Question</a></li>';
	    		echo '<li><a href="nouvellequestion.php">Nouvelle question</a></li>';
	    		echo '<li><a href="ajoutmot.php">Ajout mot clé</a></li>';
	      		echo '<li><a href="listemembre.php">Membre</a></li>';
	      	}
	      	// si c'est un membre
	      	else
	    	{
	    		echo '<li><a href="fonction/deconnexion.php">Deconnection</a></li>';
	    		echo '<li><a href="article.php">Articles</a></li>';
	    		echo '<li><a href="nouvellearticle.php">Nouvelle articles</a></li>';
	    		echo '<li><a href="question.php">Question</a></li>';
	    		echo '<li><a href="nouvellequestion.php">Nouvelle question</a></li>';
	    		echo '<li><a href="ajoutmot.php">Ajout mot clé</a></li>';
	      	}
	    }
	    // s'il n'est pas connecter
	   	else
	    {
	    	echo '<li><a href="connexion.php">Connexion/</br>Inscription</a></li>';
	    	echo '<li><a href="article.php">Articles</a></li>';
	    	echo '<li><a href="question.php">Question</a></li>';
	    }
	    ?>
	</ul>
</nav>