<?php
    try
    {   // Connexion à la Base de données ;port=3306
        $db = new PDO('mysql:host=192.168.65.245;port=3306;dbname=userRFID','root', 'root');
    }
    catch(exception $erreur)
    {   // Retourne ce message s'il y a une erreur lors de la connexion à la BDD
        echo "Erreur de connexion a la BDD";
    }  
?>