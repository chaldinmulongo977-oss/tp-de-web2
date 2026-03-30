<?php
session_start(); require 'config.php'; $err = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ? AND mot_de_passe = ?");
    $stmt->execute([$_POST['email'], $_POST['password']]);
    if ($user = $stmt->fetch()) { $_SESSION['user_id'] = $user['id_user']; header('Location: index.php'); } 
    else { $err = "Email ou mot de passe incorrect."; }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"><title>Connexion</title></head>
<body>
    <div class="container" style="max-width:400px; margin-top:100px; text-align:center;">
        <img src="logo.png" style="width:100px; margin-bottom:20px;">
        <h2>Connexion Admin</h2>
        <?php if($err) echo "<div class='error'>$err</div>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>