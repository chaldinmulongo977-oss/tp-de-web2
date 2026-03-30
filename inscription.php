<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$msg = "";
$status = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $photo = "default.png";
    
    // Vérification de l'upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['photo']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($ext, $allowed)) {
            $photo = time() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "_", $filename);
            if (!is_dir('uploads')) mkdir('uploads', 0777, true);
            move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $photo);
        }
    }

    $sql = "INSERT INTO etudiants (matricule, nom_complet, filiere, photo) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$_POST['m'], $_POST['n'], $_POST['f'], $photo])) {
        $msg = "Félicitations ! L'étudiant a été inscrit avec succès à l'URKIM.";
        $status = "success";
    } else {
        $msg = "Erreur lors de l'inscription. Veuillez vérifier les informations.";
        $status = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Étudiant | URKIM</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar">
        <div class="logo-container">
            <img src="logo.png" alt="Logo URKIM" class="logo-img">
            <span class="univ-name">URKIM Admin</span>
        </div>
        <div class="nav-links">
            <a href="index.php"><i class="fas fa-home"></i> Accueil</a>
            <a href="inscription.php" class="active"><i class="fas fa-user-plus"></i> Inscription</a>
            <a href="liste.php"><i class="fas fa-list"></i> Listing</a>
            <a href="logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </nav>

    <div class="container-small">
        <div class="card-form">
            <div class="form-header">
                <i class="fas fa-id-card-alt"></i>
                <h2>Nouvelle Inscription</h2>
                <p>Remplissez les informations de l'étudiant ci-dessous.</p>
            </div>

            <?php if($msg): ?>
                <div class="alert <?php echo $status; ?>">
                    <i class="fas <?php echo ($status == 'success') ? 'fa-check-circle' : 'fa-exclamation-triangle'; ?>"></i>
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" class="modern-form">
                <div class="input-group">
                    <label for="m"><i class="fas fa-hashtag"></i> Matricule</label>
                    <input type="text" name="m" id="m" placeholder="Ex: URKIM-2026-001" required>
                </div>

                <div class="input-group">
                    <label for="n"><i class="fas fa-user"></i> Nom Complet</label>
                    <input type="text" name="n" id="n" placeholder="Nom, Postnom et Prénom" required>
                </div>

                <div class="input-group">
                    <label for="f"><i class="fas fa-book"></i> Filière / Faculté</label>
                    <select name="f" id="f" required>
                        <option value="" disabled selected>Choisir une filière...</option>
                        <option value="Informatique">Sciences Informatiques</option>
                        <option value="Économie">Sciences Économiques</option>
                        <option value="Droit">Droit</option>
                        <option value="Polytechnique">Polytechnique</option>
                    </select>
                </div>

                <div class="input-group">
                    <label><i class="fas fa-camera"></i> Photo d'identité</label>
                    <div class="file-upload">
                        <input type="file" name="photo" id="photo" accept="image/*">
                        <span><i class="fas fa-upload"></i> Choisir une image</span>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i> Valider l'inscription
                </button>
            </form>
        </div>
    </div>

</body>
</html>