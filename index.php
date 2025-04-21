<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// ------------------------
// 📁 Définition du chemin absolu du dossier racine du projet
// ------------------------
define('ROOT_DIR', str_replace('\\', '/', __DIR__));
// ------------------------
// 🧡 Appel de la classe Autoload pour charger tous les contrôleurs
// ------------------------
require_once ROOT_DIR . "/src/control/Autoload.php";
Autoload::register();
// ------------------------
// 💚 Appel de la classe ControlMain
// ------------------------
$controlMain = new ControlMain();
$controlRooter = new ControlRooter();
$controlForm = new ControlForm();
// ------------------------
// 🔴 Démarrage de la session sécurisée
// ------------------------
$controlMain->activerLaSession();
// ------------------------
// 💙 Génération du token CSRF si absent
// ------------------------
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Génère un token aléatoire sécurisé
}
// ------------------------
// 🟡 Gestion des messages temporaires (type flash message)
// ------------------------
$controlMain->gestionMessageFlash();
// ------------------------
// 🟠 Traitement des formulaires POST
// ------------------------
$controlForm->handlerform();
// ------------------------
// 🟪 Obtenir les données SEO + chemin de la vue
// ------------------------
// Si l'url est vide, on redirige vers la page d'accueil
$url = $_GET['url'] ?? 'accueil';
$seoData = $controlRooter->gestionDesVues($url);
// Génére le JSON-LD pour le SEO sémantique
$jsonLd = $controlRooter->gestionDuJsonLd($url, [
    'title' => $seoData['title'],
    'slug' => $url
]);
// Injecter les données dans le contrôleur principal
$controlMain->setSeoData($seoData);
// ------------------------
// 🟪 Afficher la page de manière dynamique en mettant son chemin dans la variable page
// ------------------------
$controlMain->afficherTemplate();
