<?php
include __DIR__ . '/../bdd.php';
?>
<head>
    <meta charset="utf-8">
    <title>prototype V1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/e2e1900fed.js" crossorigin="anonymous"></script><!--permet d'avoir accès à des icones gratuites-->
    <script type="module" src="../zoomPost.js"></script>
    <script type="module" src="../js/index.js"></script><!-- type module TRES IMPORTANTS, SINON LES IMPORT NE FONCTIONNENT PAS, c'est une norme ES6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <link rel="stylesheet" media="screen and (min-width: 981px)" href="../css/desk/index.css" />
    <!-- Import police 'Cabin' : -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <!-- ---- -->
</head>

<body>
<header>
    <nav>
        <div id="searchbar">
            <input id="search-input" type="search" placeholder="Recherche">
        </div>
        <ul id="menu">
            <li><a href="../index.php" class="neonone">Accueil</a></li>
            <li><a href="../contact.php" class="neontwo">Contacts</a></li>
            <li><a href="../aboutUs.php" class="neonone">Qui sommes nous</a></li>
            <li><a href="#" class="neontwo">Les plateformes</a></li>
        </ul>
        <input type="checkbox" name="" id="switch">
    </nav>
</header>
</body>

</html>
<?php

// Initialisation de la variable d'erreurs
$errors = array();

if (!empty($_POST)) {
    // Récupération et sanitisation des données du formulaire
    $mail = htmlspecialchars(trim($_POST['mail']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validation des données du formulaire
    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = "Le mail est requis et doit être valide.";
    }

    if (empty($password)) {
        $errors['password'] = "Le mot de passe est requis.";
    }

    if (empty($errors)) {
        // Requête préparée pour éviter les injections SQL
        $sql = "SELECT name, password, mail FROM admin WHERE mail=:mail";
        $pdoStatement = $pdo->prepare($sql);

        if ($pdoStatement) {
            $pdoStatement->execute(['mail' => $mail]);
            $result = $pdoStatement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Vérification du mot de passe
                if (password_verify($password, $result['password'])) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">Connexion réussie</div>";
                    sleep(1);
                    header('Location: ../index.php');
                    if (!isset($_SESSION['compte'])) $_SESSION['compte'] = "";

                    // Connexion réussie
                    $_SESSION['compte'] = $_POST['mail']; // Stocker l'email dans la session 'compte'
                    $_SESSION['name'] = $result['name'];  // Stocker le nom dans la session 'name'

                    exit();
                } else {
                    $errors['password'] = "Email ou mot de passe incorrect.";
                }
            } else {
                $errors['mail'] = "Email ou mot de passe incorrect.";
            }
        } else {
            $errors['database'] = "Erreur de connexion à la base de données.";
        }
    }
}
?>

<div class="form-container">
    <?php if (!empty($errors)) : ?>
        <div class="erreur">
            <div class="alert alert-secondary" role="alert">
                Vous n'avez pas rempli le formulaire correctement
            </div>

            <?php foreach ($errors as $error) : ?>
                <div><?php echo "<div class=\"alert alert-danger\" role=\"alert\">$error</div>"; ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form method="post" action="">
        <h1>- Accès Admin -</h1>
        <label for="mail">Email :</label><br>
        <input type="email" id="mail" name="mail" required placeholder="mail" value="<?php echo htmlspecialchars($mail ?? '', ENT_QUOTES); ?>"><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required placeholder="Mot de passe"><br>

        <input type="submit" value="Se connecter"><br>
    </form>
</div>
