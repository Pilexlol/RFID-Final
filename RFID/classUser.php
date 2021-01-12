<?php
include('ConnectBDD.php'); // On include le fichier contenant la connexion à la Base de données
class user
{
    private $_id_user;
    private $_db;
    private $_username;
    private $_mdp;
    private $_Nom;
    private $_Prenom;
    private $_Age;
    private $_Classe;
    private $_Num_carte;

    public function __construct($db, $mdp, $username, $id_user, $Nom, $Prenom, $Age, $Classe, $Num_carte)
    {
        $this->_id_user = $id_user;
        $this->_db = $db;
        $this->_mdp = $mdp;
        $this->_username = $username;
        $this->_Nom = $Nom;
        $this->_Prenom = $Prenom;
        $this->_Age = $Age;
        $this->_Classe = $Classe;
        $this->_Num_carte = $Num_carte;
    }

    public function Connexion($username, $mdp)
    {   // Permet à l'utilisateur de se connecter au site
        $con = $this->_db->prepare("SELECT * FROM user WHERE username = ? AND mdp = ?"); // Requête qui vérifie les informations de l'utilisateur lors de sa connexion
        $con->execute(array($username, $mdp));
        $userexist = $con->rowCount();

        if ($userexist == 1) {
            $userinfo = $con->fetch();
            $_SESSION['id_user'] = $userinfo['id_user'];
            $_SESSION['username'] = $userinfo['username'];
            $_SESSION['mdp'] = $userinfo['mdp'];
        } else if ($userexist == 0) {
            $erreur = "Mauvais mail ou mot de passe !";
        }
        if (isset($erreur)) {
            echo '<h1><font color="red" style="center">' . $erreur . '</font></h1>';
        }
    }

    public function coBDD()
    {
        try {   // Connexion à la Base de données ;port=3306
            $db = new PDO('mysql:host=192.168.65.245;port=3306;dbname=userRFID', 'root', 'root');
        } catch (exception $erreur) {   // Retourne ce message s'il y a une erreur lors de la connexion à la BDD
            echo "Erreur de connexion a la BDD";
        }
        return $db;
    }

    public function RecupBuffer($buf, $db, $id_user, $Nom, $Prenom, $Age, $Classe, $Num_carte, $imageUser)// Co socket affiche perso trame
    {
        $service_port = 1050;
        $address = '192.168.65.23';
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
            echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
        }
        $result = socket_connect($socket, $address, $service_port);
        if ($result === false) {
            echo "socket_connect() failed.\($result) " . socket_strerror(socket_last_error($socket)) . "\n";
        }
        $in = "";
        $out = '';
        socket_write($socket, $in, strlen($in));
        $buf = 'This is my buffer';
        if (false !== ($bytes = socket_recv($socket, $buf, 10, MSG_WAITALL))) {
            $id = $db->query('SELECT * FROM `user` WHERE `Num_carte`= "' . $buf . '"');
            while ($Tab = $id->fetch()) {
                $id_user = $Tab["id_user"];
                $Nom = $Tab["Nom"];
                $Prenom = $Tab["Prenom"];
                $Age =  $Tab["Age"];
                $Classe =  $Tab["Classe"];
                $Num_carte = $Tab["Num_carte"];
                $imageUser = $Tab["imageUser"];
                include("perso.php");
            }
            socket_close($socket);
            return $buf;
        }
    }
    public function ajoutCarte(){
        //si le num de la carte est inconnu alors afficher un formulaire "d'inscription"
    }
}
