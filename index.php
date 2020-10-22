<?php
include('php/connexion.php');

//DEFINE VAR
$error = FALSE;
//Système de connexion
if (isset($_POST['login'])) {
    $login = htmlspecialchars($_POST['pseudo']);
    $passwd = hash('sha256', $_POST['passwd']);
    $request = "SELECT * FROM account WHERE pseudo='".$login."' AND passwd='".$passwd."'";
    $res = $connexion->query($request);
    $data = $res->fetchALL(PDO::FETCH_ASSOC);
    if (count($data) === 1) {
        session_start();
        $_SESSION['login'] = htmlspecialchars($_POST['pseudo']);
    } else {
        $error = TRUE;
    }
}

//Récupération de la liste des boutons et des TAGS
$bres = $connexion->query("SELECT * FROM button");
$dbutton = $bres->fetchALL();

$tres = $connexion->query("SELECT * FROM tag");
$dtag = $tres->fetchALL();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/49177d4855.js" crossorigin="anonymous"></script> <!--Kit Fontawesome-->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&display=swap" rel="stylesheet"> <!--INPORT FONT-->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>HUB - Pixwok</title>
</head>
<body>
    <div id="particles-js"></div>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
    <main>
        <aside>
            <nav>
                <ul>
                    <li><a href="javascript:void(0)" onclick="document.getElementById('addForm').style.display = 'flex';"><i class="fas fa-plus"></i></a></li>
                    <li><a href="javascript:void(0)" onclick="document.getElementById('removeForm').style.display = 'flex';"><i class="fas fa-trash"></i></a></li>
                </ul>
                <?php if ( session_status() === PHP_SESSION_NONE ): ?>
                    <a href="javascript:void(0)" onclick="document.getElementById('loginForm').style.display = 'flex';"><i class="fas fa-user-alt"></i></a>
                <?php elseif ( session_status() === PHP_SESSION_ACTIVE ): ?>
                    <a href="deconnexion.php"><i class="fas fa-sign-out-alt"></i></a>
                <?php endif; ?>
            </nav>
        </aside>
        <section>
            <h1>HUB d'application de Pixwok</h1>
            <div class="container">
                <div class="popup" id="loginForm">
                    <form action="" class="form-login" method="post">
                        <a href="javascript:void(0)" onclick="document.getElementById('loginForm').style.display = 'none';"><i class="fas fa-times"></i></a>
                        <input id="login" type="text" placeholder="pseudo" name="pseudo" required>
                        <input id="passwd" type="password" placeholder="Password" name="passwd" required>

                        <input type="submit" name="login" class="btn-apply" value="Login">
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="popup" id=addForm>
                    <form action="" method="post">
                        <a href="javascript:void(0)" onclick="document.getElementById('addForm').style.display = 'none';"><i class="fas fa-times"></i></a>
                        <input type="text" name="title" id="title" placeholder="Nom du bouton" required>
                        <input type="text" name="link" id="link" placeholder="Lien" required>
                        <select name="tag" id="tag" required>
                            <option value="">Choix du tag</option>
                            <?php foreach ($dtag as $value): ?>
                                <option value="<?=$value['id']?>"><?=$value['nom']?></option>
                            <?php endforeach; ?>
                        </select>
                        <input class="btn-save" type="submit" name="addButton" value="Ajouter">
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="popup" id=removeForm>
                    <form action="" method="post">
                        <a href="javascript:void(0)" onclick="document.getElementById('removeForm').style.display = 'none';"><i class="fas fa-times"></i></a>
                        <select name="tag" id="tag" required>
                            <option value="">Sélectionner un bouton</option>
                            <?php foreach ($dbutton as $value): ?>
                                <option value="<?=$value['id']?>"><?=$value['title']?></option>
                            <?php endforeach; ?>
                            <input class="btn-save" type="submit" name="removeButton" value="Supprimer">
                        </select>
                    </form>
                </div>
            </div>

            <?php if ($error === TRUE): ?>
            <div class="container-error">
                <div class="error-box">
                    <span>Erreur de connexion</span>
                </div>
            </div>
            <?php endif;?>
        </section>
    </main>
</body>
</html>