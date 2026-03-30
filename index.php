<?php 
session_start(); 
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | Université Révérend KIM</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="logo-container">
                <img src="logo.png" alt="Logo URKIM" class="logo-img">
                <span class="univ-name">URKIM</span>
            </div>
            <div class="nav-links">
                <a href="index.php" class="active"><i class="fas fa-home"></i> Accueil</a>
                <a href="inscription.php"><i class="fas fa-user-plus"></i> Inscription</a>
                <a href="liste.php"><i class="fas fa-list"></i> Listing</a>
                <a href="logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </div>
        </nav>
    </header>

    <main class="container">
        <section class="hero-section">
            <div class="hero-content">
                <img src="photo_universite.jpg" alt="Campus Université Révérend KIM" class="hero-image">
                <h1>Gestion Administrative des Étudiants</h1>
                <p class="subtitle">Bienvenue sur le portail officiel de l'Université Révérend KIM.</p>
                
                <div class="action-buttons">
                    <a href="inscription.php" class="cta-button">
                        <i class="fas fa-plus-circle"></i> Inscrire un nouvel étudiant
                    </a>
                </div>
            </div>
        </section>

        <section class="info-cards">
            <div class="card">
                <i class="fas fa-graduation-cap"></i>
                <h3>Excellence</h3>
                <p>Une formation de qualité pour les leaders de demain.</p>
            </div>
            <div class="card">
                <i class="fas fa-university"></i>
                <h3>Valeurs</h3>
                <p>Éthique, Discipline et Travail sont au cœur de l'URKIM.</p>
            </div>
            <div class="card">
                <i class="fas fa-users"></i>
                <h3>Communauté</h3>
                <p>Rejoignez des milliers d'étudiants déjà inscrits.</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Université Révérend KIM - Tous droits réservés.</p>
    </footer>

</body>
</html>