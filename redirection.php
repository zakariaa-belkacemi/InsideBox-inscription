<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation d'inscription</title>
    <link rel="shortcut icon" type="image/x-icon"  href="images/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="styles/redirection.css">
</head>
<body>
<main>
    <div class="container">
        <div class="main-img">
        <img  src="images\4396ac48f8c94c5f39b725ed7d750b2f.jpg" alt="">
        </div>
        <div class="confirmation-div">
            <img class="brand-logo" src="images\1715127850-insidebox 1-01.webp" alt="brand logo">
        <h2>Signed up to Insidebox</h2> <br>
    <?php
if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['email']) && isset($_GET['age'])) {
    echo "<h1>Merci pour votre inscription</h1>";
    echo "<p>Votre nom est: " . "<span>". htmlspecialchars($_GET['nom']) . "</span>" . "</p>";
    echo "<p>Votre prenom est: " . "<span>" . htmlspecialchars($_GET['prenom']) . "</span>"  . "</p>";
    echo "<p>Votre Email est: " . "<span>" . htmlspecialchars($_GET['email']) . "</span>" . "</p>";
    echo "<p>Votre age est: " . "<span>" . htmlspecialchars($_GET['age']) . "</span>" . "</p>";
} else {
    echo "<p>Informations manquantes !</p>";
}
?>
</div>
</div>
</main>
</body>
</html>

