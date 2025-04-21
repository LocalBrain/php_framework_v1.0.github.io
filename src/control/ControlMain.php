<?php

class ControlMain
{
    private $seoData = [];

    // ------------------------
    // 🟩 Injecte les données SEO pour l'affichage
    // ------------------------
    public function setSeoData($seoData)
    {
        $this->seoData = $seoData;
    }
    // ------------------------
    // 🟩 Injecte les données JSON-LD pour le SEO google de chaque page
    // ------------------------
    public function setJsonLd($jsonLd)
    {
        $this->seoData['jsonLd'] = $jsonLd;
    }

    // ------------------------
    // 🟪 Afficher la page de manière dynamique en mettant son chemin dans la variable page
    // ------------------------
    public function afficherTemplate()
    {
        // Extraction des variables SEO pour utilisation dans les templates
        extract($this->seoData);

        require_once ROOT_DIR . "/public/vues/template/header.php";
        require_once ROOT_DIR . "/public/vues/template/navbar.php";
        require_once $page;
        require_once ROOT_DIR . "/public/vues/template/footer.php";
    }
    // ------------------------
    // 🔴 Démarrage de la session sécurisée
    // ------------------------
    public function activerLaSession()
    {
        session_start([
            'cookie_lifetime' => 86400, // Durée de vie du cookie en secondes (ici 24h)
            'cookie_secure' => true,     // Le cookie ne sera envoyé que sur des connexions HTTPS
            'cookie_httponly' => true,   // Empêche l'accès au cookie par JavaScript (protection XSS)
            'use_only_cookies' => true,  // Empêche l'utilisation d'ID de session dans l'URL
            'sid_length' => 48,          // Longueur de l'ID de session (plus long = plus sécurisé)
            'sid_bits_per_character' => 6, // Le nombre de bits par caractère dans l'ID de session
        ]);

        // Vérification de l'existence de la session (par exemple, pour un utilisateur connecté)
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
            // echo "Utilisateur connecté.";
        } else {
            // echo "Utilisateur non connecté.";
        }

        // Si l'utilisateur est connecté, régénérer l'ID de session pour éviter le vol de session
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
            session_regenerate_id(true); // Régénérer l'ID de session pour éviter la fixation
        }
    }
    // ------------------------
    // 💙 Génère un token CSRF unique et le stocke en session
    // ------------------------
    public function generateCSRFToken()
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    // ------------------------
    // 🟦 Vérifie si le token CSRF est valide lors d’un POST
    public function validateCSRFToken($postToken)
    {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $postToken);
    }
    // ------------------------
    // ✅ Protection contre les spams ou attaques bruteforce
    // ------------------------
    public function antiSpam($action = 'global')
    {
        $key = 'spam_' . $action;
        $now = time();

        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = ['count' => 0, 'time' => $now];
        }

        // Reset si plus de 15 minutes écoulées
        if ($now - $_SESSION[$key]['time'] > 900) {
            $_SESSION[$key] = ['count' => 0, 'time' => $now];
        }

        $_SESSION[$key]['count']++;

        if ($_SESSION[$key]['count'] > 10) {
            $_SESSION['message'] = "Trop de tentatives. Réessayez plus tard.";
            return false;
        }

        return true;
    }
    // ------------------------
    // ✅ Protection en sortie contre les attaques XSS
    // ------------------------
    public function antiXSS($data)
    {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }
    // ------------------------
    // ✅ Nettoyage en entré contre les attaques XSS
    // ------------------------
    public function cleanInputArray(array $array): array
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = $this->cleanInputArray($value); // récursif si formulaire complexe
            } else {
                $array[$key] = strip_tags($value); // suppression des balises HTML
            }
        }
        return $array;
    }
    // ------------------------
    // ✅ Protection CSRF
    // ------------------------
    public function antiCSRF()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                $_SESSION['message'] = "Token CSRF invalide.";
                return false;
            }
        }
    }
    // ------------------------
    // 🟡 Gestion des messages temporaires (type flash message)
    // ------------------------
    public function gestionMessageFlash()
    {
        if (isset($_SESSION['message'])) {
            $this->seoData['flash_message'] = htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8');
            unset($_SESSION['message']);
        }
    }
}
