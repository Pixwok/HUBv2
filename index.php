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
                    <li><a href=""><i class="fas fa-plus"></i></a></li>
                    <li><a href=""><i class="fas fa-trash"></i></a></li>
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
                <form action="php/auth.php" class="form-login" method="post">
                    <a href="javascript:void(0)" onclick="document.getElementById('loginForm').style.display = 'none';"><i class="fas fa-times"></i></a>
                    <input id="login" type="text" placeholder="pseudo" name="pseudo" required>
                    <input id="passwd" type="password" placeholder="Password" name="passwd" required>

                    <input type="submit" name="login" class="btn-apply" value="Login">
                </form>
            </div>
            </div>
        </section>
    </main>
</body>
</html>