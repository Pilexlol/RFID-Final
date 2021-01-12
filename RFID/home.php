<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Lecteur RFID</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    </script>
    <?php
    if (isset($_SESSION['username']) == true) {
        if (isset($_SESSION['id_user']) && $_SESSION['id_user'] != 0) { // Si l'utilisateur est connectée il affiche le site

    ?>
            <!-- Navigation-->
            <div class="center">
                <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
                    <div class="container">
                        <a class="navbar-brand js-scroll-trigger" href="#page-top">Lecteur RFID</a>
                    </div>
                    <div>
                        <form action='<?php session_destroy() ?>'> 
                            <input type='submit' value='Se d&eacute;connecter' />
                        </form>
                    </div>
                </nav>
                <div class="container">
                    <div class="row">
                    <?php
                    $coUser->RecupBuffer($buf, $db, $id_user, $Nom, $Prenom, $Age, $Classe, $Num_carte, $imageUser); // Fonction qui permet d'afficher les données de l'utilisateur ayant mis ça carte sur le lecteur RFID
                }
                    ?>
                    </div>
                </div>
            </div>
        <?php
    } else {
        include("404.html");
    }

        ?>
        <script type="text/javascript">
            setInterval('window.location.reload()', 1000); // Reload l  a page tout les 1seconde
        </script>
</body>

</html>