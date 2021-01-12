<?php
session_start(); 
include('classUser.php');
if (isset($_POST['co'])) {
    $username = $_POST['username'];
    $mdp = $_POST['mdp'];
    if (!empty($username) and !empty($mdp)) { // Traitement formulaire
        $coUser = new user($db, $username, $mdp, $id_user, $Nom, $Prenom, $Age, $Classe, $Num_carte); //le mot de passe est correct, on crée l'objet user
        $cobdd = $coUser->coBDD();
        $couserform = $coUser->Connexion($username, $mdp);
    }
}
?>

<head>
    <link href="css/styleCon.css" rel="stylesheet" />
    <meta charset="UTF-8">
</head>
<?php
if (!isset($_SESSION['username'])) {
?>

    <body>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <div id="contact_form">
            <div class="container">
                <div class="frame">
                    <div class="nav">
                        <ul class"links">
                            <li class="signin-active"><a class="btn">Sign in</a></li>
                        </ul>
                    </div>
                    <div>
                        <form class="form-signin" action="" method="POST" name="form">
                            <label>Username</label>
                            <input class="form-styling" type="text" name="username" placeholder="username" />
                            <label>Password</label>
                            <input class="form-styling" type="password" name="mdp" placeholder="password" />
                            <input type="submit" name="co" value="Connexion">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

<?php
} else {
    include("home.php");
}
?>