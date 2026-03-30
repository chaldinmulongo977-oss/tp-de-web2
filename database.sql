CREATE DATABASE IF NOT EXISTS tp_etudiants;
USE tp_etudiants;

CREATE TABLE utilisateurs (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL
);

CREATE TABLE etudiants (
    id_etudiant INT AUTO_INCREMENT PRIMARY KEY,
    matricule VARCHAR(50) NOT NULL UNIQUE,
    nom_complet VARCHAR(150) NOT NULL,
    filiere VARCHAR(100) NOT NULL,
    photo VARCHAR(255) DEFAULT 'default.png'
);

-- Identifiants pour ton professeur : admin@tp.com / admin123
INSERT INTO utilisateurs (email, mot_de_passe) VALUES ('admin@tp.com', 'admin123');