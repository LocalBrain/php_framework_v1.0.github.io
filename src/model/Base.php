<?php

require_once ROOT_DIR . "/../config.php";

class Base
{
    private static $_pdo = null; // On rend la connexion statique pour éviter plusieurs connexions

    public function __construct()
    {
        if (self::$_pdo === null) { // Vérifie si la connexion existe déjà
            try {
                self::$_pdo = new PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                    DB_USER,
                    DB_PASS,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                die("❌ Erreur de connexion : " . $e->getMessage());
            }
        }
    }

    public function getPdo()
    {
        return self::$_pdo; // Renvoie toujours la même connexion
    }
}
