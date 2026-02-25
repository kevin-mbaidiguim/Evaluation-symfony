<?php
// simple setup script to create sqlite schema and seed data
$projectDir = __DIR__ . '/../';
$pdo = new PDO('sqlite:' . $projectDir . 'var/data.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create tables
$pdo->exec("CREATE TABLE IF NOT EXISTS categorie (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    code TEXT NOT NULL,
    libelle TEXT NOT NULL
);");

$pdo->exec("CREATE TABLE IF NOT EXISTS produit (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    libelle TEXT NOT NULL,
    prix REAL NOT NULL,
    qteStock INTEGER NOT NULL,
    categorie_id INTEGER NOT NULL,
    FOREIGN KEY(categorie_id) REFERENCES categorie(id)
);");

$pdo->exec("CREATE TABLE IF NOT EXISTS commande (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    date TEXT NOT NULL,
    montant REAL NOT NULL
);");

$pdo->exec("CREATE TABLE IF NOT EXISTS achat (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    qteAchete INTEGER NOT NULL,
    produit_id INTEGER NOT NULL,
    commande_id INTEGER NOT NULL,
    FOREIGN KEY(produit_id) REFERENCES produit(id),
    FOREIGN KEY(commande_id) REFERENCES commande(id)
);");

// seed
$pdo->exec("INSERT INTO categorie(code, libelle) VALUES
    ('ELEC','Électronique'),
    ('ALIM','Alimentation');");

$pdo->exec("INSERT INTO produit(libelle,prix,qteStock,categorie_id) VALUES
    ('Télévision',499.99,10,1),
    ('Pain',1.20,100,2);");

echo "Database initialized.\n";
