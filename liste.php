<?php
session_start(); require 'config.php'; if (!isset($_SESSION['user_id'])) header('Location: login.php');
$etudiants = $pdo->query("SELECT * FROM etudiants ORDER BY id_etudiant DESC")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"><title>Listing</title></head>
<body>
    <nav><img src="logo.png" class="logo-img"><div class="nav-links"><a href="index.php">Accueil</a> <a href="inscription.php">Inscription</a> <a href="liste.php">Listing</a> <a href="logout.php">Déconnexion</a></div></nav>
    <div class="container">
        <h2>Liste des Étudiants Inscrits</h2>
        <table>
            <tr><th>Photo</th><th>Matricule</th><th>Nom</th><th>Filière</th></tr>
            <?php foreach($etudiants as $e): ?>
            <tr>
                <td><img src="uploads/<?= $e['photo'] ?>" class="img-table"></td>
                <td><?= htmlspecialchars($e['matricule']) ?></td>
                <td><?= htmlspecialchars($e['nom_complet']) ?></td>
                <td><?= htmlspecialchars($e['filiere']) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>